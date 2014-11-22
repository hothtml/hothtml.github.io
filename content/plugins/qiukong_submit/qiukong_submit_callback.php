<?php
function qiukong(){die('<!DOCTYPE HTML><a href="http://qiukong.com">qiukong.com</a>');}
if(!defined('EMLOG_ROOT')) {qiukong();}
function callback_init(){fopen(dirname(__FILE__).'/qiukong.com.zzz','w+');}
function callback_rm(){unlink(dirname(__FILE__).'/qiukong.com.zzz');}
?>