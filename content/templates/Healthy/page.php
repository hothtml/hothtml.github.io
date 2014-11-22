<?php 
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<div id="content" class="w640 box">

<div id="single" class="single">
	<div class="main">
		<div class="title">
			<h2><?php echo $log_title; ?></h2>
			
		</div>

		<div class="entry">
		  <?php echo $log_content; ?>
		  
		</div>
	    
	    <div style="clear:both;"></div>
	</div>
	<div id="comments">	
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	</div>
</div>

</div><!--end #contentleft-->
<?php

 include View::getView('footer');
?>


