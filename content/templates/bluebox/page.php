<?php 
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
		<div id="post">
			<div id="title">
				<img src="<?php echo TEMPLATE_URL; ?>img/avatar.png" class="img" />
				<h1><?php topflg($top); ?><?php echo $log_title; ?></h1>
				<div class="date">时间：<?php echo gmdate('Y-n-j G:i l', $date); ?>&nbsp;&nbsp;|&nbsp;&nbsp;评论：<span class="ds-thread-count" data-thread-key=""><?php echo $comnum; ?></span> 条&nbsp;&nbsp;<?php blog_tag($logid); ?></div>
			</div>
			<div class="post">
				<?php echo $log_content; ?>
				<div id="share">
				<!-- Baidu Button BEGIN -->
				<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
					<span class="bdmore">分享：</span>
					<a class="bds_qzone"></a>
					<a class="bds_tsina"></a>
					<a class="bds_tqq"></a>
					<a class="bds_renren"></a>
					<a class="bds_tieba"></a>
				</div>
				<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=231046"></script>
				<script type="text/javascript" id="bdshell_js"></script>
				<script type="text/javascript">
				document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
				</script>
				<!-- Baidu Button END -->
				</div>
			</div>
		</div>
		<?php blog_comments($comments); ?>
		<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
		<div style="clear:both;"></div>
    </div>
<?php
 include View::getView('footer');
?>