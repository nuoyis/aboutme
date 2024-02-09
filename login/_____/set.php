<?php 
include '../nuoyis_about/define.php';
header("Content-Type:text/html;charset=utf-8");
if(isset($_COOKIE["nuoaboutme"])&&$_COOKIE["nuoaboutme"]==1){
    //表面你登陆过，并且是登录成功的状态
    echo "亲爱的admin你好，欢迎回来！";
    echo "<a href='logout.php'>注销</a>";
    $islogin=1;
    $title='站点管理';
    include '../login/head.php';
}else {
    exit("<script language='javascript'>window.location.href='../login/login.php';</script>");
}
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
$webdb = $yudb->yuquery("yudb","id = 1");
$web = $webdb["data"];
$authorname = $web['authorname'];
$title2 = $web['title2'];
$Keywords = $web['Keywords'];
$description = $web['description'];
$mod=isset($_GET['mod'])?$_GET['mod']:null;
if($mod=='site_n'){
	$sitename=$_POST['sitename'];
	$title=$_POST['title'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$modal=$_POST['modal'];
	$url=$_POST['url'];
	$music=$_POST['music'];
	$kfqq=$_POST['kfqq'];
	$qqjump=$_POST['qqjump'];
	$pwd=$_POST['pwd'];
	saveSetting('sitename',$sitename);
	saveSetting('title',$title);
	saveSetting('keywords',$keywords);
	saveSetting('description',$description);
	saveSetting('modal',$modal);
	saveSetting('url',$url);
	saveSetting('music',$music);
	saveSetting('kfqq',$kfqq);
	saveSetting('qqjump',$qqjump);
	if(!empty($pwd))saveSetting('admin_pwd',$pwd);
	$ad=$CACHE->clear();
	if($ad)showmsg('修改成功！',1);
	else showmsg('修改失败！<br/>'.$DB->error(),4);
}elseif($mod=='site'){
?>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">网站信息配置</h3></div>
<div class="panel-body">
  <form action="./set.php?mod=site_n" method="post" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">作者名称</label>
	  <div class="col-sm-10"><input type="text" name="sitename" value="<?php echo $authorname; ?>" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">标题栏后缀</label>
	  <div class="col-sm-10"><input type="text" name="title" value="<?php echo $title2; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" value="<?php echo $Keywords; ?>" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站描述</label>
	  <div class="col-sm-10"><input type="text" name="description" value="<?php echo $description; ?>" class="form-control"/></div>
	</div><br/>
	  <div class="form-group">
	  <label class="col-sm-2 control-label">密码修改</label>
	  <div class="col-sm-10"><input type="password" id="password" placeholder="Password" name="description" class="form-control"></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
  </form>
</div>
</div>
<?php
}
?>
<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default")||0);
}
</script>
    </div>
  </div>