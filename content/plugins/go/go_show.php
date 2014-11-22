<?php
!defined('EMLOG_ROOT') && exit('access deined!');
$id = addslashes($_GET['i']);
include(EMLOG_ROOT.'/content/plugins/go/go_config.php');
$config = constant("GO_CONFIG");
$name = explode(chr(9), $config);
foreach ($name as $value)
{ 
	$name2 = explode(',', $value);
	if (count($name2) == 3)
	{
		if(strcmp($id , $name2[0])==0)
		{
		$url = $name2[1];
		break;
		}
	}
}

//没有地址就跳转到默认页
if($url==''){
$url=BLOG_URL;
}
//echo $url; 
//开始跳转
Header( "HTTP/1.1 301 Moved Permanently" );   
Header( "Location:".$url );
?>