<?php
#网页模板调用页
#By 诺依阁<nuoyis@nuoyis.net>

if(!defined('yuframe')) die('拒绝访问,请从主页进行访问');
if(isset($_COOKIE["lovablewyhgettime"]) && $_COOKIE["lovablewyhagreement"] === "1"){
    $gettime=$_COOKIE["lovablewyhgettime"];
    }else{
    $gettime=$time;
}
echo '<meta charset="utf-8">';
$experence = file_get_contents(dirname(__FILE__).'/nuoyis-web-md/experence.md');
$jianzhanlist = file_get_contents(dirname(__FILE__).'/nuoyis-web-md/jianzhanlist.md');
$zanzhu = file_get_contents(dirname(__FILE__).'/nuoyis-web-md/zanzhu.md');
$Parsedown = new \ParsedownToC();
$experence = $Parsedown->body($experence);
$jianzhanlist = $Parsedown->body($jianzhanlist);
$zanzhu = $Parsedown->body($zanzhu);
echo <<<HTML
<!DOCTYPE html>
        <!-- this is OK(code 200) -->
        <!-- nuoyis's about -->
        <!-- yuframe-v3.0-->
        <!-- last update:2023-02-05-->
        <!-- new update:2024-02-09-->
        <html>
	    <head>
		<meta charset="utf-8">
		<title>{$authorname}的个人介绍 - {$title2}</title>
		<meta name="Robots" contect="all">
		<meta name="Author" contect="{$authorname}">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="keywords" content="{$Keywords}"/>
		<meta name="description" content="{$description}"/>
		<meta name="baidu-site-verification" content="code-rvImNJ8jRM" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
		<link rel="dns-prefetch" href="//q.qlogo.cn"/>
		<link rel="dns-prefetch" href="//space.bilibili.com"/>
		<link rel="dns-prefetch" href="//static.nuoyis.net"/>
		<link rel="dns-prefetch" href="//api.nuoyis.net"/>
		<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" media="screen"/>
		<!-- jQuery文件-->
        <script type="text/javascript" src="https://static.nuoyis.net/libs/jquery/2.1.4/jquery.js"></script>
        
        <!-- Bootstrap 核心 JavaScript 文件 -->
        <script src="https://static.nuoyis.net/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
		<link rel="stylesheet" type="text/css" href="https://static.nuoyis.net/libs/normalize/12.0.0/css/normalize.css">
		<link rel="stylesheet" type="text/css" media="screen and (max-width: 600px)" href="./static/css/main-mobile.css">
		<link rel="stylesheet" type="text/css" media="screen and (min-width: 601px)" href="./static/css/main-pc.css" />
		<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4015694772463475"
     crossorigin="anonymous"></script>
		<style>
		.rightcontent img{
		  width:80%;
		  height:auto;
		}
		</style>
	</head>
	<body>
	<!--[if lt IE 9]>
	<div style=' clear: both; text-align:center; position: relative;'>
       <div class="update">
           <h1>你的浏览器需要升级</h1>
           <h3>你的浏览器目前已被拦截，需要升级才能查看</h3>
           <ul>
               <li>单击<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">这里</a>查看为什么需要升级</li>
               <li>快速升级链接</li>
               <li><a href="https://www.microsoft.com/zh-cn/edge/">edge</a>   |   <a href="https://www.google.cn/chrome/">chrome</a>   |   <a href="http://www.firefox.com.cn/">firefox</a></li>
           </ul>
    </div>
</div>
		<![endif]-->
   <noscript>
   <h1 class="nuoyis_jg">抱歉，您的浏览器未开启或者不支持或者已禁用javascript，请开启javascript后重试</h1>
   </noscript>
   <div class="nuoyis_container" id="container">
   <div id="nuoyis_backgroud"></div>
    <video id="background_video" loop muted></video>
    <div id="overlay"></div>
</div>
	<header class="header">
	<div class="headimg">
	        <span class="name sidebar_trigger">{$authorname}的个人简介</span>
	</div>
	<div id="nuoyis_zs3" class="icon"  style="display: none;">
	   <span>
	        <a title="播放/暂停音乐" id="Btn"><img data-src="https://p3.music.126.net/tBTNafgjNnTL1KlZMt7lVA==/18885211718935735.jpg" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"/></a>
	   </span>
		<span>
			<a title="bilibili" target="_blank" href="https://space.bilibili.com/476800638"><img data-src="https://www.bilibili.com/favicon.ico?v=1" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"/></a>
		</span>
		<span>
			<a title="blog" target="_blank" href="https://blog.nuoyis.net/"><img data-src="https://static.nuoyis.net/lib/private/aboutme/main/images/images.ico" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"/></a>
		</span>
		<span>
			<a title="联系站长" target="_blank" href="https://www.nuoyis.net"><img id="nuoyis_zs2" data-src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"/></a>
		</span>
	</div>
</header>
<div id="nuoyis_zs1" class="leftcontent">
		<ul>
		    <li class="select" obj="webconfig">站点资讯</li>
            <li obj="experence">个人简介</li>
			<li obj="skill">会的方向</li>
			<li obj="jianzhanlist">建站历史</li>
			<li obj="zanzhu">赞助站长</li>
			<li obj="friend">合作企业</li>
		</ul>
	</div>
	<div class="rightcontent" id="rightcontent">
	    <div class="webconfig">
	    <p id="musicdg"></p>
	    <p>你的IP:{$ipInfo['ip']}</p>
	    <p>你来自:{$ipInfo['froms']}</p>
	    <p>访问时间:{$ipInfo['add_time']}</p>
	    <p>上次访问时间:维护中</p>
	    <p>你的系统:{$ipInfo['system']}</p>
	    <p>你的浏览器内核:{$ipInfo['browser']}</p>
	    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-4015694772463475"
        data-ad-slot="8371555862"
        data-ad-format="auto"
        data-full-width-responsive="true"><hr></ins>
       <script>
       (adsbygoogle = window.adsbygoogle || []).push({});
       </script>
	    </div>
		<div class="experence">{$experence}</div>
		<div class="skill">
             主要以C，PHP，HTML，Java四科语言为主</br>JavaScript,python方面有资源有梦想时学为辅</br>MYSQL，microsoft database等数据库软件为强制学内容，必定要进修</br>剩下啥汇编语言先放着，有时间就开始搞
		</div>
		<div class="jianzhanlist">{$jianzhanlist}</div>
		<div class="zanzhu">{$zanzhu}</div>
			<div class="friend">
		 <div class="links">
			<ul class="link-items fontSmooth">
			    <li class="link-item">
			            <img data-src="https://cloudcache.tencent-cloud.cn/open_proj/proj_qcloud_v2/tc-console/dnspod/gateway/css/img/dnspod.ico" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"><a class="link-item-inner effect-apollo" href="https://www.dnspod.cn/" target="_blank">Dnspod</a><div class="linkdes">域名解析统计/服务器商</div></li>
			        <li class="link-item">
			            <img data-src="https://www.cccyun.net/favicon.ico" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"><a class="link-item-inner effect-apollo" href="https://www.cccyun.net/" target="_blank">彩虹云主机</a><div class="linkdes">本站采用的付费虚拟主机</div></li>
			        <li class="link-item">
			            <img data-src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"><a class="link-item-inner effect-apollo" href="https://nuoyis.net" target="_blank">雨晨风蓝</a><div class="linkdes">本站站长的工作室</div></li>
			        <li class="link-item">
			            <img data-src="https://starxn.com/favicon.ico" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"><a class="link-item-inner effect-apollo" href="https://starxn.com/" target="_blank">星辰云</a><div class="linkdes">虚拟主机/服务器提供商</div></li>
			        <li class="link-item">
			            <img data-src="https://www.aliyun.com/favicon.ico" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"><a class="link-item-inner effect-apollo" href="https://aliyun.com/" target="_blank">阿里云</a><div class="linkdes">本站域名注册商/服务器商</div></li>
			            <li class="link-item">
			            <img data-src="https://anthonylxd.github.io/image/tubiao.ico" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"><a class="link-item-inner effect-apollo" href="http://anthonylxd.github.io/" target="_blank">Anthonylxd</a><div class="linkdes">征用大佬前端部分区域</div></li>
			</ul>
		</div>
	</div>
</div>
<footer>
<div id="ft" class="ft">
    <span id="nuoyis_tx"></span>
    |
    <span id="sitetime"></span>
    <p>
    本站由
    <a target="_blank" href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral" title="又拍云CDN" alt="又拍云CDN">
    <img data-src="https://images.nuoyis.net/blog/icon/upyun_logo.webp" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg" style="margin-bottom: -10px;margin-left: 3px" alt="CDN" width="70" height="35">
    </a>
    提供CDN加速/云存储服务
    </p>
    <p>
    <a href="//beian.miit.gov.cn" data-pjax-state="">鄂ICP备2023004941号-1</a>
    | 
    <img data-src="https://images.nuoyis.net/blog/icon/beian.png" src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg">鄂公网安备 <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42011702000728">42011702000728</a>号
    |
    Copyright © 2020 - 至今
    <a href="https://nuoyis.net" target="_blank" style="color:#999;"> {$authorname} </a>
    All Rights Reserved.
    </p>
</div>
<div id="fish-container" class="nuoyis_footer-fish"></div>
</footer>

<div class="nuoyis_loader">
		        <div class="nuoyis_dot"></div>
		        <div class="nuoyis_dot"></div>
		        <div class="nuoyis_dot"></div>
		        <div class="nuoyis_dot"></div>
		        <div class="nuoyis_dot"></div>
</div>
<div id="agreement" class="agreement" style="display: none;">
    <div class="nuoyis_agreement-header">
      <h2>站点提示</h2>
      <a href="#" class="btn-close"  id="nuoyis_webside-close" aria-hidden="true">×</a>
    </div>
    <div class="nuoyis_agreement-main">
      <p>进入本站，你的cookie和IP已被记录</br>cookie只用于本站高速刷新加载</br>如不同意，请点击x退出本站点</p>
    </div>
    <div class="nuoyis_agreement-footer">
      <button class="btn" id="nuoyis_agreement-close">确定</button>
    </div>
  </div>
 </div>
HTML;
if (isset($_COOKIE["lovablewyhagreement"]))
{
 if($_COOKIE["lovablewyhagreement"] != "1")
 {
echo <<<HTML
<script>
$(window).on("load",function(){
     $(".nuoyis_loader").fadeOut("slow");
      document.getElementById("nuoyis_zs3").style.display = "block";
});
</script>
HTML;
 }
}else{
    echo <<<HTML
<script>
$(window).on("load",function(){
     $(".nuoyis_loader").fadeOut("slow");
      document.getElementById("nuoyis_zs3").style.display = "block";
});
</script>
HTML;
}
echo <<<HTML
<!-- 网页自动播放代码 
<audio id="nuoyis_music" controls="controls" autoplay="autoplay" loop="loop" style="display: none;">
<source src="{/*musicurl*/}" />
</audio>
-->

<!-- 谷歌广告 -->
<div class="nuoyis_Googleadsense" id="nuoyis_Googleadsense">
<ins class="adsbygoogle"
     style="display:block;width:100%;"
     data-ad-format="fluid"
     data-ad-client="ca-pub-4015694772463475"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

<ul id="nuoyis_rightmume">
    <li id="nuoyis_rightmume_t1">首页</li>
    <li class="hr_break"></li>
    <li id="nuoyis_rightmume_t2">博客</li>
    <a href="javascript:void(0);" onclick="nuoyis_copy()">复制</a>
    <li id="nuoyis_rightmume_t3">重新加载</li>
</ul>

<!-- js集合  -->
<script type="text/javascript">
var info = navigator.userAgent;
var isPhone = /mobile/i.test(info);
if(isPhone == true){
$("#nuoyis_Googleadsense").css("display","none");
$("footer").css("display","none");
}
var script = document.createElement("script");
$('#nuoyis_agreement-close').click(function(){
     $('.agreement').hide();
     $.cookie('lovablewyhgettime', '{$time}', { expires: 7 });
     $.cookie('lovablewyhagreement', '1', { expires: 100 }); 
});

$('#nuoyis_webside-close').click(function(){
    if (navigator.userAgent.indexOf("Firefox") != -1 || navigator.userAgent.indexOf("Chrome") !=-1) {
        window.location.href="about:blank";
        window.close();
    } else {
        window.opener = null;
        window.open("", "_self");
        window.close();
    }
});

//原作者搞丢了，需要作者来联系我加上
//获取全部img标签
var images = document.getElementsByTagName("img");
window.onload=function(){
    window.addEventListener("scroll", (e) => {
        //当发生滚动事件时调用ergodic事件
        ergodic();
    });
    function ergodic() {
        // 遍历每一张图
        for (let i of images) {
         //判断当前图片是否在可视区内
         if (i.offsetTop <= window.innerHeight + window.scrollY) {
            if (i.getAttribute("data-src") != null){
                //获取自定义data-src属性的值
                let trueSrc = i.getAttribute("data-src");
                //把值赋值给图片的src属性
                i.setAttribute("src", trueSrc);
            }
        }
     }
  }
  //没发生滚动事件时也要先执行一次
 
  ergodic();
 }

</script>
<script type="text/javascript" src="https://static.nuoyis.net/lib/private/aboutme/main/js/fish.js"></script>
<script type="text/javascript" src="https://static.nuoyis.net/libs/bideo/js/bideo.js"></script>
<script type="text/javascript" src="./static/js/yuanban.js"></script>
<script type="text/javascript" src="https://static.nuoyis.net/lib/private/aboutme/main/js/hua.js"></script>
<script type="text/javascript" src="https://api.nuoyis.net/yu-api/live2d/autoload.js"></script>
<script type="text/javascript" src="https://static.nuoyis.net/libs/jquery.cookie/1.4.1/jquery.cookie.js"></script>
</body>
</html>
HTML;
?>