<?php
if(!defined('yuframe')) die('&#x62D2;&#x7EDD;&#x8BBF;&#x95EE;,&#x8BF7;&#x4ECE;&#x4E3B;&#x9875;&#x8FDB;&#x884C;&#x8BBF;&#x95EE;');
    global $dbh;
    #当前url
    $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    #获取ip和来源
    $address = GetIpFrom();
    $froms = $address[0];
    $ip = $address[1];
    #获取浏览器和系统类型
    $broswer = get_broswer();
    $os = get_os();
    
    #获取最后来源地址
    if(empty($_SERVER['HTTP_REFERER'])){
        $source_link = $url;
    }else{
        $source_link = $_SERVER['HTTP_REFERER'];
    }
    
    #限制ip访问次数
    $sqlco = "select count(id) as num FROM yuip where ip ="."'".$ip."'"." AND add_time>="."'".date('Y-m-d H:00:00',time())."'";
 
    $script = $yudb->syusql($sqlco);
 
    if($script['num']>50){
        echo "&#x4F60;&#x5DF2;&#x88AB;&#x5C0F;&#x60DF;&#x5B89;&#x5168;&#x9632;&#x706B;&#x5899;&#x62E6;&#x622A;&#xFF0C;&#x8BF7;&#x7A0D;&#x540E;&#x518D;&#x8BD5;";
        exit;
    }
    #获取到的信息放入数据库
    $sql ="INSERT INTO yuip (ip,froms,add_time,system,browser,pageview,source_link) VALUES ('$ip','$froms',now(),'$os','$broswer','$url','$source_link')";
    $yudb->inyusql($sql);

