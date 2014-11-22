<?php 
!defined('EMLOG_ROOT') && exit('access deined!');

if(file_exists(dirname(__FILE__).'/ypcdn_config.php')){
	include ('ypcdn_config.php');
}

function plugin_setting_view(){

?>
<div class="com-hd">
<h2>又拍云镜像存储设置</h2>
	<?php
	if( isset($_GET['setting']) ){
		echo "<span class='actived'>设置保存成功!</span>";
	}
	?>
</div>
受到EMLOG接口限制，不能够将所有的文件链接都替换为又拍云的链接。<br>
如果需要全部替换，需要修改模板，<span style="color:red;font-weight:bold">请严格按照下面操作！</span><br>
<span style="color:blue">请修改模板中的header.php，将&lt;?php doAction('index_head'); ?&gt;移到&lt;head&gt;标签后。</span>
<form action="plugin.php?plugin=ypcdn&action=setting" method="post">
	<table class="tb-set">
		<tr>
			<td align="right" width="25%"><b>又拍云绑定的域名</b></td>
			<td width="75%"><input type="text" name="cdn_host" size="50" value="<?php echo isset($config['cdn_host']) ? $config['cdn_host'] : null;?>"  /></td>
		</tr>
		<tr>
				<td align="right" width="25%"><b>&nbsp;</b></td>
				<td width="75%">请填写你在又拍云绑定的域名，一般为xxx.upaiyun.com或xxx.b0.upaiyun.com。</td>
			</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="保存" /></td>
		</tr>
	</table>
</form>
<?php 
}

function plugin_setting() {
	$cdn_host = trim($_POST['cdn_host'], '/ ');
	$cdn_host = str_replace('http://', '', $cdn_host);
	$newConfig = '<?php
	$config = array(
		"cdn_host" => "'.$cdn_host.'" //又拍云提供的二级域名或你绑定在又拍云的域名
	);';
	if(! file_put_contents ( EMLOG_ROOT . '/content/plugins/ypcdn/ypcdn_config.php', $newConfig )){
		die('生成配置文件失败，请检查目录是否有相应权限');
	};
}
?>