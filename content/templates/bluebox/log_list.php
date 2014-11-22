<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

	<div id="main">
		<?php doAction('index_loglist_top'); ?>
		<?php foreach($logs as $value): ?>
		<div class="loop">
			<div class="content">
				<?php 
				$img = pic_thumb($value['content']);
				if(empty($img)):?>
				<p>
				<?php echo changeHtml($value['log_description'], 80); ?>
					<span class="more"><a href="<?php echo $value['log_url']; ?>" title="阅读全文">更多»</a></span>
				</p>
				<?php else: ?>
				<a href="<?php echo $value['log_url']; ?>"><img src="<?php echo $img; ?>" /></a>
				<?php endif; ?>
			</div>
			<h3><a href="<?php echo $value['log_url']; ?>" title="<?php echo $value['log_title']; ?>"><?php echo subString($value['log_title'], 0, 15); ?></a></h3>
			<div class="date">
				<?php echo gmdate('Y-n-j G:i l', $value['date']); ?>
				<div class="num">
					<a href="<?php echo $value['log_url']; ?>#comments" title="评论"><span class="com"></span>&nbsp;<span class="ds-thread-count" data-thread-key=""><?php echo $value['comnum']; ?></span></a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<div style="clear: both"></div>
		<div class="row">
		<div id="pagenavi" class="right">
			<?php echo $page_url;?>
		</div>
		</div>
	</div>	

<?php
 //include View::getView('side');
 include View::getView('footer');
?>
