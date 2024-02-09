<?php
#定义/引用调用库
#By 诺依阁<nuoyis@nuoyis.net>

#屏蔽系统报错，改用自定义报错
error_reporting(0);

#诺依阁定义库，定义各类文件数据
header('Content-type: text/html; charset=utf-8');
const CACHE_FILE = 0;
const IN_CRONLITE = true;
const yuframe = 'lovechina';

#定义文件路径
const installlock = '/../install/install.lock';
const dbconfig = '/config.php';
const database = '/yudatabase.php';
const yufunction = '/function.php';

#防CC攻击开关(1为session模式)
const CC_Defender = 1;

#报错提示框
const yudebug = '0';

#数据库调用
include dirname(__FILE__).database;
if(file_exists(dirname(__FILE__).dbconfig)){
    
#数据库文件
include_once dirname(__FILE__).dbconfig;

if(!$yudbconfig['dbuser'] || !$yudbconfig['dbpwd'] || !$yudbconfig['dbname']){

header('Content-type:text/html;charset=utf-8');
echo 'error:1,你还没安装!<a href="install/">点此安装</a>';
exit();
}

}else{
header('Content-type:text/html;charset=utf-8');
echo 'error:2,你还没安装!<a href="install/">点此安装</a>';
exit();
}

#判断是否安装过
if(!file_exists(dirname(__FILE__) . installlock))
{
header('Content-type:text/html;charset=utf-8');
echo 'error:3,你还没安装!<a href="install/">点此安装</a>';
exit();
}

$yudb = new yuDB();
$yudb->yudb_host = $yudbconfig['dbhost'];
$yudb->yudb_user = $yudbconfig['dbuser'];
$yudb->yudb_password = $yudbconfig['dbpwd'];
$yudb->yudb_name = $yudbconfig['dbname'];
$yudb->yudb_charset = 'utf8';
$yudb->result = '';
$yudb->databease = 'mysql';

#判断数据库连接
if($yudb->yudetect()["code"]!="200")
{
  if(yudebug==1)
  echo $yudb->yudetect()["error"];
  else
  echo "error:4,惟依涵在连接数据库时出现错误";
  exit;
}

#函数调用
include_once dirname(__FILE__).yufunction;

#IP获取定义
global $dbh;

#当前url
$url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

#获取ip和来源
$address = GetIpFrom();
$froms   = $address[0];
$ip      = $address[1];

#获取浏览器和系统类型
$os      = get_os();
$broswer = get_broswer();
$time = date('Y-m-d H:i:s',time());
$agent = $_SERVER['HTTP_USER_AGENT'];

#访问启动
session_start();
date_default_timezone_set('PRC');

#自定义报错调用
set_error_handler("yurror");
register_shutdown_function('yuerror');

#makedown解析
include dirname(__FILE__).'/Parsedown.php';
include dirname(__FILE__).'/ParsedownToc.php';
?>