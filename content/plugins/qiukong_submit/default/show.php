<?php if(!isset($qk)){die;}
include_once('head.php');
$Sort_Model = new Sort_Model();
$sorts = $Sort_Model->getSorts();
$log_content = '<script language="JavaScript" type="text/JavaScript">function qkt(){if(document.all.title.value==""){alert("请填写标题");return false;}';
if(set('4') == 2){$log_content .= 'if(document.all.tags.value==""){alert("请填写标签");return false;}';}
if(set('8') == -3){$log_content .= 'if(document.all.sortid.value=="-1"){alert("请选择分类");return false;}';}
if(set('7') == 1){$log_content .= 'if(document.all.gcode.value==""){alert("验证码为空");return false;}';}
if(set('5') == 2){$log_content .= 'if(document.getElementById("file").value==""){alert("请选择贴图");return false;}';}
if(set('5') != 0){$log_content .= 'qkf=document.getElementById("file").files[0];qke=qkf.name.substr(qkf.name.lastIndexOf(".")).toLowerCase();if(qke!=".jpg" && qke!=".jpeg" && qke!=".png" && qke!=".gif"){alert("贴图类型错误");return false;}if(qkf.size>'.$maxu.'){alert("贴图文件过大");return false;}';}
$log_content .= 'else{return checkform();}}</script><form action="./?plugin=qiukong_submit&amp;qk=1" method="post" enctype="multipart/form-data" name="addlog">标题：<br /><input name="title" maxlength="200" style="width:100%;" /><br /><br />';
if(set('2') != '0' or set('3') != '0'){$log_content .= '<script charset="utf-8" src="./admin/editor/kindeditor.js"></script>';}
if(set('2') == '2'){$tcn = '（必须有中文）';}else{$tcn = '';}if(set('3') == '2'){$scn = '（必须有中文）';}else{$scn = '';}
if(set('2') != '0'){$log_content .= '内容：'.$tcn.'<br /><textarea id="text" name="text" style="width:100%;height:400px;"></textarea><script>loadEditor(\'text\');</script><br />';}
if(set('3') != '0'){$log_content .= '摘要：'.$scn.'<br /><textarea id="summ" name="summ" style="width:100%;height:400px;"></textarea><script>loadEditor(\'summ\');</script><br />';}
if(set('5') != '0'){$log_content .= '贴图：（限制'.$maxp.'MB）<br /><div><input id="file" type="file" name="file" /></div><br />';}
$log_content .= '其它：<br />';
if(set('4') != '0'){$log_content .= '<input name="tags" maxlength="200" style="width:60%;" placeholder="空格分隔标签" /> ';}
if(set('8') < -1){$log_content .= '<select name="sortid" style="width:30%;"><option value="-1">选择分类...</option>';foreach($sorts as $val){$log_content .= '<option value='.$val['sid'].'>'.$val['sortname'].'</option>';}$log_content .= '</select>';}
if(set('4') != '0' or set('8') < -1){$log_content .= '<br /><br />';}
if(set('7') != '0'){$log_content .= '<img src="'.BLOG_URL.'include/lib/checkcode.php" onclick="this.src=this.src+\'?\'" /> <input name="gcode" maxlength="10" style="width:25%;" placeholder="验证码" /> ';}
$log_content .= '<input type="submit" value="提交" onclick="return qkt();" /></form><a href="http://qiukong.com"></a>';
include_once('foot.php');
?>