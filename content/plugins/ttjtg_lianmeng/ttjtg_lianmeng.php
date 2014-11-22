<?php
/*
Plugin Name: 淘宝客联盟
Version: 1.0
Plugin URL: http://www.te13.com/
Description: 天天聚团购 淘宝客联盟 推广淘宝联盟频道获取淘宝客佣金 流量变现的强大插件
Author: 团团说
Author Email: ttjtg@139.com
Author URL: http://www.te13.com/
*/

!defined('EMLOG_ROOT') && exit('access deined!');

function ttjtg_lianmeng()
{
echo '<div class="sidebarsubmenu" id="ttjtg_lianmeng_setting"><a href="./plugin.php?plugin=ttjtg_lianmeng">淘宝客联盟</a></div>';
}
addAction('adm_sidebar_ext', 'ttjtg_lianmeng');

?>
