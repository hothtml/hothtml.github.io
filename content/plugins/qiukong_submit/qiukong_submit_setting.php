<?php
function qiukong(){die('<!DOCTYPE HTML><a href="http://qiukong.com">qiukong.com</a>');}
function set($var){$set = file(dirname(__FILE__).'/qiukong.com.php');return trim($set[$var]);}
function fly($var){return trim(addslashes(htmlspecialchars(strip_tags($var))));}
if(!defined('EMLOG_ROOT')){qiukong();}
if(!file_exists(dirname(__FILE__).'/qiukong.com.php')){qiukong();}
$qk = isset($_GET['qk'])?intval($_GET['qk']):0;
function plugin_setting_view(){
?>
<p><b>信息</b></p>
<?php
if(!file_exists(dirname(__FILE__).'/qiukong.com.zzz')){echo '<a href="./plugin.php?plugin=qiukong_submit&amp;qk=2">[注意] 插件未正确开启，点此修复！ 若仍无法解决，请检查目录写入权限。</a><br />';}
?>
<form action="./plugin.php?plugin=qiukong_submit&amp;qk=1" method="post" enctype="multipart/form-data">
请复制投稿页面地址，加至导航栏或其它位置。感谢您的使用！<br />
投稿页面：<a href="<?php echo BLOG_URL;?>?plugin=qiukong_submit" target="_blank"><?php echo BLOG_URL;?>?plugin=qiukong_submit</a><br />
作者主页：<a href="http://qiukong.com" target="_blank">http://qiukong.com</a><br />
<p><b>开关</b></p>
投稿：
<input type="radio" name="set1" value="0" <?php if(set('1') == '0'){echo 'checked="checked"';} ?> />放入草稿
<input type="radio" name="set1" value="1" <?php if(set('1') == '1'){echo 'checked="checked"';} ?> />文章审核
<input type="radio" name="set1" value="2" <?php if(set('1') == '2'){echo 'checked="checked"';} ?> />直接通过
<br />
内容：
<input type="radio" name="set2" value="0" <?php if(set('2') == '0'){echo 'checked="checked"';} ?> />关闭
<input type="radio" name="set2" value="1" <?php if(set('2') == '1'){echo 'checked="checked"';} ?> />开启
<input type="radio" name="set2" value="2" <?php if(set('2') == '2'){echo 'checked="checked"';} ?> />强制中文
<br />
摘要：
<input type="radio" name="set3" value="0" <?php if(set('3') == '0'){echo 'checked="checked"';} ?> />关闭
<input type="radio" name="set3" value="1" <?php if(set('3') == '1'){echo 'checked="checked"';} ?> />开启
<input type="radio" name="set3" value="2" <?php if(set('3') == '2'){echo 'checked="checked"';} ?> />强制中文
<br />
标签：
<input type="radio" name="set4" value="0" <?php if(set('4') == '0'){echo 'checked="checked"';} ?> />关闭
<input type="radio" name="set4" value="1" <?php if(set('4') == '1'){echo 'checked="checked"';} ?> />开启
<input type="radio" name="set4" value="2" <?php if(set('4') == '2'){echo 'checked="checked"';} ?> />强制
<br />
贴图：
<input type="radio" name="set5" value="0" <?php if(set('5') == '0'){echo 'checked="checked"';} ?> />关闭
<input type="radio" name="set5" value="1" <?php if(set('5') == '1'){echo 'checked="checked"';} ?> />开启
<input type="radio" name="set5" value="2" <?php if(set('5') == '2'){echo 'checked="checked"';} ?> />强制
<br />
评论：
<input type="radio" name="set6" value="0" <?php if(set('6') == '0'){echo 'checked="checked"';} ?> />关闭
<input type="radio" name="set6" value="1" <?php if(set('6') == '1'){echo 'checked="checked"';} ?> />开启
<br />
验证：
<input type="radio" name="set7" value="0" <?php if(set('7') == '0'){echo 'checked="checked"';} ?> />关闭
<input type="radio" name="set7" value="1" <?php if(set('7') == '1'){echo 'checked="checked"';} ?> />开启
<br />
<p><b>选项</b></p>
<input name="set8" maxlength="10" style="width:80px;" value="<?php echo set('8'); ?>"> 分类（-3强制，-2开启，-1未分类，0无分类，0以上指定分类ID）[初始"-2"]<br />
<input name="set9" maxlength="10" style="width:80px;" value="<?php echo set('9'); ?>"> 作者（0无作者，0以上指定作者ID）[初始"0"]<br />
<input name="set10" maxlength="50" style="width:80px;" value="<?php echo set('10'); ?>"> 模板（填写插件目录中的模板名称）[初始"default"]<br />
<input name="set11" maxlength="50" style="width:80px;" value="<?php echo set('11'); ?>"> 防护（同IP投稿间隔，不超过SESSION周期，一般小于1200秒）[初始"60"]<br />
<input name="set12" maxlength="50" style="width:80px;" value="<?php echo set('12'); ?>"> 上限（每日最多投稿数量，0为无限制）[初始"500"]<br />
<?php if(set('5')!=0){ ?>
<p><b>贴图</b></p>
请到<a href="http://open.tietuku.com" target="_blank">贴图库</a>获取密钥及相册ID<br />
<input type="radio" name="set13" value="1" <?php if(set('13') == '1'){echo 'checked="checked"';} ?> /> 封面尺寸
<input type="radio" name="set13" value="2" <?php if(set('13') == '2'){echo 'checked="checked"';} ?> /> 展示尺寸
<input type="radio" name="set13" value="3" <?php if(set('13') == '3'){echo 'checked="checked"';} ?> /> 原图尺寸
<br />
<input type="radio" name="set14" value="1" <?php if(set('14') == '1'){echo 'checked="checked"';} ?> /> 链接关闭
<input type="radio" name="set14" value="2" <?php if(set('14') == '2'){echo 'checked="checked"';} ?> /> 链接官网
<input type="radio" name="set14" value="3" <?php if(set('14') == '3'){echo 'checked="checked"';} ?> /> 链接原图
<br />
<input name="set15" maxlength="50" style="width:80px;" value="<?php echo set('15'); ?>"> ACCESSKEY<br />
<input name="set16" maxlength="50" style="width:80px;" value="<?php echo set('16'); ?>"> SECRETKEY<br />
<input name="set17" maxlength="50" style="width:80px;" value="<?php echo set('17'); ?>"> 相册ID<br />
<?php } ?>
<p><input type="submit" value="提交" onclick="return submit();"></p>
</form>
<?php }
if($qk=='1'){
$set1 = isset($_POST['set1']) ? fly($_POST['set1']) : '0';
$set2 = isset($_POST['set2']) ? fly($_POST['set2']) : '1';
$set3 = isset($_POST['set3']) ? fly($_POST['set3']) : '0';
$set4 = isset($_POST['set4']) ? fly($_POST['set4']) : '1';
$set5 = isset($_POST['set5']) ? fly($_POST['set5']) : '0';
$set6 = isset($_POST['set6']) ? fly($_POST['set6']) : '1';
$set7 = isset($_POST['set7']) ? fly($_POST['set7']) : '1';
$set8 = isset($_POST['set8']) ? fly($_POST['set8']) : '-2';
$set9 = isset($_POST['set9']) ? fly($_POST['set9']) : '0';
$set10 = isset($_POST['set10']) ? fly($_POST['set10']) : 'default';
$set11 = isset($_POST['set11']) ? fly($_POST['set11']) : '60';
$set12 = isset($_POST['set12']) ? fly($_POST['set12']) : '500';
$set13 = isset($_POST['set13']) ? fly($_POST['set13']) : '2';
$set14 = isset($_POST['set14']) ? fly($_POST['set14']) : '2';
$set15 = isset($_POST['set15']) ? fly($_POST['set15']) : '';
$set16 = isset($_POST['set16']) ? fly($_POST['set16']) : '';
$set17 = isset($_POST['set17']) ? fly($_POST['set17']) : '';
$set = "<?php die; '\r\n".$set1."\r\n".$set2."\r\n".$set3."\r\n".$set4."\r\n".$set5."\r\n".$set6."\r\n".$set7."\r\n".$set8."\r\n".$set9."\r\n".$set10."\r\n".$set11."\r\n".$set12."\r\n".$set13."\r\n".$set14."\r\n".$set15."\r\n".$set16."\r\n".$set17."\r\n'; ?>";
file_put_contents(dirname(__FILE__).'/qiukong.com.php',$set);
header('Location:./plugin.php?plugin=qiukong_submit');
}
if($qk=='2'){
fopen(dirname(__FILE__).'/qiukong.com.zzz','w+');
header('Location:./plugin.php?plugin=qiukong_submit');
}
?>