<?php
/*
Template Name:默认模板增强多彩美化版
Description:基于版本号5.0.1默认模板的基础修改美化，多种颜色切换。<br/><br/><a href="http://foxalt.com" target="_blank">Foxalt</a>
Version:1.2
Author:Emlog/Fox
Author Url:http://www.emlog.net/templates/author-125
Sidebar Amount:1
ForEmlog:5.0.1-5.3.1
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
<link href="<?php echo TEMPLATE_URL; ?>main.css" rel="stylesheet" type="text/css" />
<?php include View::getView( 'config/skin' ); ?>
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script src="<?php echo BLOG_URL; ?>include/lib/js/jquery/jquery-1.7.1.js" type="text/javascript"></script>
<?php doAction('index_head'); ?>
</head>
<body id="top">
<div id="wrap">
<div id="header">
  <?php include View::getView( 'config/logo' ); ?>
  <div id="headersearch">
    <form method="get" name="keyform"  action="<?php echo BLOG_URL; ?>index.php">
      <input value="" onclick="this.value='';" name="keyword" id="edtSearch" size="12" />
    </form>
  </div>
</div>
<div id="nav">
  <?php blog_navi();?>
</div>
