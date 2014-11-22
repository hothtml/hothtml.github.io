<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content" class="w640 box">
<?php doAction('index_loglist_top'); ?>
<?php foreach($logs as $value): ?>
	<div id="post"class="post format-status ">
		<div class="post-ico ico_text"></div>
		<div class="side">
			<div class="day"><a href="<?php echo $value['log_url']; ?>"><?php echo gmdate('j', $value['date'])?></a></div>
			<div class="month"><a href="<?php echo $value['log_url']; ?>"><?php echo gmdate('n', $value['date'])?> </a></div>
		</div>
		<div class="main">
			<div class="title">
				<h2><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
				<div class="meta">
				    <?php blog_author($value['author']); ?>/
					<?php blog_sort($value['logid']); ?> /
					
					<?php echo gmdate('Y-n-j G:i l', $value['date']); ?> /
					<?php editflg($value['logid'],$value['author']); ?> 
				</div>   
			</div>
			<div class="entry">
				<?php echo $value['log_description']; ?>
				
			</div>
			
			<div class="tag"><?php blog_tag($value['logid']); ?></div>
			<p class="count">
	<a href="<?php echo $value['log_url']; ?>#comments">评论(<?php echo $value['comnum']; ?>)</a>
	<a href="<?php echo $value['log_url']; ?>#tb">引用(<?php echo $value['tbcount']; ?>)</a>
	<a href="<?php echo $value['log_url']; ?>">浏览(<?php echo $value['views']; ?>)</a>
	</p>

		
		</div>
	
	<div style="clearfix"></div>
	</div>
	<?php endforeach; ?>
	
	<div id="pagenavi">
	<?php echo $page_url;?>
    </div>
	</br>
<?php widget_link(''); ?>
</div>
	<!-- #End Post# --> 

	
	


<?php
 
 include View::getView('footer');
?>