<?php if(!isset($qk)){die;}
global $CACHE;
$options_cache = $CACHE->readCache('options');
$navibar = unserialize($options_cache['navibar']);
$blogname = $options_cache['blogname'];
$bloginfo = $options_cache['bloginfo'];
$blogtitle = $options_cache['blogname'];
$description = $options_cache['bloginfo'];
$site_key = $options_cache['site_key'];
$icp = $options_cache['icp'];
$footer_info = $options_cache['footer_info'];
$site_title = '投稿 - '.$blogname;
$comments = array('commentStacks'=>array(), 'commentPageUrl'=>'');
?>