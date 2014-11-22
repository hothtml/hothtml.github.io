<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->
<div style="clear:both;"></div>
<div id="footerbar">
<!--尊重他人劳动成果请保留版权.-->
<span style="float:left;">&copy;<a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>  <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?></span>
<span style="float:right; font-size:12px;"> THEME BY <a href="http://www.foxalt.com" target="_blank" id="copyfox">Fox</a> / <a href="http://www.emlog.net" title=" 自豪的采用 EMLOG <?php echo Option::EMLOG_VERSION;?>" target="_blank" id="copyemlog">Emlog</a></span> 
<?php doAction('index_footer'); ?>
</div><!--end #footerbar-->
</div><!--end #wrap-->
<?php include View::getView( 'config/config' ); ?>
</body>
</html>