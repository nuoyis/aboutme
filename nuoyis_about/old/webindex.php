<?php
if(!defined('yuframe')) die('拒绝访问,请从主页进行访问');

function title(){
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ?"https://":"http://";
    $host =  $protocol . $_SERVER['HTTP_HOST'];
}

function xwfooter(){
       $musicjson = 'https://lovablewyh.zinet.top/xwindex/json/music.json';
       $musicdata = file_get_contents($musicjson);
       $musicarr = json_decode($musicdata, true);
       $musicrand = rand(1,18);
       $musicrand1 = $musicrand-1;
       $musicurl = $musicarr[$musicrand1]["musicurl"];
       $music = $musicarr[$musicrand1]["id"];
       $month= date('m');
       if ($month>='06'&&$month<='09')
       {
       $videourl = "";
       }else{
       $videourl = "";
   }
?>
<footer>
<div id="ft" class="ft">
    <span id="xwtx"></span>|<span id="sitetime"></span><p>本站由<a target="_blank" href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral" title="本站因未到年龄无法备案暂未正式使用该cdn" alt="本站因未到年龄无法备案暂未正式使用该cdn"><img src="https://s.nmxc.ltd/sakurairo_vision/@2.5/options/upyun_logo.webp" style="margin-bottom: -6px;margin-left: 3px" alt="CDN" width="65" height="25"></a>提供CDN加速/云存储服务</p><p><img src="https://lovablewyh.zinet.top/xwindex/blog/images/beian.png">鄂公网安备 <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42011702000675">42011702000675</a>号|Copyright © 2020 - 至今<a href="https://fcyle.com" target="_blank" style="color:#999;">徐惟康</a>All Rights Reserved.
</div>
<div id="fish-container" class="xwfooter-fish"></div>
</footer>

<div class="xw-loader">
		        <div class="xw-dot"></div>
		        <div class="xw-dot"></div>
		        <div class="xw-dot"></div>
		        <div class="xw-dot"></div>
		        <div class="xw-dot"></div>
</div>

<div id="agreement" class="agreement" style="display: none;">
    <div class="xw-agreement-header">
      <h2>站点提示</h2>
      <a href="#" class="btn-close"  id="xw-webside-close" aria-hidden="true">×</a>
    </div>
    <div class="xw-agreement-main">
      <p>进入本站，你的cookie和IP已被记录</br>cookie只用于本站高速刷新加载</br>如不同意，请点击x退出本站点</p>
    </div>
    <div class="xw-agreement-footer">
      <button class="btn" id="xw-agreement-close">确定</button>
    </div>
  </div>
 </div>

<!-- 网页自动播放代码 -->
<audio id="xwmusic" controls="controls" autoplay="autoplay" loop="loop" style="display: none;">
<source src="<?=$musicurl; ?>" />
</audio>

<!-- 谷歌广告 -->
<div class="xw-Googleadsense">
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4015694772463475"
     data-ad-slot="9788777418"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
</div>

<ul id="xwrightmume">
    <a href="javascript:void(0);" onclick="xwcopy()"><li>复制</li></a>
    <a href="javascript:void(0);" onclick="window.location.href='https://blog.xuvce.com'"><li>进入博客</li></a>
    <li>粘贴</li>
</ul>

<script>
    //给document 添加 oncontextmenu 事件 取消默认的右键菜单的行为。
    //点击右键的时候，获得点击的位置。
    var ul = document.getElementById('xwrightmume');
    document.oncontextmenu=function(e){
        e=e||window.event;
        //屏蔽样式
        e.preventDefault?e.preventDefault():(e.returnValue=false);
        //获取坐标
        var x=e.clientX;//视口的位置
        var y=e.clientY;

        //显示菜单
        ul.style.display='block';
        ul.style.top=y+'px';
        ul.style.left=x+'px';
    };
    //点击左键 自定义菜单消失
    document.onclick=function () {
        ul.style.display='none';
    };
    //给每个li添加 鼠标进入(onmouseover)和鼠标离开(onmouseout)的事件
    var lis = document.querySelectorAll('#xwrightmume li');
    for (let i = 0; i < lis.length; i++) {
        lis[i].onmouseover=function () {
            lis[i].style='background-color:rgb(204,204,204);border-radius: 25px;';
        };
        lis[i].onmouseout=function () {
            lis[i].style ='';
        }
    }
    
function getCurrentSelect(){

    let selectionObj = null, rangeObj = null;
    let selectedText = "", selectedHtml = "";

    // 处理兼容性
    if(window.getSelection){
      // 现代浏览器
      // 获取text
      selectionObj = window.getSelection();
      selectedText = selectionObj.toString();
    } else if(document.selection){
        // 非主流浏览器IE
        selectionObj = document.selection;
        rangeObj = selectionObj.createRange();
        selectedText = rangeObj.text;
    }

    return selectedText;
  };

 function xwcopy(){
         var Url2 = getCurrentSelect();
         if(Url2!='')
         {
         var oInput = document.createElement('input');
         oInput.value = Url2 + "||你复制了本站(*.xuvce.com)的内容，请注意版权保留哦";
         document.body.appendChild(oInput);
         oInput.select(); // 选择对象
         document.execCommand("Copy"); // 执行浏览器复制命令
         oInput.className = 'oInput';
         oInput.style.display = 'none';
         }
    }
</script>

<!-- js集合  -->
<script type="text/javascript">
var musicdg = document.getElementById("musicdg");
var music = document.getElementById("xwmusic");
var script = document.createElement("script");
$('#xw-agreement-close').click(function(){
     $('.agreement').hide();
});

$('#xw-webside-close').click(function(){
    if (navigator.userAgent.indexOf("Firefox") != -1 || navigator.userAgent.indexOf("Chrome") !=-1) {
        window.location.href="about:blank";
        window.close();
    } else {
        window.opener = null;
        window.open("", "_self");
        window.close();
    }
});

$(function(){
    music.play();
    //处理微信的时候
    document.addEventListener("WeixinJSBridgeReady", function(){
        if(typeof WeixinJSBridge == "object"){
            WeixinJSBridge.invoke("getNetworkType", {}, function(j){
                music.play();
            })
        }
    });
    $("#Btn").click(function(){
        if(music.paused){
            music.play();
        }else{
            music.pause();
        }
    });
});

musicdg.innerHTML = "歌曲区<br />您当前听的歌曲序列为<?=$music; ?><br />您当前听的歌曲地址为<a href=\'<?=$musicurl; ?>\' target=\"_blank\"><?=$musicurl; ?></a><br />如未播放,可在右上角网易云图标点击播放/暂停<hr>";

setTimeout(function() {
script.setAttribute("async", "");
script.src = "//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4015694772463475";
document.body.appendChild(script);
}, 2e3);
 
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script type="text/javascript" src="https://lovablewyh.zinet.top/xwindex/js/PC/xwabout/fish.js"></script>
<script type="text/javascript" src="https://lovablewyh.zinet.top/xwindex/js/public/bideo.js"></script>
<script type="text/javascript" src="https://lovablewyh.zinet.top/xwindex/js/PC/xwabout/main.js"></script>
<script type="text/javascript" src="https://lovablewyh.zinet.top/xwindex/js/public/xwmain.js"></script>
<script type="text/javascript" src="https://lovablewyh.zinet.top/xwindex/js/public/hua.js"></script>
<script type="text/javascript" src="https://lovablewyh.gitee.io/live2d/autoload.js"></script>
</body>
</html>
<?php
}
?>