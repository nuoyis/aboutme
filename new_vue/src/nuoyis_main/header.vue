<template>
  <div class="header">
    <div class="nuoyis_header_left">
      <span class="nuoyis_header_left_text">诺依阁的个人简介</span>
    </div>
    <div class="nuoyis_header_right">
        <span>
            <a title="播放/暂停音乐" id="Btn"><img src="https://p3.music.126.net/tBTNafgjNnTL1KlZMt7lVA==/18885211718935735.jpg"/></a>
        </span>
        <span>
            <a title="bilibili" target="_blank" href="https://space.bilibili.com/476800638"><img src="https://www.bilibili.com/favicon.ico?v=1"/></a>
        </span>
        <span>
            <a title="blog" target="_blank" href="https://blog.nuoyis.net/"><img src="https://static.nuoyis.net/private/aboutme/main/images/images.ico"/></a>
        </span>
        <span>
            <a title="联系站长" target="_blank" href="https://www.nuoyis.net"><img src="https://q.qlogo.cn/headimg_dl?dst_uin=914205978&spec=640&img_type=jpg"/></a>
      </span>
    </div>
  </div>
</template>

<script setup>
</script>

<style scoped>
  header{
    height: calc(8vh);
    width: calc(100vw);
  }

  .nuoyis_header_left_text {
    margin-left: 1px;
    font-size: 21px;
    padding-bottom: 10px;
  }

  .nuoyis_header_left,.nuoyis_header_right{
    margin: calc(3vh) calc(2vh) calc(2vh) calc(2vh)
  }

  .nuoyis_header_left{
    float:left;
    margin-left: calc(2vw);
  }

  .nuoyis_header_right{
    float:right;
    margin-right: calc(2vw);
  }
  .nuoyis_header_right span{
    padding: calc(0.5vw);
  }

  #Btn{
    text-decoration: none;
  }

  .nuoyis_header_right img{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    transition: all 2.0s;
  }

  .nuoyis_header_right img:hover{
    transform: rotate(360deg);
    box-shadow: 0 0 10px #fff;
    -webkit-box-shadow: 0 0 19px #fff;
    -ms-transform:rotate(360deg); 	/* IE 9 */
    -moz-transform:rotate(360deg); 	/* Firefox */
    -webkit-transform:rotate(360deg); /* Safari å’Œ Chrome */
    -o-transform:rotate(360deg); 	/* Opera */
    filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  }
</style>