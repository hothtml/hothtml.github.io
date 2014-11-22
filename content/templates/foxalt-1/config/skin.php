<?php 
/*
* 搜索框效果
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<style type="text/css">
<?php
if (_g('skin') == "default") {
  echo "/*默认*/
#nav {height:40px; line-height:40px; margin:0px auto; background:#444; border-top: 1px solid #444;border-bottom: 1px solid #444;}
#nav .current {background: #555;}
#nav .common:hover {background:#555;}
#nav .bar .item a { color:#fff; font-size:14px;}
#nav .sub-nav {background-color: #444;}
#nav .sub-nav a:hover {background: #555;}";
} elseif (_g('skin') == "blue") {
  echo "/*Blue*/
#nav {height:40px; line-height:40px; margin:0px auto; background:#3589B7; border-top: 1px solid #3589B7;border-bottom: 1px solid #3589B7;}
#nav .current {background: #54A4CD;}
#nav .common:hover {background:#54A4CD;}
#nav .bar .item a { color:#fff; font-size:14px;}
#nav .sub-nav {background-color: #3589B7;}
#nav .sub-nav a:hover {background: #54A4CD;}";
} elseif (_g('skin') == "yellow") {
  echo "/*yellow*/
#nav {height:40px; line-height:40px; margin:0px auto; background:#b28500; border-top: 1px solid #b28500;border-bottom: 1px solid #b28500;}
#nav .current {background: #DBA500;}
#nav .common:hover {background:#DBA500;}
#nav .bar .item a { color:#fff; font-size:14px;}
#nav .sub-nav {background-color: #b28500;}
#nav .sub-nav a:hover {background: #DBA500;}";
  } elseif (_g('skin') == "green") {
  echo "/*green*/
#nav {height:40px; line-height:40px; margin:0px auto; background:#00B285; border-top: 1px solid #00B285;border-bottom: 1px solid #00B285;}
#nav .current {background: #00CA98;}
#nav .common:hover {background:#00CA98;}
#nav .bar .item a { color:#fff; font-size:14px;}
#nav .sub-nav {background-color: #00B285;}
#nav .sub-nav a:hover {background: #00CA98;}";
  } elseif (_g('skin') == "white") {
  echo "/*white*/
#nav {height:40px; line-height:40px; margin:0px auto;border-top: 1px solid #eee;border-bottom: 1px solid #eee;}
#nav .current {background: #EFEFEF;}
#nav .common:hover {background:#EFEFEF;}
#nav .bar .item a { color:#1F1F1F; font-size:14px;}
#nav .sub-nav {background-color: #F5F5F5;}
#nav .sub-nav a:hover {background: #EFEFEF;}";
}
?>
</style>
