<?php
require_once('header.php');
include_once('connect.php');
if (isset($_POST['btnLogin'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM customer WHERE Name = ? AND password = ?";
        $stmt = $dblink->prepare($sql);
        $stmt->execute(array($usr, $pwd));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            echo "Login successfully";
            $_SESSION['user_name'] = $row['Name'];
            header("Location: home.php");
            exit;
        } else {
            echo "Something is wrong with your login information. <br>";
        }
    } else {
        echo "Please enter your username and password.";
    }
}

?>

<div class="d-md-flex half">
    <div class="bg"></div>
</div>
<div class="container">
            <form action="#" class="form form-vertical" name="formlogin" role="form" method="post" enctype="multipart/form-data"> 
                <div class="row mb-3 ">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="username" class="col-sm-2"> Username</label>
                         <input id="username" type="text" name="username" class="form-control" placeholder="username">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="password" class="col-sm-2"> Password</label>
                         <input id="password" type="password" name="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                            <label for="remember me " class="col-sm-3">Remember me</label>
                            <input type="checkbox" name="rmbme" id="rmb" checked="checked">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                        <a href="#" class="col-sm-3">Forget password?</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-1 mx-auto">
                        <div class="form-group">
                           <input type="submit" value="Log In" class="btn btn-info" name="btnLogin">
                        </div>
                    </div>
                </div>
            </form>

<?php
require_once('footer.php');
?>