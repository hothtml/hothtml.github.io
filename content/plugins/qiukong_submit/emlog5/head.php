<?php if(!isset($qk)){die;}
global $CACHE;$options_cache = $CACHE->readCache('options');$blogname = $options_cache['blogname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="author" content="emlog" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>匿名投稿 - <?php echo $blogname; ?></title>
<link href="admin/views/style/default/style.css?v=5.3.1" type="text/css" rel="stylesheet">
<link href="admin/views/css/css-main.css?v=5.3.1" type="text/css" rel="stylesheet">
<script type="text/javascript" src="include/lib/js/jquery/jquery-1.7.1.js?v=5.3.1"></script>
<script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js?v=5.3.1"></script>
<script type="text/javascript" src="admin/views/js/common.js?v=5.3.1"></script>
</head>
<body>
<div id="mainpage">
<div id="header">
<div id="header_left"></div>
<div id="header_logo"><a href="./?plugin=qiukong_submit" title="返回管理首页">emlog</a></div>
<div id="header_title">
<a href="./" target="_blank" title="在新窗口浏站点"><?php echo $blogname; ?></a>
</div>
<div id="header_right"></div>
<div id="header_menu">
<a href="#" title="qiukong.com">
<img src="admin/views/images/avatar.jpg" align="top" width="20" height="20" />
</a><span>|</span>
<a href="./">退出</a>
<a href="http://qiukong.com"></a>
</div>
</div>
<div id="side">
<div id="sidebartop"></div>
<div id="log_mg">
<li class="sidebarsubmenu" id="menu_wt"><a href="./?plugin=qiukong_submit"><span class="ico16"></span>写文章</a></li>
</div>
<div id="sidebarBottom"></div>
</div>
<div id="container">