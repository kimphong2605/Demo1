<?php
require_once('header.php');
include_once('connect.php');
if(isset($_POST['ADD'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $storeID = $_POST['storeID'];
    $name = $_POST['proName'];
    $price = $_POST['price'];
    $date = '2023-04-14';
    $quan = $_POST['quan'];
    $employeeID = $_POST['employeeID'];
    $supID = $_POST['supID'];
    $img = str_replace(' ','-',$_FILES['Pro_image']['name']);
    $imgdir = './image/';
    $flag = move_uploaded_file(
        $_FILES['Pro_image']['tmp_name'],
        $imgdir.$img
    );
    if($flag){
        $sql ="INSERT INTO `product`(`Store_id`, `ProductName`, `Price`, `Quantity`, `Date`, `Employee_Id`, `Supplier_Id`, `image`) VALUES (?,?,?,?,?,?,?,?)";
        $re = $dbLink->prepare($sql);
        $v = [$storeID,$name,$price,$quan,$date,$employeeID,$supID,$img];
        $stmt = $re->execute($v);
        if($stmt){
            echo "Congrats";
        }

    }else{
        echo "Copy failed";
    }


}
?>

<div class="container">
    <h2>Product Add</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="storeID" class="col-sm-2">StoreID</label>
                    <div class="col-sm-10">
                        <input id="storeID" type="text" name="storeID" class="form-control" placeholder="StoreID" value="">
                    </div>  
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12">
                    <label for="proName" class="col-sm-2">Product Name</label>
                    <div class="col-sm-10">
                        <input id="proName" type="text" name="proName" class="form-control" placeholder="Product Name" value="">
                    </div>  
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="price" class="col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input id="price" type="text" name="price" class="form-control" placeholder="Price" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="quan" class="col-sm-2">Quannity</label>
                    <div class="col-sm-10">
                        <input id="quan" type="text" name="quan" class="form-control" placeholder="Quannity" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="proDate" class="col-sm-2">Product Date</label>
                    <div class="col-sm-10">
                        <input id="proDate" type="date" name="proDate" class="form-control" placeholder="Product Name" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical" class="col-sm-2">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="row mb-3">
                <div class="col-12">
                    <label for="employeeID" class="col-sm-2">EmployeeID</label>
                    <div class="col-sm-10">
                        <input id="employeeID" type="text" name="employeeID" class="form-control" placeholder="EmployeeID" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="supID" class="col-sm-2">SupplierID</label>
                    <div class="col-sm-10">
                        <input id="supID" type="text" name="supID" class="form-control" placeholder="SupplierID" value="">
                    </div>
                </div>  
            </div>



            <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="ADD" class="btn btn-warning">Submit</button>
                    </div>
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="btnReset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </div>

        </form>
    </div>



<?php
require_once('footer.php');
?>