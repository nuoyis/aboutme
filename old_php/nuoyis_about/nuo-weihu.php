<?php
#网站维护页
#By 诺依阁<nuoyis@nuoyis.net>

if(!defined('yuframe')) die('拒绝访问,请从主页进行访问');
if(yuframe!="lovechina") die('拒绝访问,请从主页进行访问');
echo <<<HTML
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>站点维护 - {$authorname}的自我介绍</title>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" media="screen"/>
    <link rel="stylesheet" href="https://lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/bootstrap/5.1.3/css/bootstrap.css">
    <style type="text/css">
    html,
    body {
      width: 100%;
      height: 100%;
      font-size: 15px;
    }
    body {
    background: url(https://static.nuoyis.com/lib/blog/typecho/themes/butterfly/images/pic1.webp);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    background-position: center 0;
    }
    .btn {
      padding: 8px 20px;
    }
    .btn:hover,
    .btn:focus {
      color: #fff;
      text-decoration: none;
    }
    .btn-red {
      color: #fff;
      background-color: #247db0;
      border-color: #247db0;
    }
    .err_content {
      padding-top: 100px;
      height: 100%;
      padding-bottom: 60px;
    }
    .err_content .err_img {
      max-width: 100%;
      height: auto;
      vertical-align: middle;
    }
    .err_content .err_text {
      height: 100%;
    }
    .err_content .err_text h1 {
      font-size: 40px;
      color: #333;
      font-weight: 200;
    }
    .err_content .err_text .instruction{
      font-size: 18px;
      padding-top: 0;
    }
    .err_content .err_text p.info {
      font-size: 20px;
      padding-bottom: 40px;
      padding-top: 10px;
    }
    .err_content .err_text p {
      font-size: 18px;
      color: #000;
      line-height: 30px;
      font-weight: 200;
      padding: 20px 0;
    }
@media screen and (min-width: 320px) and (max-width: 1156px){
    .err_foot {
      line-height: 50px;
      font-size: 14px;
    }
    .err_foot p {
      padding-top: 15px;
      line-height: 20px;
      font-weight: 200;
      color: #333;
    }
    .err_foot p span {
      display: inline-block;
      max-width: 200px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .err_foot p a {
      color: #000;
    }
    .err_foot .navbar-default {
      background-color: #fcfcfc;
      border-color: #ececec;
    }
}
    </style>
  </head>
  <body>
    <div class="err_content">
      <div class="container">
        <div class="col-lg-12 text-center err_text">
          <h1><span>站点维护</span></h1>
          <p class="instruction">网站正在维护中</p>
          <p class="info">
             <span>请不要反复刷新</span><br>
             <span>请每半个小时刷新一下</span><br>
            <span>你的IP已记录，IP:</span>
            <span>{$ipInfo['ip']}</span></br>
            <span>你的IP位置:</span>
            <span>{$ipInfo['froms']}</span>
          </p>

          <p>请在等待的朋友们耐心等待管理员开放站点。</p>

          <a href="#" onclick="document.cookie='yjs_use_ob=0;path=/';window.location.reload();return false;" class="btn btn-red" role="button">点击刷新</a>
        </div>
      </div>
    </div>
  <div class="err_foot">
  <nav class="navbar navbar-default navbar-fixed-bottom" style="height:50px">
    <div class="container" style="text-align: center">
      <div class="col-lg-12">
        <p class="info">
          <span>{$authorname}的自我介绍</span>
          <span>前端维护界面</span>
          <span> | </span>
          <span><a href="//beian.miit.gov.cn" data-pjax-state="">鄂ICP备2023004941号-1</a></span>
          <span> | </span>
          <span><img src="https://www.nuoyis.com/img/beian.png">鄂公网安备</span>
          <span><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42011702000728">42011702000728</a>号</span>
          <span> | </span>
          <span> 你的IP:</span>
          <span>{$ip}</span>
        </p>
      </div>
    </div>
   </nav>
</div>
  </body>
</html>
HTML;
?>