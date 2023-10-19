<?php
require_once('header.php');
include_once('connect.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$c = new Connect();
$dblink = $c->connectToPDO();
if(isset($_SESSION['user_name'])){ //Check if user logged into website
    $user = $_SESSION['user_name'];
    // $user_id = $_SESSION['user_id'];

    if(isset($_GET['pid'])){ //When user add an item to shopping cart
        $p_id = $_GET['pid'];
        $sqlSelect1 = "SELECT pid FROM cart WHERE user_id = ? and pid = ?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user","$p_id"));

        //check if the item has been added
        if($re->rowCount() == 0){ //The item could not be found in user's cart
            $query ="INSERT INTO cart(user_id,pid,pCount,date) VALUE(?,?,1,CURDATE())";
        }else{//Added by user
            $query = "UPDATE cart SET pCount = pCount + 1 where user_id = ? and pid = ?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$user","$p_id"));

    }else if(isset($_GET['del_id'])){//When user want to delete an item to shopping cart
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM cart WHERE cart_id=?";
        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));
    }

    //Show a list of shopping cary
    $sqlSelect = "SELECT * FROM cart c, product p WHERE c.pid = p.pid and user_id=?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1 -> execute(array($user));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
    
}else{
    header("Location: login.php");
}
?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
    <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
            foreach($rows as $row){
            ?>
            <tr>
                <td><?=$row['pname']?></td>
                <td><input id="form1" min ="0" name="quantity" value="<?=$row['pCount']?>" type="number"
                    class="form-control form-control-sm" /></td>
                <td><h6 class="mb-0"><span>&#8363;</span> <?=$row['pCount']?> * <?=$row['pprice']?> </h6></td>
                <td><a href="cart.php?del_id=<?=$row['cart_id']?>" class="text-muted text-decoration-none">x</a></td>
            <?php
            }
            ?>
    </table>
            <hr class="my-4">

            <div class="pt-5">
                <h6 class="mb-0"><a href="allproduct.php" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>

</div>



<?php
require_once('footer.php');
?>