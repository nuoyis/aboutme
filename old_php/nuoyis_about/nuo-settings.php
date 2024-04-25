<?php
#网页判断设置/拦截页面
#By 诺依阁<nuoyis@nuoyis.net>

#获取最后来源地址
if(empty($_SERVER['HTTP_REFERER'])){
    $source_link = $url;
}else{
    $source_link = $_SERVER['HTTP_REFERER'];
}

#限制ip访问次数
//select count(id) as num FROM yuip where ip ="."'".$ip."'"." AND add_time>="."'".date('Y-m-d H:00:00',time())."'
$script = $yudb->yuquery("yuip","ip ="."'".$ip."'"." AND add_time>="."'".date('Y-m-d H:00:00',time())."'","count(id) as num");
if($script["code"]==200)
if($script["data"]!=false&&$script["data"]["num"]>50){
    echo "你已被小惟安全防火墙拦截，请稍后再试";
    exit;
}

//INSERT INTO yuip (ip,froms,add_time,system,browser,pageview,source_link) VALUES ('$ip','$froms',now(),'$os','$broswer','$url','$source_link')
$ipInfo = array('ip'=> $ip, 'froms' => $froms, 'add_time' => date('Y-m-d H:i:s',time()), 'system' => $os, 'browser' => $broswer, 'froms' => $froms, 'pageview' => $url, 'source_link' => $source_link );
$yudb->yuinsert("yuip", $ipInfo);

#站点维护检测，不维护则返回站点数据
#SELECT * FROM `zdclose` WHERE `id` = 1
$put = $yudb->yuquery("zdclose","id = 1");
if($put["code"]==200)
{
#SELECT * FROM `yusql` WHERE `id` = 1
$webdb = $yudb->yuquery("yudb","id = 1");
$web = $webdb["data"];
$authorname = $web['authorname'];
$title2 = $web['title2'];
$Keywords = $web['Keywords'];
$description = $web['description'];
if($put["data"]["close"] == 1){
include_once dirname(__FILE__).'/nuo-weihu.php';
exit;
}
}
/*#音乐json配置
$musicjson = dirname(__FILE__).'/music.json';
$musicdata = file_get_contents($musicjson);
$musicarr = json_decode($musicdata, true);
$musicrand = rand(1,18);
$musicrand1 = $musicrand-1;
$musicurl = $musicarr[$musicrand1]["musicurl"];
$music = $musicarr[$musicrand1]["id"];
*/
#视频时间配置
$month= date('m');
if ($month>='06'&&$month<='09')
{
$videourl = "";
}else{
$videourl = "";
}
?>