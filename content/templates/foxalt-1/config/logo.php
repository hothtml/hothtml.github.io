<?php 
/*
* LOGO切换
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php if (_g('logo') == 'yes'): ?>
    <div id="headerlogo">
       <img src="<?php echo _g('header_logo'); ?>" width="200" height="80"/>
        </div>
    <?php else: ?>
     <div id="headersite">
  <h1><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
    <p><?php echo $bloginfo; ?></p>
    </div>
    <?php endif; ?>