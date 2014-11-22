<?php 
/*
* 侧边栏组件、页面模块
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>

<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
	?>
	
	<h3><span><?php echo $title; ?></span></h3>
	<div id="link">
	<ul>
	<?php foreach($link_cache as $value): ?>
	<li>
	<a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?></ul></div>
	
<?php }?>


<?php
//blog：导航
function blog_navi(){
        global $CACHE; 
        $navi_cache = $CACHE->readCache('navi');
        ?>
        <ul>
        <?php 
        foreach($navi_cache as $value):
                if($value['url'] == 'admin' && (ROLE == 'admin' || ROLE == 'writer')):
                        ?>
                        <li class="common"><a href="<?php echo BLOG_URL; ?>admin/write_log.php">写日志</a></li>
                        <li class="common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
                        <li class="common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
                        <?php 
                        continue;
                endif;
                $newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
                $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
                $current_tab = (BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url']) ? 'current' : 'common';
                ?>
                <li class="<?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
        <?php endforeach; ?>
        </ul>
<?php }?>


<?php
//blog：置顶
function topflg($istop){
	$topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.gif\" title=\"置顶日志\" /> " : '';
	echo $topflg;
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	分类：<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：文件附件
function blog_att($blogid){
	global $CACHE;
	$log_cache_atts = $CACHE->readCache('logatts');
	$att = '';
	if(!empty($log_cache_atts[$blogid])){
		$att .= '附件下载：';
		foreach($log_cache_atts[$blogid] as $val){
			$att .= '<br /><a href="'.BLOG_URL.$val['url'].'" target="_blank">'.$val['filename'].'</a> '.$val['size'];
		}
	}
	echo $att;
}
?>
<?php
//blog：日志标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：日志作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻日志
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	<div class="alignleft">&laquo; 上一篇文章 : <a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></div>
	<?php else:?>
	<div class="alignleft">&laquo; 上一篇文章 : 博主还在酝酿中</div>
	<?php endif;?>
	
	<?php if($nextLog && $prevLog):?>
		
	<?php endif;?>
	<?php if($nextLog):?>
	<div class="alignright"><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a> : 下一篇文章 &raquo;</div>
	<?php else:?>
	<div class="alignright"> 下一篇文章 : 这个真没有！&raquo;</div>
	<?php endif;?>
<?php }?>
<?php
//blog：引用通告
function blog_trackback($tb, $tb_url, $allow_tb){
    if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
	<div id="trackback_address">
	<p>引用地址: <input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
	<a name="tb"></a></p>
	</div>
	<?php endif; ?>
	<?php foreach($tb as $key=>$value):?>
		<ul id="trackback">
		<li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
		<li>BLOG: <?php echo $value['blog_name'];?></li><li><?php echo $value['date'];?></li>
		</ul>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
	
	<h3 id="comments-title">评论（<?php echo count($comments);?>）</h3>
		<a name="comments"></a>
	<ol class="commentlist">
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
		<li class="comment depth-1" id="li-comment-<?php echo $comment['cid']; ?>">
		     <a name="<?php echo $comment['cid']; ?>"></a>
            <div id="comment-<?php echo $comment['cid']; ?>" class="comment-body">
		        <div class="comment-content">
			    <div class="comment-author">
				
				    <div class="comment-avatar">
					<?php if($isGravatar == 'y'): ?><img class="avatar avatar-45 photo" height="45" width="45" src="<?php echo getGravatar($comment['mail'],45); ?>" /><?php endif; ?>
					      
				    </div><!-- .comment-avatar -->
				    <div class="comment-info">
					<?php echo $comment['poster']; ?>  <br><?php echo $comment['date']; ?>				</div><!-- .comment-info -->
			    </div><!-- .comment-author -->
                        <div class="comment-text">
                        <?php echo $comment['content']; ?>
                        </div><!-- .comment-text -->
			                    <div class="comment-reply">
                                <a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>
								</div><!-- .comment-reply -->
			          <div class="clearfix"></div>
                </div><!-- .comment-content -->
                       <div class="clearfix"></div>
            </div><!-- .comment-hcom -->
         <?php blog_comments_children($comments, $comment['children']); ?>
        </li>
    <?php endforeach; ?>
	
	</ol>
	<div id="pagenavi">
	    <?php echo $commentPageUrl;?>
    </div>
	<?php endif; ?>

<?php }?>

<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	
	<ul class="children">
    <li class="depth-2" id="li-comment-<?php echo $comment['cid']; ?>">
    <div id="comment-<?php echo $comment['cid']; ?>" class="comment-body">
		<div class="comment-content">
			<div class="comment-author">
				<div class="comment-avatar">
					<?php if($isGravatar == 'y'): ?><img class="avatar avatar-45 photo" height="45" width="45" src="<?php echo getGravatar($comment['mail'],45); ?>" /><?php endif; ?>
				</div><!-- .comment-avatar -->
				 <div class="comment-info">
					<?php echo $comment['poster']; ?> <br><?php echo $comment['date']; ?>			</div><!-- .comment-info -->
			</div><!-- .comment-author -->
                        <div class="comment-text">
                 <?php echo $comment['content']; ?>
            </div><!-- .comment-text -->
			<?php if($comment['level'] < 4): ?><div class="comment-reply">
                                <a href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a>
            
			</div><!-- .comment-reply --><?php endif; ?>
			<div class="clearfix"></div>
        </div><!-- .comment-content -->
        <div class="clearfix"></div>
    </div><!-- .comment-hcom -->
<?php blog_comments_children($comments, $comment['children']);?>
</li>
<?php endforeach; ?>
</ul>

<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
	
	
	<div id="respond">
		<h3 id="reply-title">发表评论 <a name="respond"></a>
		   <small>
		<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
		   </small>
		</h3>
		
		
			<form action="<?php echo BLOG_URL; ?>index.php?action=addcom" method="post" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == 'visitor'): ?>
				<p class="comment-notes">电子邮件地址不会被公开。 必填项已用 <span class="required">*</span> 标注
				</p>							
				<p class="comment-form-author">
				    <label for="author">姓名</label> <span class="required">*</span><input id="author" name="comname" type="text" value="" size="30" aria-required="true">
				</p>
                <p class="comment-form-email"><label for="email">电子邮件</label> <span class="required">*</span><input id="email" name="commail" type="text" value="" size="30" aria-required="true">
				</p>
                <p class="comment-form-url">
				   <label for="url">站点</label>
				<input id="url" name="comurl" type="text" value="" size="30">
				</p>
				
	<?php endif; ?>	
				<p class="comment-form-comment">
				   <label for="comment">评论</label>
				<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
				</p>						
									
				<p class="form-submit">
				<p><?php echo $verifyCode; ?> </p>
				<input name="submit" type="submit" id="submit" value="发表评论(Ctrl+Enter)">
				<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
                <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
				</p>
			</form>
	</div>
	
	
	
	
	
	
		
		
		
		
		
	</div>
	</div>
	<?php endif; ?>
<?php }?>