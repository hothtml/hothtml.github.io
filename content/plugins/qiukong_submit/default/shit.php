<?php if(!isset($qk)){die;}
include_once('head.php');
if($hi == '1'){$log_content = '标题为空<br /><a href="javascript:history.back();">返回上页</a>';}
elseif($hi == '2'){$log_content = '内容缺少中文<br /><a href="javascript:history.back();">返回上页</a>';}
elseif($hi == '3'){$log_content = '摘要缺少中文<br /><a href="javascript:history.back();">返回上页</a>';}
elseif($hi == '4'){$log_content = '标签错误<br /><a href="javascript:history.back();">返回上页</a>';}
elseif($hi == '5'){$log_content = '贴图错误<br /><a href="javascript:history.back();">返回上页</a>';}
elseif($hi == '7'){$log_content = '验证错误<br /><a href="javascript:history.back();">返回上页</a>';unset($_SESSION['code']);}
elseif($hi == '8'){$log_content = '分类错误<br /><a href="javascript:history.back();">返回上页</a>';}
elseif($hi == '100'){$log_content = '投稿发布成功！<br />内容正在审核，感谢您的贡献！<br /><a href="./">返回首页</a> <a href="./?plugin=qiukong_submit">继续发布</a>';}
elseif($hi == '101'){$log_content = '贴图上传失败，内容顺利提交。<br />内容正在审核，感谢您的贡献！<br /><a href="./">返回首页</a> <a href="./?plugin=qiukong_submit">继续发布</a>';}
elseif($hi == '102'){$log_content = '投稿间隔小于'.set('11').'秒，请稍后再试。<br /><a href="./">返回首页</a> <a href="./?plugin=qiukong_submit">继续发布</a>';}
elseif($hi == '103'){$log_content = '今日投稿数量已达上限。<br /><a href="./">返回首页</a> <a href="./?plugin=qiukong_submit">继续发布</a>';}
else{
$log_content = '<a href="http://qiukong.com">qiukong.com</a>';
}
include_once('foot.php');
?>