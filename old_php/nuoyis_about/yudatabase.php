<?php
#PDO数据库(新版-适配PHP8.3)
#By 诺依阁<nuoyis@nuoyis.net>

class yuDB{
     private $yudb_host;       //数据库主机
     private $yudb_user;       //数据库登陆名
     private $yudb_password;   //数据库登陆密码
     private $yudb_name;       //数据库名
     private $database;        //数据库类型
     private $yudb_charset;    //数据库字符编码
     private $yudb;            //数据库连接标识
     private $yudb_status;     //数据库状态

    public function __set(string $name, mixed $value): void
    {
        $this->{$name} = $value;
    }
     
     public function yudetect(){
     try{
         $this->yudb = @new pdo("{$this->databease}:host={$this->yudb_host};dbname={$this->yudb_name}",$this->yudb_user,$this->yudb_password);
         } catch (PDOException $e) {
         $this->yudb_status=array("code"=>"101","dberrorcode"=>$e->getCode(),"error"=>$e->getMessage());
         return $this->yudb_status;
         exit;
         }
        $this->getquery("SET NAMES {$this->yudb_charset}");
        $this->getquery("set character set {$this->yudb_charset}");
        $this->yudb_status=array("code"=>"200","Message"=>"数据库连接成功");
        return $this->yudb_status;
    }
    
     public function yuquery($tableName ,$where = "", $columnName = "*"){
        $sql = "SELECT " . $columnName . " FROM " . $tableName;
        $sql .= $where ? " WHERE " . $where : null;
        $yudata=$this->getquery($sql);
        if($yudata["errorcode"]!="00000")
        {
        return array("code"=>"102","error"=>$yudata["error"]);
        }else{
        return array("code"=>"200","data"=>$yudata["data"]);
        }
    }
    
     public function yuinsert($tableName, $column = array()) {
         $columnName = "";
         $columnValue = "";
         foreach ($column as $key => $value) {
             $columnName .= $key . ",";
             $columnValue .= "'" . $value . "',";
         }
         $columnName = substr($columnName, 0, strlen($columnName) - 1);
         $columnValue = substr($columnValue, 0, strlen($columnValue) - 1);
         $sql = "INSERT INTO $tableName($columnName) VALUES($columnValue)";
         $this->getquery($sql);
    }
    
     public function yudelect($tableName, $where = ""){
         $sql = "DELETE FROM $tableName";
         $sql .= $where ? " WHERE $where" : null;
         $this->getquery($sql);
     }
     
     public function yuupdate($tableName, $column = array(), $where = ""){
         $updateValue = "";
         foreach ($column as $key => $value) {
             $updateValue .= $key . "='" . $value . "',";
         }
         $updateValue = substr($updateValue, 0, strlen($updateValue) - 1);
         $sql = "UPDATE $tableName SET $updateValue";
         $sql .= $where ? " WHERE $where" : null;
         $this->getquery($sql);
     }
     
     public function getquery($sql){
         try {
         $res=$this->yudb->prepare($sql);
         $res->execute();
         $error = "false";
         } catch (PDOException $e) {
             $error = $e->getMessage();
         }
         return array("errorcode"=>$res->errorcode(), "error"=>$error, "data"=>$res->fetch(PDO::FETCH_BOTH));
    }
  
}
 //食用方法
 //include_once "yudatabase.php";
 //include_once 'config.php';
 //$xwdb = new yuDB($yudbconfig['dbhost'],$yudbconfig['dbuser'],$yudbconfig['dbpwd'],$yudbconfig['dbname']);
 //if($xwdb->yudetect()["code"]=="200")
// {
 //select    查
 //$yuDB->yuquery("user", "username = 'system'", "*");
 //print_r($yuDB);

 //insert    增
 //$userInfo = array('username'=>'system', 'password' => md5("system"));
 //$yuDB->yuinsert("user", $userInfo);

 //update    改
 //$userInfo = array('password' => md5("123456"));
 //$yu->yuupdate("user", $userInfo, "id = 2");

 //delete    删
 //$yuDB->yudelect("user", "id = 1");
 //dump($yuDB->printMessage());
 //}else {
 //echo $xwdb->yudetect()[""];
 //}