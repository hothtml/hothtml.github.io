<?php
/*
Template Name:Healthy for emlog5
Description:Healthy,简洁的单栏模板，无特效
Version:2.0
Author:孤独的北极狐
Author Url:http://foxzld.com/
Sidebar Amount:1
ForEmlog:5.0.0
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?php echo  $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo  $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>





<script src="<?php echo BLOG_URL; ?>include/lib/js/jquery/jquery-1.7.1.js"></script>

<script type="text/javascript">

	jQuery(function($){

		var Util = {};

		$(".go-top,.gotop").live("click",function(){

			$("html,body").stop().animate({scrollTop:0},{ duration: 500 , queue:false });

			return false;

		}); //返回顶部
</script>
<?php doAction('index_head'); ?>
</head>
<body>



<!--Star header-->

<div class="w640 box header h120">

	<div class="selfinfo">

		<div class="logo">

			<a href="<?php echo BLOG_URL; ?>" title="">

			
	<?php global $CACHE;
	$user_cache = $CACHE->readCache('user'); ?>

	<img class="avatar avatar-45 photo" height="95" width="95" src="<?php echo empty($user_cache[UID]['avatar']) ? '../../../admin/views/images/avatar.jpg' : ''.BLOG_URL.'' . $user_cache[UID]['avatar'] ?>" 	 />

			

			</a>

			<span></span>


			

		</div>

		<h1><a href="<?php echo BLOG_URL; ?>" rel="home"><?php echo $blogname; ?></a></h1>

		<div class="description"><?php echo $bloginfo; ?></div>

	</div>

	<div class="tool">	

		<ul class="sidelist">

			<li><a class="list_4" href="<?php echo BLOG_URL; ?>admin" title="登录">登录</a></li>

		

			<li><a class="list_2" href="<?php echo BLOG_URL; ?>?plugin=archiver" title="归档">归档</a></li>

			

			<li><a class="list_1" href="<?php echo BLOG_URL; ?>rss.php" title="RSS订阅">RSS订阅</a></li>

		</ul>

		
            <div class="searchform">
	
                <form id="searchform" method="get" action="<?php echo BLOG_URL; ?>index.php">

				<input type="text" value="" name="keyword" id="s" size="30" onfocus="if (this.value == '搜索...') {this.value = '';}" onblur="if (this.value == '') {this.value = '搜索...';}" x-webkit-speech="">

				<input type="submit" id="searchsubmit" class="hide" value="搜 索">

			</form>
			
			</div>
		
		
	</div>

	<div class="clearfix"></div>


	<style type="text/css">

	.h120{height: 120px !important;}

	</style>
    <div class="menu">
	<?php blog_navi();?>
     
    </div>

	

	
</div>








