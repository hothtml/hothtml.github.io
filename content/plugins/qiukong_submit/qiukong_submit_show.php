<?php
function qiukong(){die('<!DOCTYPE HTML><a href="http://qiukong.com">qiukong.com</a>');}
function set($var){$set = file(dirname(__FILE__).'/qiukong.com.php');return trim($set[$var]);}
function fly($var){return trim(addslashes(htmlspecialchars(strip_tags($var))));}
function url($var){header('Location:./?plugin=qiukong_submit&qk=2&hi='.$var);die;}
if(!defined('EMLOG_ROOT')){qiukong();}
if(!file_exists(dirname(__FILE__).'/qiukong.com.php')){qiukong();}
if(!file_exists(dirname(__FILE__).'/qiukong.com.zzz')){qiukong();}
$qk = isset($_GET['qk'])?intval($_GET['qk']):0;
$old=file(dirname(__FILE__).'/qiukong.com.zzz');$oldt=isset($old['0'])?intval($old['0']):0;$oldc=isset($old['1'])?intval($old['1']):0;
if($_SERVER["REQUEST_TIME"]-$oldt>86400){file_put_contents(dirname(__FILE__).'/qiukong.com.zzz',$_SERVER["REQUEST_TIME"]."\r\n0");}
require_once EMLOG_ROOT.'/init.php';session_start();
if(set('10') != '' && file_exists(dirname(__FILE__).'/'.set('10'))){$tp = set('10');}else{$tp = 'default';}
if($qk == 0){
if(isset($_SESSION['qk_def']) && $_SERVER["REQUEST_TIME"]-$_SESSION['qk_def']<set('11')){url('102');}
if(set('12')>0&&$oldc>=set('12')){url('103');}
$maxg=intval(ini_get('upload_max_filesize'));$maxp=$maxg<10?$maxg:'10';$maxu=$maxp*1048576;
include_once($tp.'/show.php');
}
elseif($qk == 1){
$Log_Model = new Log_Model();
$Tag_Model = new Tag_Model();
$title = isset($_POST['title']) ? addslashes(trim($_POST['title'])) : '';
$content = isset($_POST['text']) ? addslashes(trim($_POST['text'])) : '';
$excerpt = isset($_POST['summ']) ? addslashes(trim($_POST['summ'])) : '';
$author = set('9');
$up = '1';
if(set('8') >= -1){$sortid == set('8');}else{$sortid = isset($_POST['sortid']) ? intval($_POST['sortid']) : '';}
if(set('6') == 0){$remark = 'n';}else{$remark = 'y';}
if(set('1') == 0){$hide = 'y';}else{$hide = 'n';}
if(set('1') == 1){$checked = 'n';}else{$checked = 'y';}
$tagstring = isset($_POST['tags']) ? addslashes(trim($_POST['tags'])) : '';
$gcode = isset($_POST['gcode']) ? fly(strtoupper($_POST['gcode'])) : 'qiukong.com';
if($title == ''){url('1');}
if(set('2') == 2 && !preg_match('/[\x{4e00}-\x{9fa5}]/iu', $content)){url('2');}
if(set('3') == 2 && !preg_match('/[\x{4e00}-\x{9fa5}]/iu', $excerpt)){url('3');}
if(set('4') == 2 && $tagstring == ''){url('4');}
if(set('7') == 1 && $gcode != $_SESSION['code']){url('7');}
if(set('8') == -3 && $sortid < 1){url('8');}
if(set('5') != '0' && isset($_FILES['file'])){
define('MY_ACCESSKEY', set('15'));define('MY_SECRETKEY', set('16'));define('MY_ALBUM', set('17'));
include_once('qiukong_submit_tietuku.php');$ttk=new TTKClient(MY_ACCESSKEY,MY_SECRETKEY);
$res=$ttk->uploadFile(MY_ALBUM,$_FILES['file']['tmp_name']);$code=json_decode($res)->code;
if(isset($code)){$up = '0';}
else{$htmlurl=json_decode($res)->htmlurl;$linkurl=json_decode($res)->linkurl;$s_url=json_decode($res)->s_url;$t_url=json_decode($res)->t_url;
if(set('13')=='1' && set('14')=='1'){$tietuku = '<img src="'.$t_url.'" />';}
if(set('13')=='2' && set('14')=='1'){$tietuku = '<img src="'.$s_url.'" />';}
if(set('13')=='3' && set('14')=='1'){$tietuku = '<img src="'.$linkurl.'" />';}
if(set('13')=='1' && set('14')=='2'){$tietuku = str_replace(array('\'','.jpg','.png','.gif'),array('"','t.jpg','t.jpg','t.jpg'),$htmlurl);}
if(set('13')=='2' && set('14')=='2'){$tietuku = str_replace(array('\'','.jpg','.png','.gif'),array('"','s.jpg','s.png','s.gif'),$htmlurl);}
if(set('13')=='3' && set('14')=='2'){$tietuku = str_replace(array('\''),array('"'),$htmlurl);}
if(set('13')=='1' && set('14')=='3'){$tietuku = '<a href="'.$linkurl.'" target="_blank"><img src="'.$t_url.'" /></a>';}
if(set('13')=='2' && set('14')=='3'){$tietuku = '<a href="'.$linkurl.'" target="_blank"><img src="'.$s_url.'" /></a>';}
if(set('13')=='3' && set('14')=='3'){$tietuku = '<a href="'.$linkurl.'" target="_blank"><img src="'.$linkurl.'" /></a>';}
$content = $tietuku.$content;}
}
if(set('5') == 2){if(!isset($_FILES['file']) or $up == '0'){url('5');}}
unset($_SESSION['code']);
$logData = array(
'title' => $title,
'alias' => '',
'content' => $content,
'excerpt' => $excerpt,
'author' => $author,
'sortid' => $sortid,
'date' => $_SERVER["REQUEST_TIME"],
'top '=> 'n',
'sortop '=> 'n',
'allow_remark' => $remark,
'hide' => $hide,
'checked' => $checked,
'password' => ''
);
$blogid = $Log_Model->addlog($logData);
$Tag_Model->addTag($tagstring, $blogid);
global $CACHE;$CACHE->updateCache();
$_SESSION['qk_def'] = $_SERVER["REQUEST_TIME"];
$newc = $oldc + 1;
file_put_contents(dirname(__FILE__).'/qiukong.com.zzz',$oldt."\r\n".$newc);
if($up = '0'){url('101');}else{url('100');}
}
elseif($qk == 2){
$hi = isset($_GET['hi'])?intval($_GET['hi']):0;
include_once($tp.'/shit.php');
}
else{
qiukong();
}
?>