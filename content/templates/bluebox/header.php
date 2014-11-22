<?php
/*
Template Name:BlueBox
Description:移植自typecho，简洁美观的图片博客
Version:1.0
Author:phithon
Author Url:http://www.leavesongs.com
Sidebar Amount:1
ForEmlog:5.1.2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/foundation.min.css">
<link href="<?php echo TEMPLATE_URL; ?>css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo TEMPLATE_URL; ?>js/jquery-1.9.1.min.js"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/foundation.min.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/common.js" type="text/javascript"></script>
<?php doAction('index_head'); ?>
<!--[if IE 6]>
	<script src="http://letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</head>
<body>
<div id="wrap">
  <div id="menu">
  	<a href="<?php echo BLOG_URL; ?>"><img src="<?php echo TEMPLATE_URL; ?>img/logo.png" /></a>
	<div id="nav"><?php blog_navi();?></div>
  </div>
  