<?php
class connect{
    public $server;
    public $dbName;
    public $username;
    public $password;

    public function __construct(){
        $this->server ="jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "z716dyqcml1i1i0b";
        $this->password = "lwjtb49j7sn6oziv";
        $this->dbName="ujopkqac5epwybdl";
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