<?php
class connect{
    public $server;
    public $dbName;
    public $username;
    public $password;

    public function __construct(){
        $this->server ="td5l74lo6615qq42.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "an8zcv85oury962f";
        $this->password = "ef7ghgfu7a49ybv7";
        $this->dbName="j4e4bhi6a2y1lc5l";
    }
    
    //option 1: mysqli
    function connectToMySQL():mysqli{
        $conn = new mysqli($this->server,$this->username,$this->password,$this->dbName);

        if($conn->connect_error){
            die("Failed".$conn->connect_error);
        }else{
            //echo "Connect!";
        }
        return $conn;
    }

    //option 2: PDO
    function connectToPDO():PDO{
        try{
            $conn = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->username,$this->password);
           //echo "Connect! PDO";
        }catch(PDOException $e){
            die("Failed".$e);
        }
        return $conn;
    }
}
$c = new Connect();
$c->connectToPDO();
//$c->connectToMySQL();
?>