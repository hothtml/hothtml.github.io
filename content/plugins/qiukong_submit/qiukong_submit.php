<?php
/*
Plugin Name: 匿名投稿
Version: 6
Description: 简单的匿名投稿插件
ForEmlog: 5.3
Author:	qiukong.com
Author URL:	http://qiukong.com
*/
!defined('EMLOG_ROOT') && exit('access deined!');
function qiukong_submit() {echo '<div class="sidebarsubmenu"><a href="./plugin.php?plugin=qiukong_submit">匿名投稿</a></div>';}
addAction('adm_sidebar_ext', 'qiukong_submit');
?>