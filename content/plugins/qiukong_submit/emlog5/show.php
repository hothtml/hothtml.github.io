<?php if(!isset($qk)){die;}
include_once('head.php');
$Sort_Model = new Sort_Model();
$sorts = $Sort_Model->getSorts();
echo '<script language="JavaScript" type="text/JavaScript">function qkt(){if(document.all.title.value==""){alert("请填写标题");return false;}';
if(set('4') == 2){echo 'if(document.all.tags.value==""){alert("请填写标签");return false;}';}
if(set('8') == -3){echo 'if(document.all.sortid.value=="-1"){alert("请选择分类");return false;}';}
if(set('7') == 1){echo 'if(document.all.gcode.value==""){alert("验证码为空");return false;}';}
if(set('5') == 2){echo 'if(document.getElementById("file").value==""){alert("请选择贴图");return false;}';}
if(set('5') != 0){echo 'qkf=document.getElementById("file").files[0];qke=qkf.name.substr(qkf.name.lastIndexOf(".")).toLowerCase();if(qke!=".jpg" && qke!=".jpeg" && qke!=".png" && qke!=".gif"){alert("贴图类型错误");return false;}if(qkf.size>'.$maxu.'){alert("贴图文件过大");return false;}';}
echo 'else{return checkform();}}</script><div class="containertitle"><b>写文章</b></div><form action="./?plugin=qiukong_submit&amp;qk=1" method="post" enctype="multipart/form-data" id="addlog" name="addlog"><div id="post"><div><label for="title" id="title_label">输入文章标题</label><input type="text" maxlength="200" name="title" id="title"/></div>';
if(set('2') != '0' or set('3') != '0'){echo '<script charset="utf-8" src="./admin/editor/kindeditor.js"></script>';}
if(set('2') != '0'){echo '<div><textarea id="text" name="text" style="width:845px; height:460px;"></textarea><script>loadEditor(\'text\');</script></div>';}
echo '<div style="margin:10px 0px 5px 0px;">';
if(set('4') != '0'){echo '<label for="tag" id="tag_label">文章标签，逗号或空格分隔，过多的标签会影响系统运行效率</label><input name="tags" id="tag" maxlength="200"/> ';}
if(set('8') < -1){echo '<select name="sortid" id="sort" style="width:130px;"><option value="-1">选择分类...</option>';foreach($sorts as $val){echo '<option value='.$val['sid'].'>'.$val['sortname'].'</option>';}echo '</select> ';}
if(set('5') != '0'){echo '<input name="file" type="file" style="width:150px;" />（贴图限制'.ini_get('upload_max_filesize').'）';}
echo '</div>';
if(set('3') != '0'){echo '<div class="show_advset" onclick="displayToggle(\'advset\', 1);">高级选项</div><div id="advset"><div>文章摘要：</div><div><textarea id="summ" name="summ" style="width:845px; height:260px;"></textarea><script>loadEditor(\'summ\');</script></div></div>';}
echo '<div id="post_button">';
if(set('7') != '0'){echo '<img src="'.BLOG_URL.'include/lib/checkcode.php" onclick="this.src=this.src+\'?\'" /> <input name="gcode" maxlength="10" style="15px;" /> ';}
echo '<input class="button" type="submit" value="发布文章" onclick="return qkt();" /></div></div></form><div class="line"></div>';
include_once('foot.php');
?>