<?php
header("Content-type: text/html; charset=utf-8");
echo "select * FROM yuip where add_time>="."'".date('Y-m-d',time())." and add_time<"."'".date('Y-m-d',strtotime('+1 day'))."'";
echo $script['id'];
echo "</br>";
echo $script['ip'];
echo "</br>";
echo $script['froms'];
?>