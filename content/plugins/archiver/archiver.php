<?php
/*
Plugin Name: 日志归档
Version: 1.5.1
Plugin URL: http://xiaosong.org/share/emlog-log-archiving-plug-in-released
Description: 将所有日志按照日期或分类归档显示
ForEmlog:5.0.0
Author: 小松
Author Email: sahala_2007@126.com
Author URL: http://xiaosong.org/
*/
!defined('EMLOG_ROOT') && exit('access deined!');

function displayRecord(){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	$output = '';
	foreach($record_cache as $value){
		$output .= '<li><h4>'.$value['record'].'('.$value['lognum'].')</h4>'.displayRecordItem($value['date']).'</li>';
	}
	$output = '<ul class="archiver">'.$output.'</ul>';
	return $output;
}
function displayRecordItem($record){
	if (preg_match("/^([\d]{4})([\d]{2})$/", $record, $match)) {
		$days = getMonthDayNum($match[2], $match[1]);
		$record_stime = emStrtotime($record . '01');
		$record_etime = $record_stime + 3600 * 24 * $days;
	} else {
		$record_stime = emStrtotime($record);
		$record_etime = $record_stime + 3600 * 24;
	}
	$sql = "and date>=$record_stime and date<$record_etime order by top desc ,date desc";
	$result = archiver_db($sql);
	return $result;
}
function displaySort(){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort');
	$output = '';
	foreach($sort_cache as $value){
		$output .= '<li><h4>'.$value['sortname'].'('.$value['lognum'].')</h4>'.displaySortItem($value['sid']).'</li>';
	}
	$output = '<ul class="archiver">'.$output.'</ul>';
	return $output;
}
function displaySortItem($sortid){
	$sql = "and sortid=$sortid order by date desc";
	$result = archiver_db($sql);
	return $result;
}
function archiver_db($condition = ''){
	$DB = MySql::getInstance();
	$sql = "SELECT gid, title, comnum, views FROM " . DB_PREFIX . "blog WHERE type='blog' and hide='n' $condition";
	$result = $DB->query($sql);
	$output = '';
	while ($row = $DB->fetch_array($result)) {
		$log_url = Url::log($row['gid']);
		$output .= '<li><a href="'.$log_url.'">'.$row['title'].'</a> <span>('.$row['comnum'].'/'.$row['views'].')</span></li>';
	}
	$output = empty($output) ? '<li>暂无日志</li>' : $output;
	$output = '<ol class="archiver_item">'.$output.'</ol>';
	return $output;
}
?>