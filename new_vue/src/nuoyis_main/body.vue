<template>
<!--  <button :class="index === number ? 'btn1' : 'btn'" @click="tab(index)" v-for="(item, index) in dataList" :key="index">-->
<!--    {{ item.option }}-->
<!--  </button>-->
  <video-bg :sources="['https://static.nuoyis.net/private/aboutme/main/video/background.mp4']" img="demo/assets/bg.jpg">
    <!-- If you want to add content here, a slot is waiting! -->
  </video-bg>
  <div class="nuoyis_body">
      <div class="nuoyis_body_left">
        <!--4个按钮-->
        <ul>
          <li :class="index === number ? 'btn1' : 'btn'" @click="tab(index)" v-for="(item, index) in dataList" :key="index">
          {{ item.option }}</li>
        </ul>
      </div>
      <!--4个div-->
      <div class="nuoyis_body_right">
        <div class="nuoyis_body_right_text" v-show="number === 0">
          <span>正在用Vue重新装修中,请耐心等待后端重构<br></span>
          <span>欢迎访问诺依阁的个人介绍，点击左边蓝框的文字即可切换内容</span>
        </div>
        <div class="nuoyis_body_right_text" v-show="number === 1">
          <span>计算机涵盖了很多方面，也养活了很多人。你目前看到的站长，正在努力地攻破未知的堡垒，冲破学习困难壁。二次元的计算机运用广泛，运用好就是非常好看的页面，运行不好就是一段悲伤的故事。说实在话，向二次元发展的目的是好看，再是热量也比较高，适合于各种宅男。<br>
计算机学习方向<br>
计算机网络搭建，计算机程序设计，计算机音乐创作（包括虚拟歌姬调音），计算机人工智能（包括QQ机器人），计算机云计算服务<br>
计算机软件学习语言<br>
<strong>目前主要学习HTML,PHP,C以及JavaScript,对于其他的语言目前还正在加班加点学习中</strong><br>
个人经历<br>
<strong>为什么要学计算机</strong><br>
学计算机是为了一种兴趣，觉得代码是很好玩的东西。一开始用易语言写的机器人词库让我熟悉了一些规则和内容。毕竟我是很早就看一些大佬在写代码了。很多人说计算机难，计算机不好学，只是你没有读懂它。计算机中的代码，他就像一个波浪一个波浪的好看，对于代码，就像一门语言，判断就像我问你是还是不是,然后再给出相应的回复。这一行行代码，就是我热爱的信仰。打代码,就要用心开始<br>
<strong>我的现实状况</strong><br>
咸鱼计算机爱好者之一,很少在计算机方面与别人交流,并且对于一些方面比较固执，有些执迷不悟。对于游戏玩了一些,没事做的时或者闲着的时候会维护下站点</span>
        </div>
        <div class="nuoyis_body_right_text" v-show="number === 2">
          <span>主要以C，PHP，HTML，Java四科语言为主<br>JavaScript,python方面有资源有梦想时学为辅<br>MYSQL，microsoft database等数据库软件为强制学内容，必定要进修<br>剩下啥汇编语言先放着，有时间就开始搞。</span>
        </div>
        <div class="nuoyis_body_right_text" v-show="number === 3">
          <span>2019年因为写QQ机器人，而暂时搞到白嫖的虚拟主机,那时虚拟主机很慢很卡，经常用着用着就熄火了<br>
2019年年底白嫖了一个二级域名,那时候服务一段稳定时间后域名熄火了<br>
2020年开始编写个人介绍,对着个人介绍借鉴这位<a href="http://anthonylxd.github.io">anthonylxd</a>大佬制作编写<br>
2020年年中购买了两台虚拟机和一台服务器在香港地区运营一段时间,资金短缺<br>
2021年服务器休息一年,服务器当初不知道备案,均买的国内的浪费了<br>
2023年一月,购买了星辰云一年的低价宝塔主机,开启了本站稳定运行<br>
2023年一月,购买了nuoyis.com两年的域名,本站替换成新域名并准备备案本域名<br>
2023年一月,为本个人介绍优化修改成PDO数据库连接方式(花了我一天加一晚上)<br>
2023年三月,使用了阿里云学生计划购买的服务器,打算在18岁生日当天提交备案信息<br>
2023年三月底,开始关站用于备案,关站期间整改站点内的杂乱内容,修复和更新程序内的漏洞<br>
2023年四月四日,本站逐渐将编写网页的方法替换为makedown文档<br>
----------旅行的脚步很长,我将去向计算机专业的何处,都会留下痕迹----------</span>
        </div>
        <div  class="nuoyis_body_right_text" v-show="number === 4">
          <span><h4 id="推荐内容">推荐内容</h4>
<p>网站运行资金都是从饭钱内慢慢省下来交出来的。站长一生有些贫凡。在此为需要购买服务器的朋友顺便提供帮助</p>
<h4 id="赞助站点">赞助站点</h4>
<h2 id="微信支付">微信支付</h2>
<img data-src="https://images.nuoyis.net/blog/typecho/uploads/2023/06/920151517.png" src="https://images.nuoyis.net/blog/typecho/uploads/2023/06/920151517.png" height="750" width="500">
<h2 id="支付宝支付">支付宝支付</h2>
<img data-src="https://images.nuoyis.net/blog/typecho/uploads/2023/06/3436481933.jpg" src="https://images.nuoyis.net/blog/typecho/uploads/2023/06/3436481933.jpg" height="750" width="500">
<h2 id="银行汇款">银行汇款</h2>
<p>卡号:6236 6828 7000 2664 733</p></span>
        </div>
        <div  class="nuoyis_body_right_text" v-show="number === 5">
          <span>敬请期待</span>
        </div>
      </div>
  </div>
</template>

<script setup>
// https://blog.csdn.net/weixin_53072519/article/details/121854656
// https://blog.csdn.net/lyp131422/article/details/127555482
import {ref} from "vue";
import VideoBg from 'vue-videobg';
const number = ref(0); // 点击后的值，与下标同步，为0表示默认第一个按钮与div为选中状态
const dataList = [
  { option: '站点资讯' },
  { option: '个人简介' },
  { option: '会的方向' },
  { option: '建站历史' },
  { option: '赞助站长' },
  { option: '合作企业' },
];

const tab = (index) => {
  number.value = index;
};
</script>

<style scoped>
.nuoyis_body{
  max-width: calc(75vw);
  height: calc(70vh);
  margin: 0 auto;
  padding-top: calc(20vh);
}

.nuoyis_body_left{
  border-radius: 25px;
  background: #6495ED;
  color: #fff;
  width: 15%;
  padding: 6px 0 6px 0;
  transition: 1s;
  float: left;
}

.nuoyis_body_left li{
  list-style: none;
  padding: 8px 29px 10px 0;
  font-size: 17px;
  cursor: pointer;
  border-left: 3px solid #6495ED;
}

.nuoyis_body_right{
  background-color: rgba(255, 255, 255, 0.7);
  filter: alpha(opacity = 70);
  border-radius: 25px;
  opacity: 0.7;
  width: 70%;
  margin-right: calc(5vw);
  height: 100%;
  float: right;
  overflow-y: scroll;
}

.nuoyis_body_right::-webkit-scrollbar {
  width: 0;
}

.nuoyis_body_right_text{
  line-height: 160%;
  letter-spacing: 2px;
  margin: 10px 0 10px 14px;
}

.VideoBg{
  position: fixed;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: -100;
}

.videoContainer:before{
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  display: block;
  z-index: -1;
  top: 0;
  left: 0;
  background: rgba(25,29,34,.65);
  background-size: cover;
}

.fullscreenVideo{
  width: 100%;
  height: 100%;
  object-fit: fill
}
</style>