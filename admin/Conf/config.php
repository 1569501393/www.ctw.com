<?php
if (!defined('THINK_PATH'))	exit();

$config = require("config.inc.php");
$ignorechenk=require 'configs/ignorecheck.config.php';

$array = array( 	
    'URL_MODEL' => 0,
    'LANG_SWITCH_ON' => true,
    'DEFAULT_LANG' => 'zh-cn', // 默认语言
    'LANG_AUTO_DETECT' => true, // 自动侦测语言     
 	'APP_AUTOLOAD_PATH'=>'@.TagLib',//	
	'TMPL_ACTION_ERROR'     => 'public:error',
    'TMPL_ACTION_SUCCESS'   => 'public:success',
    'SHOW_PAGE_TRACE' => true,      //是否显示TRACE信息
    'HTML_CACHE_ON' => false,
    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR,SQL', // 只记录EMERG ALERT CRIT ERR 错误
    'DEFAULT_MODULE' => 'index',  // 设置默认模块，小写index 解决ThinkPHP中开启调试模式无法加载模块的问题。
//'URL_CASE_INSENSITIVE'  =>  false, // 大小写不敏感
);
return array_merge($config,$ignorechenk,$array);
?>