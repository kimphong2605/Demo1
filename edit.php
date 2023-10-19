<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pid = $_POST['Id'];
    $product_name = $_POST['ProductName'];
    $price = $_POST['Price'];
    $quan = $_POST['Quantity'];
    $date = $_POST['Date'];
    $employee = $_POST['Employee_Id'];
    $supplier_id = $_POST['Supplier_Id'];
    $image = $_POST['image'];

    $sql = "UPDATE product SET 
            ProductName = '$product_name',
            Price = '$price',
            Quantity = '$quan',
            Date = '$date',
            Employee_Id = '$employee',
            Supplier_Id = '$supplier_id',
            image = '$image'
            WHERE Id = $pid";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
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
    <h2>Edit Product</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
            
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="Id" class="col-sm-2">Product ID</label>
                    <div class="col-sm-10">
                        <input id="Id" type="text" name="Id" class="form-control" value="<?= $row['Id'] ?>" required>
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
                        <button type="submit" name="EDIT" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

<?php
require_once('footer.php');
?>
