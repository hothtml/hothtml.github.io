<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div><!--end #content-->
<div style="clear:both;"></div>


<div id="footer" class="w640">
	
	Copyright © <?php echo date('Y'),' '; ?><a href="<?php echo BLOG_URL; ?>" rel="home"><?php echo $blogname; ?></a><sup>&reg;</sup> | All rights reserved. 
		| <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> 
		| Powered by <a href="http://www.emlog.net" title="emlog <?php echo Option::EMLOG_VERSION;?>">emlog</a> 
	|<?php doAction('index_footer'); ?>
	</br></br>
	<strong>Theme by <a href="http://leotheme.cn/" target="_blank">Await</a> Transplant by <a href="http://foxzld.com/" target="_blank">LonelyFox</a></strong>
</div>
<div id="footerBar">
	<a href="#" class="gotop" title="返回顶部">Top</a>

	

</div>
<!--footer end -->



</body>
</html>