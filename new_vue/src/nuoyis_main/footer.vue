<template>
  <footer>
    <div class="nuoyis_footer_text">
      <a href="//beian.miit.gov.cn" data-pjax-state="">nuoyis.net备案号: 鄂ICP备2023004941号-2 nuoyis.cn备案号: 鄂ICP备2023004941号-3</a>
      |
      <img data-src="https://images.nuoyis.net/blog/icon/beian.png" src="https://images.nuoyis.net/blog/icon/beian.png">鄂公网安备 <a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=42011702000728">42011702000728</a>号
      <br>
      个人介绍由Vue3重新编写,为您提供更好的访问体验
      |
      Copyright © 2020 - 至今
      <a href="https://nuoyis.net" target="_blank"> 诺依阁 </a>
      All Rights Reserved.
    </div>
    <div id="fish-container" class="nuoyis_footer_fish"></div>
  </footer>
</template>
<script setup>

</script>

<style scoped>
footer{
  position: fixed;
  background-attachment: local;
  background-position: bottom;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  width: 100%;
  height: 100px;
  bottom: 0px;
  margin: 0;
  padding: 0px 0 10px;
  overflow: hidden;
  text-align: center;
  line-height: 10px;
}
footer a{
  color: #999;
  text-decoration: none;
}

footer .nuoyis_footer_text{
  position: absolute;
  color: #999;
  z-index: 2;
  width: 100%;
  text-align: center;
  line-height: 160%;
  letter-spacing: 2px;
}

footer .nuoyis_footer_fish{
  z-index: -1;
}
</style>