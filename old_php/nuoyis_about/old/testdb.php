<?php
include_once "yudatabase.php";
include_once 'config.php';
$xwdb = new yuDB($xwdbconfig['dbhost'],$xwdbconfig['dbuser'],$xwdbconfig['dbpwd'],$xwdbconfig['dbname']);
var_dump($xwdb->yudetect()["dberrorcode"]);
if($xwdb->yudetect()["code"]=="200")
{
    echo "true";
}else {
    echo "false";
    echo $xwdb->yudetect()["dberrorcode"];
}
