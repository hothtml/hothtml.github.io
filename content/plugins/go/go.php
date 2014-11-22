<?php
/*
Plugin Name: 301跳转
Version: 1.0
Plugin URL: http://web.1baw.com/post-82.html
Description: emlog首款301跳转地址，做淘宝客或不想让别人看到推广链接的朋友可以用下哈。
Author: 一只风筝
Author Email: hwzaw@126.com
Author URL: http://web.1baw.com/post-82.html
*/

!defined('EMLOG_ROOT') && exit('access deined!');
function go_my()//写入插件导航
{
	echo '<div class="sidebarsubmenu" id="go"><a href="./plugin.php?plugin=go">301插件</a></div>';
}
addAction('adm_sidebar_ext', 'go_my');
?>