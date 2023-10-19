<?php
require_once('header.php');
include_once('connect.php');
$c = new connect();
$blink = $c->connectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['Id'];
    
    $sql = "DELETE FROM product WHERE Id = $pid";

    if ($blink->query($sql) === true) {
        header('Location: home.php');
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$pid = $_GET['id'];
$sql = "SELECT * FROM product WHERE Id = $pid";
$result = $blink->query($sql);
$row = $result->fetch_assoc();

?>

<div class="container">
    <h2>Delete Product</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
            
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="Id" class="col-sm-2">Product ID</label>
                    <div class="col-sm-10">
                        <input id="productId" type="text" name="Id" class="form-control" value="<?= $row['Id'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="proName" class="col-sm-2">Product Name</label>
                    <div class="col-sm-10">
                        <input id="proName" type="text" name="ProductName" class="form-control" value="<?= $row['ProductName'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="price" class="col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input id="Price" type="text" name="Price" class="form-control" value="<?= $row['Price'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="quantity" class="col-sm-2">Quantity</label>
                    <div class="col-sm-10">
                        <input id="quantity" type="text" name="Quantity" class="form-control" value="<?= $row['Quantity'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="proDate" class="col-sm-2">Product Date</label>
                    <div class="col-sm-10">
                        <input id="proDate" type="text" name="Date" class="form-control" value="<?= $row['Date'] ?>" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="image" class="col-sm-2">Image</label>
                    <div class="col-sm-10">
                        <input id="image" type="text" name="image" class="form-control" value="<?= $row['image'] ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="employee" class="col-sm-2">EmployeeID</label>
                    <div class="col-sm-10">
                        <input id="employee" type="text" name="Employee_Id" class="form-control" value="<?= $row['Employee_Id'] ?>" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="supID" class="col-sm-2">SupplierID</label>
                    <div class="col-sm-10">
                        <input id="supID" type="text" name="Supplier_Id" class="form-control" value="<?= $row['Supplier_Id'] ?>" required>
                    </div>
                </div>
            </div>

        



            <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="DELETE" class="btn btn-warning">Delete</button>
                    </div>
                </div>
            </div>

        </form>
    </div>



<?php
require_once('footer.php');
?>