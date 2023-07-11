<?php
//原文由https://blog.csdn.net/weixin_41460722/article/details/107114995提供
header("Content-Type: text/html;charset=utf-8");
include '../nuoyis_about/define.php';
$password = isset($_POST['password']) ? $_POST['password'] : "";
if (!empty($password)) {
    $dbpassword = $yudb->yuquery("xwsql","id = 1");
    $md5paw=md5($password);
    if ($md5paw == $dbpassword['data']['password'])
    { 
        setcookie("nuoaboutme", "1", time() + 7 * 24 * 3600);
        header("Location:./");
    }
    else
    {
        header("Location:./login.php?err=1");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <link rel="stylesheet" href="login.css">
    <meta name="content-type"; charset="UTF-8">
</head>
<body>
<div id="bigBox">
        <h1>登录</h1>

        <form id="loginform" action="login.php" method="post">
            <div class="inputBox">
                <div class="inputText">
                   <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <br >
                <div style="color: white;font-size: 12px" >
                    <?php
                    $err = isset($_GET["err"]) ? $_GET["err"] : "";
                    switch ($err) {
                        case 1:
                            echo "密码错误！";
                            break;
                    } ?>
                </div>
            </div>
           <div>
               <input type="submit" id="login" name="login" value="登录" class="loginButton m-left">
               <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
               <p>@2020 - 至今 诺依阁的个人介绍</p>
               <p>当前介绍版本: V3.0版本</p>
           </div>
</div>
</div>
</form>
</body>
</html>