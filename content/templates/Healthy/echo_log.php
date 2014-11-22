<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="content" class="w640 box">

<div id="single" class="single">
	<div class="main">
		<div class="title">
			<h2><strong><?php topflg($top); ?><font size="+3"><?php echo $log_title; ?></font></strong></h2>
			<div class="meta">
				<?php blog_author($author); ?> /<?php blog_sort($logid); ?>/
				<?php echo gmdate('Y-n-j G:i l', $date); ?> /
				<?php editflg($value['logid'],$value['author']); ?> 
								
			</div>   
		</div>

		<div class="entry">
		  <?php echo $log_content; ?>
		  
		</div>
		
		
		<p class="att"><?php blog_att($logid); ?></p>
		
		
	<?php doAction('log_related', $logData); ?>
	<div style="clear:both;"></div>
	    <div id="postnav">
             <?php neighbor_log($neighborLog); ?>
            <div class="clear"></div>
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


