<?php
//小惟改造三合一mysql
if(defined('SQLITE')==true){
	class xwsql {
		var $link = null;
		
		public function __construct($xw_file){
		global $siteurl;
		$this->xw_connect = new PDO('sqlite:'.ROOT.'includes/sqlite/'.$xw_file.'.xwdb');
		if (!$this->xw_connect) die('惟依涵在连接数据库时出现错误\n');
        }

		public function fetch($q){
			return $q->fetch();
		}
		public function get_row($q){
			$sth = $this->xw_connect->query($q);
			return $sth->fetch();
		}
		public function count($q){
			$sth = $this->xw_connect->query($q);
			return $sth->fetchColumn();
		}
		public function xwquery($q){
			return $this->result=$this->xw_connect->query($q);
		}
		public function affected(){
			return $this->result->rowCount();
		}
	}
}else if(extension_loaded('mysqli')) {
    class xwsql {

     private $xwdb_host;       //数据库主机
     private $xwdb_user;       //数据库登陆名
     private $xwdb_pwd;        //数据库登陆密码
     private $xwdb_name;       //数据库名
     private $xwdb_charset;    //数据库字符编码
     private $xwdb_pconn;      //长连接标识位
     private $debug;         //调试开启
     private $conn;          //数据库连接标识

 //    private $sql = "";      //待执行的SQL语句

     public function __construct($xwdb_host, $xwdb_user, $xwdb_pwd, $xwdb_name, $xwdb_chaeset = 'utf8', $xwdb_pconn = false, $debug = false) {
         $this->xwdb_host = $xwdb_host;
         $this->xwdb_user = $xwdb_user;
         $this->xwdb_pwd = $xwdb_pwd;
         $this->xwdb_name = $xwdb_name;
         $this->xwdb_charset = $xwdb_chaeset;
         $this->xwdb_pconn = $xwdb_pconn;
         $this->result = '';
         $this->debug = $debug;
         $this->xwsql();
     }
     
     public function xwsql() {
        $this->conn=new mysqli($this->xwdb_host, $this->xwdb_user, $this->xwdb_pwd,$this->xwdb_name);
        if (is_null($this->conn->connect_error))
        {
        $this->getquery("SET NAMES {$this->xwdb_charset}");
        $this->getquery("set character set {$this->xwdb_charset}");
        $this->getquery("set sql_mode = {$this->result}");
        return true;
        }else{
        return false;
        }
     }
     
     private static $link;
     
     public static function xwin($dbhost,$dbuser,$dbpass,$dbname,$dbport){
         self::$link=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,$dbport);
         return self::$link;
     }
     
     public static function  xwin_query_errno(){
			return mysqli_connect_errno();
		}
	 public static function  xwin_query_error(){
			return mysqli_connect_error();
		}
    
     public static function inquery($sql){
            return mysqli_query(self::$link,$sql);
     }
     
     public function getquery($sql){
            $res=$this->conn->query($sql);
           return $res;
     }
     
     public static function errno(){
			return mysqli_errno(self::$link);
	}
	 public static function error(){
			return mysqli_error(self::$link);
	}
 
     public function xwquery($tableName ,$where = "", $columnName = "*"){
        $sql = "SELECT " . $columnName . " FROM " . $tableName;
        $sql .= $where ? " WHERE " . $where : null;
        $res=$this->getquery($sql);
        if($res!=NULL)
        {
        $row = mysqli_fetch_assoc($res);
        return $row;
        }else{
        return 0;
        }
        $this->xwdbclose();
    }

        public function xwinsert($tableName, $column = array()) {
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

     public function xwupxwsql($tableName, $column = array(), $where = "") {
         $updateValue = "";
         foreach ($column as $key => $value) {
             $updateValue .= $key . "='" . $value . "',";
         }
         $updateValue = substr($updateValue, 0, strlen($updateValue) - 1);
         $sql = "UPDATE $tableName SET $updateValue";
         $sql .= $where ? " WHERE $where" : null;
         $this->getquery($sql);
     }

     public function xwdelect($tableName, $where = ""){
         $sql = "DELETE FROM $tableName";
         $sql .= $where ? " WHERE $where" : null;
         $this->getquery($sql);
     }

     public function freeResult(){
         @mysqli_free_result($this->result);
     }

     public function xwdbclose() {
         if(!empty($this->result)){
             $this->freeResult();
         }
         mysqli_close($this->conn);
     }
	}
} else { // 老版本php支持&&老版mysql
class xwsql {
    
     private $xwdb_host;       //数据库主机
     private $xwdb_user;       //数据库登陆名
     private $xwdb_pwd;        //数据库登陆密码
     private $xwdb_name;       //数据库名
     private $xwdb_charset;    //数据库字符编码
     private $xwdb_pconn;      //长连接标识位
     private $debug;         //调试开启
     private $conn;          //数据库连接标识

 //    private $sql = "";      //待执行的SQL语句

     public function __construct($xwdb_host, $xwdb_user, $xwdb_pwd, $xwdb_name, $xwdb_chaeset = 'utf8', $xwdb_pconn = false, $debug = false) {
         $this->xwdb_host = $xwdb_host;
         $this->xwdb_user = $xwdb_user;
         $this->xwdb_pwd = $xwdb_pwd;
         $this->xwdb_name = $xwdb_name;
         $this->xwdb_charset = $xwdb_chaeset;
         $this->xwdb_pconn = $xwdb_pconn;
         $this->result = '';
         $this->debug = $debug;
         $this->xwsql();
     }
     public function xwsql() {
         if ($this->xwdb_pconn) {
             $this->conn = @mysql_pconnect($this->xwdb_host, $this->xwdb_user, $this->xwdb_pwd) or die("惟依涵检查数据库在建立时出现问题");
         } else {
             $this->conn = @mysql_connect($this->xwdb_host, $this->xwdb_user, $this->xwdb_pwd) or die("惟依涵检查数据库在建立时出现问题");
         }
             $this->getquery("SET NAMES " . $this->xwdb_charset);
     }
     
    public static function xwin($dbhost,$dbuser,$dbpass,$dbname){
         $this->conn=new mysql($dbhost,$dbuser,$dbpass,$dbname);
     }
     
     public static function  xwin_query_errno(){
			return mysql_connect_errno();
		}
	 public static function  xwin_query_error(){
			return mysql_connect_error();
		}
    
     public function getquery($sql){
        $res=$this->conn->query($sql);
        return $res;
     }
     
     public static function errno(){
			return mysql_errno($this->conn);
	}
	 public static function error(){
			return mysql_error($this->conn);
	}
 
     public function xwquery($tableName ,$where = "", $columnName = "*"){
        $sql = "SELECT " . $columnName . " FROM " . $tableName;
        $sql .= $where ? " WHERE " . $where : null;
        $res=$this->getquery($sql);
        $row = mysql_fetch_assoc($res);
        return $row;
        $this->xwdbclose();
    }

        public function xwinsert($tableName, $column = array()) {
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
         $this->xwdbclose();
        }

     public function xwupxwsql($tableName, $column = array(), $where = "") {
         $updateValue = "";
         foreach ($column as $key => $value) {
             $updateValue .= $key . "='" . $value . "',";
         }
         $updateValue = substr($updateValue, 0, strlen($updateValue) - 1);
         $sql = "UPDATE $tableName SET $updateValue";
         $sql .= $where ? " WHERE $where" : null;
         $this->getquery($sql);
         $this->xwdbclose();
     }

     public function xwdelect($tableName, $where = ""){
         $sql = "DELETE FROM $tableName";
         $sql .= $where ? " WHERE $where" : null;
         $this->getquery($sql);
         $this->xwdbclose();
     }

     public function freeResult(){
         @mysql_free_result($this->result);
     }

     public function xwdbclose() {
         if(!empty($this->result)){
             $this->freeResult();
         }
         mysql_close($this->conn);
     }
 }
}
 //select    查
 //$xwdb->xwquery("user", "username = 'system'", "*");
 //print_r($xwdb);

 //insert    增
 //$userInfo = array('username'=>'system', 'password' => md5("system"));
 //$xwxw->inxwsql("user", $userInfo);

 //update    改
 //$userInfo = array('password' => md5("123456"));
 //$xw->upxwsql("user", $userInfo, "id = 2");

 //delete    删
 //$xw->dexwsql("user", "id = 1");
 //dump($xwxw->printMessage());

 //findAll   查询全部
  //$xwxw->faxwsql("user");
 // $result = $xwxw->fetchArray();