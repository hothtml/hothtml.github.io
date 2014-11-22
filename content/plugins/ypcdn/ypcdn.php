<?php
/*
Plugin Name: 又拍云镜像储存
Version: 1.0
Plugin URL: http://www.iuunet.com/emlog_use/1863.html
Description: 又拍云镜像储存，添加又拍云cdn镜像存储 <a href="?plugin=ypcdn">点击设置</a> &nbsp;&nbsp;
ForEmlog:5.3.0
Author: D&C
Author URL: http://www.iuunet.com
*/
! defined ( 'EMLOG_ROOT' ) && exit ( 'access deined!' );
if(file_exists(dirname(__FILE__).'/ypcdn_config.php')){
	include ('ypcdn_config.php');
}

ob_start ();


function ypcdn_init() {
	global $config;
	$html = ob_get_contents ();
	$home_url = $_SERVER ['HTTP_HOST'];
	ob_end_clean();
	$urls = array ();
	$config['cdn_host'] = isset($config['cdn_host']) ? $config['cdn_host'] : $home_url;
	// preg_match_all("/<[img|link|script|a].*[src|href]=[\"\'](http:\/\/({$home_url})\/[^>\'\"]*\.(?:jpg|jpeg|gif|png|ico|css|js))/U", $html, $urls);
	echo preg_replace ( "/(<[img|link|script|a].*[src|href]=[\"\'])(http:\/\/)({$home_url})(\/[^>\'\"]*\.(?:jpg|jpeg|gif|png|ico|css|js))/U", "\${1}\${2}{$config['cdn_host']}\${4}", $html );
}
addAction ( 'index_footer', 'ypcdn_init' );