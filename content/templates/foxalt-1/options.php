<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
 'logo' => array(
	    'type' => 'radio',
		'name' => 'LOGO样式',
		'values' => array(
			'yes' => '图片',
			'no' => '文字',
		),
		'default' => 'yes',
	),

'header_logo' => array(
        'type' => 'image',
        'name' => '头部LOGO',
        'values' => array(
            TEMPLATE_URL . 'images/logo.png',
        ),
    ),
	
	
	'skin' => array(
	    'type' => 'radio',
		'name' => '色彩切换',
		'description' => '更换模板色彩',
		'values' => array(
			'default' => '<img src="/content/templates/foxalt-1/images/1.png" alt="默认" />',
			'blue' => '<img src="/content/templates/foxalt-1/images/2.png" alt="蓝色"/>',
			'yellow' => '<img src="/content/templates/foxalt-1/images/3.png" alt="黄色"/>',
			'green' => '<img src="/content/templates/foxalt-1/images/4.png" alt="绿色"/>',
			'white' => '<img src="/content/templates/foxalt-1/images/5.png" alt="官方风格"/>',
		),
		'default' => 'default',
	),
         
		 'top' => array(
	    'type' => 'radio',
		'name' => '返回顶部',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
		 
		'jq_title' => array(
	    'type' => 'radio',
		'name' => '标题动画特效',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
		 
		'edtSearch' => array(
	    'type' => 'radio',
		'name' => '搜索框效果',
		'description' => '搜素框点击伸缩效果',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
		
		'imgbox' => array(
	    'type' => 'radio',
		'name' => '灯箱效果',
		'description' => '灯箱效果，如需设置其他参数请请看下方，<a style="color:red;">注意：请在开启状态下设置！！</a>',
		'values' => array(
			'yes' => '开启',
			'no' => '关闭',
		),
		'default' => 'yes',
	),
	
	'imgbox1' => array(
	    'type' => 'radio',
		'name' => '灯箱效果-遮罩层透明度',
		'description' => '遮罩层透明度',
		'values' => array(
		    '1' => '不透明',
			'0.5' => '半透明',
			'0' => '完全透明',
		),
		'default' => '0.5',
	),
	
	'imgbox2' => array(
	    'type' => 'radio',
		'name' => '灯箱效果-遮罩层隐现速度',
		'description' => '遮罩层隐现速度',
		'values' => array(
		    '1' => '禁用动画效果',
			'400' => '默认',
			'100' => '稍快',
		),
		'default' => '400',
	),
	
	'imgbox3' => array(
	    'type' => 'radio',
		'name' => '灯箱效果-图片滑出速度',
		'description' => '图片滑出速度',
		'values' => array(
		    '1' => '禁用动画效果',
			'400' => '默认',
			'100' => '稍快',
		),
		'default' => '400',
	),
	
	'imgbox4' => array(
	    'type' => 'radio',
		'name' => '灯箱效果-标题栏滑出速度',
		'description' => '标题栏滑出速度',
		'values' => array(
		    '1' => '禁用动画效果',
			'400' => '默认',
			'100' => '稍快',
		),
		'default' => '400',
	),
	
	'imgbox5' => array(
	    'type' => 'radio',
		'name' => '灯箱效果-图片循环',
		'description' => '图片循环',
		'values' => array(
		    'true' => '循环',
			'false' => '不循环',
		),
		'default' => 'true',
	),
	
	'imgbox6' => array(
	    'type' => 'text',
		'name' => '灯箱效果-计数器提示',
		'description' => '<b>{x}</b>为当前图片索引，<b>{y}</b>为当前页面总图片数。<br />填写 <b>false</b> 是关闭此功能，不显示任何计数。',
		'default' => '当前第{x}张/共{y}张',
	),
);