<?php
class connect{
    public $server;
    public $dbName;
    public $username;
    public $password;

    public function __construct(){
        $this->server ="grp6m5lz95d9exiz.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "kngxh4h9ef66o8nb";
        $this->password = "bzevvyfvb9q5mfmc";
        $this->dbName="yfluy92jrg2qze0e";
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