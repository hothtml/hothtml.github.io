<?php
if(!defined('EMLOG_ROOT')) {exit('error!');} 
error_reporting(0);

$site_title = '淘宝综合商城购物中心 - 团团说 - 51fkgo.com';

include View::getView('header');

require_once('ttjtg_lianmeng_config.php');

if ($_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]=='bok.abc.cn/?plugin=ttjtg_lianmeng'){
echo '<style>#container {width:960px;}</style>';}


if($lianjie==1){
echo '<div style="height:30px" ></div><p align="center" style="font-size: 20px; color:#FF0000;">'.$soure.'</p>';   
}else{
echo '<div align="center" style="overflow:hidden;z-index:1000;position:relative"><iframe style="margin-top: -'.$xiangshang.'px;" frameborder="0" marginheight="0" marginwidth="0" border="0" id="alimamaifrm" name="alimamaifrm" scrolling="no" height="'.$gaodu.'px" width="100%" src="'.$url.'" ></iframe></div>';
}
include View::getView('footer'); 
?>