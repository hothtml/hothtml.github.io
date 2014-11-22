<?php
/**
 * go_setting.php
 */

!defined('EMLOG_ROOT') && exit('access deined!');
?>
<?php
function plugin_setting()//大家都用这个子程序来保存配置,我也用这个.
{
//修改配置信息
	$fso = fopen(EMLOG_ROOT.'/content/plugins/go/go_config.php','r'); //获取配置文件内容
	$config = fread($fso,filesize(EMLOG_ROOT.'/content/plugins/go/go_config.php'));
	fclose($fso);
	include(EMLOG_ROOT.'/content/plugins/go/go_config.php');
	$set = intval($_GET['set']);
	if($set == 1)//判断 = 1
	{
	$bs=htmlspecialchars($_POST['bs'], ENT_QUOTES);//这个代码感觉可以被优化,但我不知道怎么写
	$sjdz=htmlspecialchars($_POST['sjdz'], ENT_QUOTES);
	$bz=htmlspecialchars($_POST['bz'], ENT_QUOTES);
	 if($bs!=="" && $sjdz!=="" && $bz!=="" && $bs!=="如：baidu" && $sjdz!=="如：http://www.baidu.com" && $bz!=="如：这个是百度的链接" && substr($sjdz,0,4)=="http")
		{//开始检查是否存在 
		$jiancha = 0;
		$config_jc = constant("GO_CONFIG");
		$name_jc = explode(chr(9), $config_jc);
		foreach ($name_jc as $value_jc)
			{ 
			$name2_jc = explode(',', $value_jc);
				if (count($name2_jc) == 3)
				{
					if(strcmp($bs , $name2_jc[0])==0)
						{
						$jiancha = 1;//存在了
						break;
						}
				}
			}
			
			if($jiancha == 0)//检查是否已经存在了 0=不存在 1=存在
			{
			$patt = array("/define\('GO_CONFIG',(.*)\)/");
			$replace = array("define('GO_CONFIG','".constant("GO_CONFIG").chr(9).$bs.",".$sjdz.",".$bz."')");
			$new_config = preg_replace($patt, $replace, $config);
			$fso = fopen(EMLOG_ROOT.'/content/plugins/go/go_config.php','w'); //写入替换后的配置文件 说真的,我都不知道这个 if里写的啥
			fwrite($fso,$new_config);
			fclose($fso);//关闭文件
			}

		}
	}
	if($set == 2)//判断 = 2 删除某个链接
	{
	$id_sc = htmlspecialchars($_POST['bs1'], ENT_QUOTES);;
	$config_sc = constant("GO_CONFIG");
	$name_sc = explode(chr(9), $config_sc);
	$shuju="";
	foreach ($name_sc as $value_sc)
		{
		if(substr($value_sc,0,strlen($id_sc)+1) !== $id_sc.",")
			{
			if($shuju == "")
				{
				$shuju = $value_sc;
				}
			else {
				 $shuju = $shuju.chr(9).$value_sc;//把不一样的记录下来
				 }
			}
		}
		//开始写入数据
		$patt_sc = array("/define\('GO_CONFIG',(.*)\)/");
		$replace_sc = array("define('GO_CONFIG','".$shuju."')");
		$new_config_sc = preg_replace($patt_sc, $replace_sc, $config);
		$fso_sc = fopen(EMLOG_ROOT.'/content/plugins/go/go_config.php','w'); 
		fwrite($fso_sc,$new_config_sc);
		fclose($fso_sc);//关闭文件
	}
}
function plugin_setting_view()//这个子程序是干什么的？
{
	include(EMLOG_ROOT.'/content/plugins/go/go_config.php');
}
?>
<div class=containertitle><b>301插件设置</b>
<?php if(isset($_GET['setting'])):?><span class="actived">插件设置完成</span><?php endif;?>
</div><div class=line></div>
<style type="text/css">
.table_b { float:left;border-collapse: collapse;border-style: none; border:1px solid #ccc; width:844px;}
.table_b td { border:1px solid #e0e0e0; padding:2px 5px; height:20px}
.table_b1 { float:left;border-collapse: collapse;border-style: none; border:1px solid #ccc; width:844px;}
</style>
<script language="javascript">
   function copyToClipBoard(element,txt){
    var clipBoardContent="";
	obj = element.previousSibling;
    clipBoardContent=txt+obj.value;
	obj.select();
    window.clipboardData.setData("Text",clipBoardContent);
    alert("复制成功！");
}

function aa(obj)
{
var str=document.getElementById(obj).value;
if(str=="如：baidu" || str=="如：http://www.baidu.com" || str=="如：这个是百度的链接") //如果是默认值的时候才清除，否则保留
{
      document.getElementById(obj).value="";
}
}

</script>

<form name="form1" method="post" action="plugin.php?plugin=go&action=setting&set=1">
  <table width="100%" cellspacing="1" class="table_b">
    <tr>
      <td width="182" >地址标识：<input name="bs" type="text" id="bs" onfocus="aa('bs')" style="width:100px;" value="如：baidu" /></td>
      <td width="328" >实际地址:
      <input name="sjdz" type="text" id="sjdz" onfocus="aa('sjdz')" style="width:250px;" value="如：http://www.baidu.com" /></td>
      <td width="253">备注：
      <input name="bz" type="text" id="bz" onfocus="aa('bz')" style="width:195px;" value="如：这个是百度的链接" /></td>
      <td width="66"><div align="center">
        <input name="anniu" type="submit" value="添加" ><!--这里想写表单验证的,没写成-->
      </div></td>
    </tr>
  </table>
</form>
<hr />
  <!--标识=bs，实际地址=sjdz，bz=备注-->
<table width="100%" cellspacing="1" class="table_b">
  <tr>
    <td width="217"><div align="center">地址标识</div></td>
    <td width="391"><div align="center" >实际地址</div></td>
    <td width="285"><div align="center">备注</div></td>
    <td width="98"><div align="center" >操作</div></td>
  </tr>
 </table>
  <?php //开始循环输出已经存在的301跳转信息
	include(EMLOG_ROOT.'/content/plugins/go/go_config.php');
	$config_xh = constant("GO_CONFIG");
	$name_xh = explode(chr(9), $config_xh);
	$i=0;
	while($i<=count($name_xh))//这个for循环合适吗?
	{
	$name_xh2 = explode(',', $name_xh[count($name_xh) - $i]);
		if (count($name_xh2) == 3)
			{
  ?>
  <form method="post" action="plugin.php?plugin=go&action=setting&set=2&id=<?php echo $name_xh2[0]?>">
    <table width="100%" cellspacing="1" class="table_b">
  	<tr>
    <td width="27%"><div align="center">
      <input name="bs1" type="text" style="width:140px;" value="<?php echo $name_xh2[0]?>"><a href="#" onclick="javascript:copyToClipBoard(this,'<?php echo BLOG_URL."?plugin=go&i="?>')" title="点击复制转换后的链接地址">点击复制</a>
      &nbsp;<a href="<?php echo BLOG_URL."?plugin=go&i=".$name_xh2[0]?>" target="_blank"><img  title="打开重定向地址" border="0" src="./views/images/vlog.gif" /></a> </div></td>
    <td width="33%"><div align="center"><input type="text"  style="width:95%;" value="<?php echo $name_xh2[1]?>"></div></td>
    <td width="27%"><div align="center"><input type="text"  style="width:95%;" value="<?php echo $name_xh2[2]?>"></div></td>
    <td width="12%"><div align="center"> <input type="submit" value="删除转向" /></div></td>
    </tr>
    </table></form>
  <?php		}
	$i++;
//		if($i >= 10)
//		{
//		break;//只让输出10个 本来想写分页的,没写成 好像发现emlog A标签 get 传递参数是不行的，只能表单post(望高手指点迷津)
//		}
	}//while结束
  ?>
<hr />
<table width="100%" cellspacing="1" class="table_b1">
  <tr>
    <td height="40"><div style="padding:5px; border:1px dashed #CCC">本插件是新手编辑查百度编辑的(有易语言编程底子),老手勿喷!<span  style="color: #FF0000;">非IE浏览器复制链接有问题(没去做兼容.)</span><br>
      点击复制后得到一个跳转前的地址,如:标识为baidu,那么跳转前的地址为http://博客地址/?plugin=go&i=baidu<br>
      打开后就会跳转到实际地址.欢迎老手能够做一个文章输出时候的地址转换,那就不要预先设置了.<br>
	  注明:<span  style="color: #000099;">地址标识</span>不可以是一样的<strong>英文或数字</strong>，如果是一样的内部代码会自动屏蔽.地址标识只能是<span  style="color: #000099;">英文</span>,实际地址必须要加上<span  style="color: #000099;">http://</span>。</div></td>
  </tr>
</table>