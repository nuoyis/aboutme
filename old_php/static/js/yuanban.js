$(function(){
var sidebar = $('#sidebar'),//选择侧栏
mask= $('#mask'),
sidebar_trigger = $('.sidebar_trigger'),
backButton = $('.back-to-top'),
itembtn = $('#itembtn'),
workbtn = $('#workbtn'),
skillbtn = $('#skillbtn');
function showSidebar(){
	mask.fadeIn();
	//sidebar.animate({'right':0});
	sidebar.css('right',0);			
}
function hideSidebar(){
	mask.fadeOut();
	sidebar.css('right',-sidebar.width());
}
sidebar_trigger.on('click',showSidebar)
mask.on('click',hideSidebar)

function backtop(){
	$('html, body').animate({
		scrollTop:0
	},800)
}
backButton.on('click',backtop);

$(window).on('scroll',function(){
	if($(window).scrollTop()>$(window).height())
			backButton.fadeIn();
		else
			backButton.fadeOut();
})

$(window).trigger('scroll');
$(".leftcontent li").click(function(){
	var obj = $(this).attr("obj");
	
	$(".leftcontent li").each(function(){
		$(this).removeClass("select");
		var o = $(this).attr("obj");
		$("."+o).hide();
	});
	$(this).addClass("select");
	$("."+obj).show();
	});
});
$(window).on("load",function(){
     $(".nuoyis_loader").fadeOut("slow");
      document.getElementById("nuoyis_zs3").style.display = "block";
});
console.log("%c 诺依阁的个人简介v3.0 %c https://www.nuoyis.net ", "color: #fff; margin: 1em 0; padding: 5px 0; background: #EE0000;", "margin: 1em 0; padding: 5px 0; background: #66CCFF;");
    
var _hmt = _hmt || [];

//函数集合
function nuoyis_NewDate(str) {
    var nuoyis_time3 = new Date();
    str = str.split('-');
    nuoyis_time3.setUTCFullYear(str[0], str[1] - 1, str[2]);
    nuoyis_time3.setUTCHours(0, 0, 0, 0);
    return nuoyis_time3;
}
function nuoyis_jianzhantime() {
    var nuoyis_time1 = new Date();
    var birthDay = nuoyis_NewDate("2020-03-17");
    var timeold = nuoyis_time1.getTime() - birthDay.getTime();
    var sectimeold = timeold / 1000
    var secondsold = Math.floor(sectimeold);
    var msPerDay = 24 * 60 * 60 * 1000;
    var e_daysold = timeold / msPerDay;
    var daysold = Math.floor(e_daysold);
    var e_hrsold = (daysold - e_daysold) * -24;
    var hrsold = Math.floor(e_hrsold);
    var e_minsold = (hrsold - e_hrsold) * -60;
    var minsold = Math.floor((hrsold - e_hrsold) * -60);
    var seconds = Math.floor((minsold - e_minsold) * -60).toString();
    document.getElementById("sitetime").innerHTML = "本站已安全运行" + daysold + "天" + hrsold + "小时" + minsold + "分" + seconds + "秒";
    setTimeout(nuoyis_jianzhantime, 1000);
}

function nuoyis_tx(){
    var nuoyis_time2 = new Date();
    var hour = nuoyis_time2.getHours();
    var nuoyis_tx = "未知情况";
    if ((hour>5)&&(hour<=7))
        nuoyis_tx = "早上好,美好的一天开始了";			
    else if ((hour>7)&&(hour<=11))
        nuoyis_tx = "上午好，一定会干劲十足的";	
    else if ((hour>11)&&(hour<=13))
        nuoyis_tx = "中午好,注意吃饭和休息哦";		
    else if ((hour>13)&&(hour<=17)) 
        nuoyis_tx = "下午好！记得来杯下午茶哦";
    else if ((hour>17)&&(hour<=19)) 
        nuoyis_tx = "傍晚了，休闲娱乐开始喽";	
    else if ((hour>19)&&(hour<=22)) 
    	nuoyis_tx ="晚上好，注意少熬夜了哦";	
    else  
        nuoyis_tx = "夜深了，该休息了哦";
    document.getElementById("nuoyis_tx").innerHTML = nuoyis_tx;
}
	
//动态壁纸
function nuoyis_video_background(url) {
   var bv = new Bideo();
   bv.init({
     videoEl: document.querySelector('#background_video'),
     container: document.querySelector('body'),
     resize: true,
     autoplay: true,
     isMobile: window.matchMedia('(max-width: 768px)').matches,
     playButton: document.querySelector('#play'),
     pauseButton: document.querySelector('#pause'),
     src: [
       {
         src: url,
         type: 'video/mp4'
       },
     ],
     onLoad: function () {
       document.querySelector('#nuoyis_backgroud').style.display = 'none';
     }
   });
 }
function htmlScroll() {
    var top = document.body.scrollTop || document.documentElement.scrollTop;
    if (elFix.data_top < top) {
        elFix.style.position = 'fixed';
        elFix.style.top = 0;
        elFix.style.left = elFix.data_left;
    }
    else {
        elFix.style.position = 'static';
    }
}

function htmlPosition(obj) {
    var o = obj;
    var a = o.offsetParent;
    var t = o.offsetTop;
    var l = o.offsetLeft;
    while (o = a) {
        t += o.offsetTop;
        l += o.offsetLeft;
    }
    obj.data_top = t;
    obj.data_left = l;
}

function baidusearch(baiduzhanzhang) {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?"+baiduzhanzhang;
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
}

//给document 添加 oncontextmenu 事件 取消默认的右键菜单的行为。
//点击右键的时候，获得点击的位置。
var ul = document.getElementById('nuoyis_rightmume');
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
var lis = document.querySelectorAll('#nuoyis_rightmume li');
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

document.querySelector("#nuoyis_rightmume").addEventListener("click", function(e){
//监听点击事件
    switch (e.target.id){//点击事件触发
        case "nuoyis_rightmume_t1":
            window.location.href="https://www.nuoyis.com";
            break;
        case "nuoyis_rightmume_t2":
            window.location.href="https://blog.nuoyis.com";
            break;
        case "nuoyis_rightmume_t3":
            window.location.reload();
            break;
    }
});

function nuoyis_copy(){
  var Url2 = getCurrentSelect();
  if(Url2!='')
  {
  var oInput = document.createElement('input');
  oInput.value = Url2 + "||你复制了本站的内容，请注意版权保留哦";
  document.body.appendChild(oInput);
  oInput.select(); // 选择对象
  document.execCommand("Copy"); // 执行浏览器复制命令
  oInput.className = 'oInput';
  oInput.style.display = 'none';
  alert("复制成功");
  }
}

function clickEffect() {
let balls = [];
let longPressed = false;
let longPress;
let multiplier = 0;
let width, height;
let origin;
let normal;
let ctx;
const colours = ["#F73859", "#14FFEC", "#00E0FF", "#FF99FE", "#FAF15D"];
const canvas = document.createElement("canvas");
document.body.appendChild(canvas);
canvas.setAttribute("style", "width: 100%; height: 100%; top: 0; left: 0; z-index: 99999; position: fixed; pointer-events: none;");
const pointer = document.createElement("span");
pointer.classList.add("pointer");
document.body.appendChild(pointer);

if (canvas.getContext && window.addEventListener) {
  ctx = canvas.getContext("2d");
  updateSize();
  window.addEventListener('resize', updateSize, false);
  loop();
  window.addEventListener("mousedown", function(e) {
    pushBalls(randBetween(10, 20), e.clientX, e.clientY);
    document.body.classList.add("is-pressed");
    longPress = setTimeout(function(){
      document.body.classList.add("is-longpress");
      longPressed = true;
    }, 500);
  }, false);
  window.addEventListener("mouseup", function(e) {
    clearInterval(longPress);
    if (longPressed == true) {
      document.body.classList.remove("is-longpress");
      pushBalls(randBetween(50 + Math.ceil(multiplier), 100 + Math.ceil(multiplier)), e.clientX, e.clientY);
      longPressed = false;
    }
    document.body.classList.remove("is-pressed");
  }, false);
  window.addEventListener("mousemove", function(e) {
    let x = e.clientX;
    let y = e.clientY;
    pointer.style.top = y + "px";
    pointer.style.left = x + "px";
  }, false);
} else {
  console.log("canvas or addEventListener is unsupported!");
}


function updateSize() {
  canvas.width = window.innerWidth * 2;
  canvas.height = window.innerHeight * 2;
  canvas.style.width = window.innerWidth + 'px';
  canvas.style.height = window.innerHeight + 'px';
  ctx.scale(2, 2);
  width = (canvas.width = window.innerWidth);
  height = (canvas.height = window.innerHeight);
  origin = {
    x: width / 2,
    y: height / 2
  };
  normal = {
    x: width / 2,
    y: height / 2
  };
}
class Ball {
  constructor(x = origin.x, y = origin.y) {
    this.x = x;
    this.y = y;
    this.angle = Math.PI * 2 * Math.random();
    if (longPressed == true) {
      this.multiplier = randBetween(14 + multiplier, 15 + multiplier);
    } else {
      this.multiplier = randBetween(6, 12);
    }
    this.vx = (this.multiplier + Math.random() * 0.5) * Math.cos(this.angle);
    this.vy = (this.multiplier + Math.random() * 0.5) * Math.sin(this.angle);
    this.r = randBetween(8, 12) + 3 * Math.random();
    this.color = colours[Math.floor(Math.random() * colours.length)];
  }
  update() {
    this.x += this.vx - normal.x;
    this.y += this.vy - normal.y;
    normal.x = -2 / window.innerWidth * Math.sin(this.angle);
    normal.y = -2 / window.innerHeight * Math.cos(this.angle);
    this.r -= 0.3;
    this.vx *= 0.9;
    this.vy *= 0.9;
  }
}

function pushBalls(count = 1, x = origin.x, y = origin.y) {
  for (let i = 0; i < count; i++) {
    balls.push(new Ball(x, y));
  }
}

function randBetween(min, max) {
  return Math.floor(Math.random() * max) + min;
}

function loop() {
  ctx.fillStyle = "rgba(255, 255, 255, 0)";
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  for (let i = 0; i < balls.length; i++) {
    let b = balls[i];
    if (b.r < 0) continue;
    ctx.fillStyle = b.color;
    ctx.beginPath();
    ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2, false);
    ctx.fill();
    b.update();
  }
  if (longPressed == true) {
    multiplier += 0.2;
  } else if (!longPressed && multiplier >= 0) {
    multiplier -= 0.4;
  }
  removeBall();
  requestAnimationFrame(loop);
}

function removeBall() {
  for (let i = 0; i < balls.length; i++) {
    let b = balls[i];
    if (b.x + b.r < 0 || b.x - b.r > width || b.y + b.r < 0 || b.y - b.r > height || b.r < 0) {
      balls.splice(i, 1);
    }
  }
}
}

//公共执行区域
nuoyis_tx();
clickEffect();
nuoyis_jianzhantime();
baidusearch("fbe3086e6a1fc0819626bbd0a25b72f3");
nuoyis_video_background("https://static.nuoyis.com/lib/private/aboutme/main/video/background.mp4");
