<?php 
/**
 * 天天聚团购
 * @copyright (c) Emlog All Rights Reserved
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
function plugin_setting_view(){
require_once('ttjtg_lianmeng_config.php');	 	 
?>
<script>$("#ttjtg_lianmeng").addClass('sidebarsubmenu1');</script>
<div class=containertitle><b>团团说工作室-淘宝联盟设置</b>
<?php if(isset($_GET['setting'])):?><span class="actived">插件设置完成</span><?php endif;?>
</div>
<div class=line></div>
<form action="plugin.php?plugin=ttjtg_lianmeng&action=setting" method="post">
<div>

<p>是否开启本插件：
<label>  
<input type="radio" name="lianjie" value="0" <?php if($lianjie=='0') echo "checked=\"checked\"";?> />开启
<input type="radio" name="lianjie" value="1" <?php if($lianjie=='1') echo "checked=\"checked\"";?> />关闭</label></p>

<p>关闭后显示语句：	
<textarea name="soure" cols="40" rows="3"  style="width:400px;height:30px"><?php echo $soure;?></textarea>&nbsp;&nbsp;&nbsp;&nbsp;（输入关闭后显示的语句）</p>	
</p>

<p>输&nbsp;&nbsp;入 u rl 地&nbsp;&nbsp;址：	
<textarea name="url" cols="40" rows="3"  style="width:400px;height:40px"><?php echo $url;?></textarea>&nbsp;&nbsp;&nbsp;&nbsp;（输入url地址，<a href="http://www.alimama.com/"target="_blank">点击获取推广连接</a>，注意用淘宝账号登陆）</p>	
</p>

<p>向上移动屏遮条：	
<input size="5" name="xiangshang" type="text" value="<?php echo $xiangshang; ?>" /></input>&nbsp;&nbsp;&nbsp;&nbsp;（向上移动，屏遮上面导航条，一般是30，自己试一下吧，调到最佳）</p>
</p>	

<p>适配网页的高度：	
<input size="5" name="gaodu" type="text" value="<?php echo $gaodu; ?>" /></input>&nbsp;&nbsp;&nbsp;&nbsp;（推广网页的高度，不同的推广页面高度是不一样的，自行调一下吧）</p>
</p>

<p><input type="submit" value="保 存" class="submit" /></p>
</div>
<script language="JavaScript" type="text/javascript" src="http://fx.51fkgo.com/include/gonggao.html">
</script>
</form>


<script>
$("#ttjtg_lianmeng_setting").addClass('sidebarsubmenu1');
</script>
<?php 
}
function plugin_setting()
{
	$lianjie = isset($_POST['lianjie']) ? trim($_POST['lianjie']) : '';
	$url = isset($_POST['url']) ? trim($_POST['url']) : '';
	$gaodu = isset($_POST['gaodu']) ? trim($_POST['gaodu']) : '';
	$soure = isset($_POST['soure']) ? trim($_POST['soure']) : '';
	$xiangshang = isset($_POST['xiangshang']) ? trim($_POST['xiangshang']) : '';
	print_r($_POST);
	 
$data = "<?php
\$lianjie = '".$lianjie."';
\$url = '".$url."';
\$gaodu = '".$gaodu."';
\$soure = '".$soure."';
\$xiangshang = '".$xiangshang."';
?>";
	if($xiangshang != '' && $url != '' && $lianjie != ''&& $gaodu != ''&& $soure != '')
	{
		$file = EMLOG_ROOT.'/content/plugins/ttjtg_lianmeng/ttjtg_lianmeng_config.php';
		@ $fp = fopen($file, 'wb') OR emMsg('读取文件失败，如果您使用的是Unix/Linux主机，请修改文件/content/plugins/ttjtg_lianmeng/ttjtg_lianmeng_config.php的权限为777。如果您使用的是Windows主机，请联系管理员，将该文件设为everyone可写');
		@ $fw =	fwrite($fp,$data) OR emMsg('写入文件失败，如果您使用的是Unix/Linux主机，请修改文件/content/plugins/ttjtg_lianmeng/ttjtg_lianmeng_config.php的权限为777。如果您使用的是Windows主机，请联系管理员，将该文件设为everyone可写');
		fclose($fp);
	}
}
?>