<?php
require_once('header.php');
include_once('connect.php');
if(isset($_POST['btnRegister'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
 

    $sql = "INSERT INTO `customer`(`Name`, `password`, `Phone`, `cemail`) VALUES (?,?,?,?) ";
    
    $re = $dbLink->prepare($sql);
    $valueArray = [
        "$user","$pass","$phone","$email"
    ];
    $stmt = $re->execute($valueArray);
    if($stmt){
        echo "Congrats";
    }else{
        echo "Failed";
    }
}

?>
   <div class="container">
        <h2>Member Reistration</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="POST">

            <div class="row mb-3">
                <label for="username" class="col-sm-2">Username:</label>
                <div class="col-sm-10">
                    <input id="username" type="text" name="username" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pwd" class="col-sm-2">Password:</label>
                <div class="col-sm-10">
                    <input id="pwd" type="password" name="pass" class="form-control" value="">
                </div>  
            </div>

           

        

            <div class="row mb-3">
                <label for="phone" class="col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input id="phone" type="text" name="phone" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input id="email" type="text" name="email" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <!--<div class="col-sm-10 ms-auto">-->
                <div class="d-grid col-2 mx-auto">
                    <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>

<?php
require_once('footer.php');
?>