<?php
!defined('EMLOG_ROOT') && exit('access deined!');
$show_type = isset($_GET['show_type']) ? addslashes($_GET['show_type']) : 'record';
global $CACHE;
$options_cache = $CACHE->readCache('options');
$DB = MySql::getInstance();
$res = $DB->once_fetch_array("SELECT naviname, hide FROM ".DB_PREFIX."navi WHERE url='".BLOG_URL."?plugin=archiver'");
$site_title = $res['naviname'].' - '.Option::get('blogname');
$log_title = $res['naviname'];
$blogname = Option::get('blogname');
$site_description = $bloginfo = Option::get('bloginfo');
$site_key = Option::get('site_key');
$istwitter = Option::get('istwitter');
$comments = array("commentStacks" => array());
$ckname = $ckmail = $ckurl = $verifyCode = false;
$icp = Option::get('icp');
$footer_info = Option::get('footer_info');
if($res['hide'] == 'y' || !function_exists('displaySort') || !function_exists('displayRecord')) emMsg('不存在的页面！');
emLoadJQuery();
include View::getView('header');

$log_content = '<h3><input type="radio" name="show_type" onclick="switchtype(this.value)" value="record" ';
if($show_type != 'sort'){
	$log_content .= 'checked="checked" ';
}
$log_content .= '/> 按日期显示 <input type="radio" name="show_type" onclick="switchtype(this.value)" value="sort" ';
if($show_type == 'sort'){
	$log_content .= 'checked="checked" ';
}
$log_content .= '/> 按分类显示</h3>';
$show_type == 'sort' ? $log_content .= displaySort() : $log_content .= displayRecord();

?>
<style type="text/css">
.archiver li {margin-left:1em;padding:2px;font-size:14px;}
.archiver li span {font-size:12px;}
ol.archiver_item li {margin-left:1em;}
</style>
<script type="text/javascript">
function switchtype(type){
	window.location = '<?php echo BLOG_URL; ?>?plugin=archiver&show_type=' + type;
}
jQuery(function($){
  if ($('ul.archiver').length) {
    $('ul.archiver').find('.archiver_item:gt(3)').hide();
    $('ul.archiver').find('h4').on('click', function(){
      $(this).next('.archiver_item').slideToggle();
    })
  }
})
</script>
<?php
include View::getView('page');
?>