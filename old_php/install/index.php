<?php 
//error_reporting(0);
@header('Content-Type: text/html; charset=UTF-8');
$do= $_GET['do'] ?? '0';
if(file_exists('install.lock')){
	$installed=true;
	$do='0';
}else{
    $installed=false;
}

function checkfunc($f,$m = false) {
	if (function_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}

function checkclass($f,$m = false) {
	if (class_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}

?>


<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no,minimal-ui">
<title>安装程序 - 诺依阁的个人介绍</title>
<link href="//lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/bootstrap/4.5.3/css/bootstrap.min.css" rel="stylesheet"/>

</head>
<body>
<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <span class="navbar-brand">欢迎使用诺依阁的个人介绍安装系统</span>
      </div>
    </div>
  </nav>
  <div class="container" style="padding-top:60px;">
    <div class="col-xs-12 col-sm-8 col-lg-6 center-block" style="float: none;">

<?php if($do=='0'){?>
<div class="panel panel-primary">
	<div class="panel-heading" style="background: #66CCFF;">
		<h3 class="panel-title" align="center">安装说明</h3>
	</div>
	<div class="panel-body">
		<p><iframe src="./readme.txt" style="width:100%;height:465px;"></iframe></p>
		<?php if($installed){ ?>
		<div class="alert alert-warning">您已经安装过，如需重新安装请删除<font color=red></font>文件后再安装！</div>
		<?php }else{?>
		<p align="center"><a class="btn btn-primary" href="index.php?do=1">同意协议并开始安装</a></p>
		<?php }?>
	</div>
</div>

<?php }elseif($do=='1'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">环境检查</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
	<span class="sr-only">10%</span>
  </div>
</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:20%">函数检测</th>
			<th style="width:15%">需求</th>
			<th style="width:15%">当前</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>PHP 5.2+</td>
			<td>必须</td>
			<td><?php echo phpversion(); ?></td>
		</tr>
		<tr>
			<td>curl_exec()</td>
			<td>必须</td>
			<td><?php echo checkfunc('curl_exec',true); ?></td>
		</tr>
		<tr>
			<td>file_get_contents()</td>
			<td>必须</td>
			<td><?php echo checkfunc('file_get_contents',true); ?></td>
		</tr>
	</tbody>
</table>
<p><span><a class="btn btn-primary" href="index.php?do=0">上一步</a></span>
<span style="float:right"><a class="btn btn-primary" href="index.php?do=2" align="right">下一步</a></span></p>
</div>

<?php }elseif($do=='2'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">数据库配置</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
	<span class="sr-only">30%</span>
  </div>
</div>
	<div class="panel-body">
	<?php
if(defined("SAE_ACCESSKEY"))
echo <<<HTML
检测到您使用的是SAE空间，支持一键安装，请点击 <a href="?do=3">下一步</a>
HTML;
else
echo <<<HTML
		<form action="?do=3" class="form-sign" method="post">
		<label for="name">数据库地址:</label>
		<input type="text" class="form-control" name="db_host" value="localhost">
		<label for="name">数据库端口:</label>
		<input type="text" class="form-control" name="db_port" value="3306">
		<label for="name">数据库用户名:</label>
		<input type="text" class="form-control" name="db_user">
		<label for="name">数据库密码:</label>
		<input type="text" class="form-control" name="db_pwd">
		<label for="name">数据库名:</label>
		<input type="text" class="form-control" name="db_name">
		<br><input type="submit" class="btn btn-primary btn-block" name="submit" value="保存配置">
		</form><br/>
		（如果已事先填写好config.php相关数据库配置，请 <a href="?do=3&jump=1">点击此处</a> 跳过这一步！）
HTML;
?>
	</div>
</div>

<?php }elseif($do=='3'){
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">保存数据库</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
	<span class="sr-only">50%</span>
  </div>
</div>
	<div class="panel-body">
<?php
require '../nuoyis_about/yudatabase.php';
if(defined("SAE_ACCESSKEY") || $_GET['jump']==1){
	if(defined("SAE_ACCESSKEY"))include_once '../includes/sae.php';
	else include_once '../nuoyis_about/config.php';
	if(!$yudbconfig['dbuser']||!$yudbconfig['dbpwd']||!$yudbconfig['dbname']) {
		echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	} else {
	    $con=new yuDB($yudbconfig['dbhost'],$yudbconfig['dbuser'],$yudbconfig['dbpwd'],$yudbconfig['dbdbname']);
		if($con->yudetect()["code"]!="200"){
			if($con->yudetect()["dberrorcode"]==2002)
				echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
			elseif($con->yudetect()["dberrorcode"]==1045)
				echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
			elseif($con->yudetect()["dberrorcode"]==1049)
				echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
			else
				echo '<div class="alert alert-warning">连接数据库失败，['.$con->yudetect()["dberrorcode"].']'.$con->yudetect()["error"].'</div>';
		}else{
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
			if($con->getquery("select * form yuip where 1")["errorcode"]!="00000")
				echo '<p align="right"><a class="btn btn-primary btn-block" href="?do=4">创建数据表>></a></p>';
			else
				echo '<div class="list-group-item list-group-item-info">系统检测到你已安装过诺依阁的个人介绍系统</div>
				<div class="list-group-item">
					<a href="?do=6" class="btn btn-block btn-info">跳过安装</a>
				</div>
				<div class="list-group-item">
					<a href="?do=4" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}" class="btn btn-block btn-warning">强制全新安装</a>
				</div>';
		}
	}
}else{
	$db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
	$db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
	$db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
	$db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
	$db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;

	if($db_host==null || $db_port==null || $db_user==null || $db_pwd==null || $db_name==null){
		echo '<div class="alert alert-danger">保存错误,请确保每项都不为空<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	} else {
		$config="<?php
#数据库重要配置文件，对于下面内容，请按照相应的区域进行修改
#例如：'shost' => 'localhost',
#                     ↑
#       只需要修改上面localhost就行，不要去掉''
#如果你数据库是阿里云，请将localhost改成对应的域名
#本地搭建服务器或者与网站在同一个网站无需更改选项
\$yudbconfig=Array(
    'dbhost' => '{$db_host}',   #数据库服务器地址
    'dbuser' => '{$db_user}',   #数据库用户名
    'dbpwd' => '{$db_pwd}',     #数据库密码
    'dbname' => '{$db_name}'    #数据库名
);
?>";
        $yudb=new yuDB($db_host,$db_user,$db_pwd,$db_name);
        $yudb->yudb_host = $db_host;
        $yudb->yudb_user = $db_user;
        $yudb->yudb_password = $db_pwd;
        $yudb->yudb_name = $db_name;
        $yudb->yudb_charset = 'utf8';
        $yudb->result = '';
        $yudb->databease = 'mysql';
		if($yudb->yudetect()["code"]!="200"){
			if($yudb->yudetect()["dberrorcode"]==2002)
				echo '<div class="alert alert-warning">连接数据库失败，数据库地址填写错误！</div>';
			elseif($yudb->yudetect()["dberrorcode"]==1045)
				echo '<div class="alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！</div>';
			elseif($yudb->yudetect()["dberrorcode"]==1049)
				echo '<div class="alert alert-warning">连接数据库失败，数据库名不存在！</div>';
			else
				echo '<div class="alert alert-warning">连接数据库失败，['.$yudb->yudetect()["dberrorcode"].']'.$yudb->yudetect()["error"].'</div>';
		}elseif(file_put_contents('../nuoyis_about/config.php',$config)){
			echo '<div class="alert alert-success">数据库配置文件保存成功！</div>';
			if($yudb->getquery("select * form yuip where 1")["errorcode"]!="00000")
				echo '<p align="right"><a class="btn btn-primary btn-block" href="?do=4">创建数据表>></a></p>';
			else
				echo '<div class="list-group-item list-group-item-info">系统检测到你已安装过诺依阁的个人介绍系统</div>
				<div class="list-group-item">
					<a href="?do=6" class="btn btn-block btn-info">跳过安装</a>
				</div>
				<div class="list-group-item">
					<a href="?do=4" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}" class="btn btn-block btn-warning">强制全新安装</a>
				</div>';
		}else
			echo '<div class="alert alert-danger">保存失败，请确保网站根目录有写入权限<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
	}
}
?>
	</div>
</div>
<?php }elseif($do=='4'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">创建数据表</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
	<span class="sr-only">70%</span>
  </div>
</div>
	<div class="panel-body">
<?php
if(defined("SAE_ACCESSKEY"))include_once '../includes/sae.php';
else include_once '../nuoyis_about/config.php';
if(!$yudbconfig['dbuser']||!$yudbconfig['dbpwd']||!$yudbconfig['dbname']) {
	echo '<div class="alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
} else {
	require '../nuoyis_about/yudatabase.php';
	$sql=file_get_contents("install.sql");
	$sql=explode(';',$sql);
	$yudb=new yuDB();
    $yudb->yudb_host = $yudbconfig['dbhost'];
    $yudb->yudb_user = $yudbconfig['dbuser'];
    $yudb->yudb_password = $yudbconfig['dbpwd'];
    $yudb->yudb_name = $yudbconfig['dbname'];
    $yudb->yudb_charset = 'utf8';
    $yudb->result = '';
    $yudb->databease = 'mysql';
	if ($yudb->yudetect()["code"]!="200") die('err:'.$yudb->yudetect()["error"]);
	$t=0; $e=0; $error='';
	for($i=0;$i<count($sql);$i++) {
		if ($sql[$i]=='')continue;
		if($yudb->getquery($sql[$i])["errorcode"]=="00000") {
			++$t;
		} else {
			++$e;
			$error.=$yudb->getquery($sql[$i])["error"].'<br/>';
		}
	}
}
if($e==0) {
	echo '<div class="alert alert-success">安装成功！<br/>SQL成功'.$t.'句/失败'.$e.'句</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=5">下一步>></a></p>';
} else {
	echo '<div class="alert alert-danger">安装失败<br/>SQL成功'.$t.'句/失败'.$e.'句<br/>错误信息：'.$error.'</div><p align="right"><a class="btn btn-block btn-primary" href="index.php?do=4">点此进行重试</a></p>';
}
?>
	</div>
</div>

<?php }elseif($do=='5'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">安装完成</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	<span class="sr-only">100%</span>
  </div>
</div>
	<div class="panel-body">
<?php
	@file_put_contents("install.lock",'安装锁');
	echo '<div class="alert alert-info"><font color="green">安装完成！管理账号和密码是:admin/123456丨官方群:593864053</font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立 install.lock 文件！</font></div>';
?>
	</div>
</div>

<?php }elseif($do=='6'){?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title" align="center">安装完成</h3>
	</div>
<div class="progress progress-striped">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
	<span class="sr-only">100%</span>
  </div>
</div>
	<div class="panel-body">
<?php
	@file_put_contents("install.lock",'安装锁');
	echo '<div class="alert alert-info"><font color="green">安装完成！密码:123456丨作者网站:<a href="https://xuvce.com"></a></font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立 install.lock 文件！</font></div>';
?>
	</div>
</div>

<?php }?>

</div>
</body>
</html>