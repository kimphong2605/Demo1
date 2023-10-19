<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM product';
$re=$dbLink->query($sql);

if($re->num_rows>0){   
?>
    <section class="py-5 text-center container"
        style="background-image: url('https://media-api.advertisingvietnam.com/oapi/v1/media?uuid=f3f85054-a4a7-4bfe-a602-a7c1e61da085&type=image');height: 700px; width: 500vh" >
        <div class="row py-ly-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light colorblack">ATN Store</h1>
            </div>
        </div>
    </section>
<div class="container">
  <div class="row">
  <h2 class="pb-2 border-bottom">Products</h2>
    <?php
        while($row=$re->fetch_assoc()){
    ?>
    <!-- html div col -->
    <div class="col-md-4 pb-3">
        <div class="card">
          <img src="image/<?=$row['image']?>" width="300px"/>
          <div class="card-body">
              <a href="detail.php?id=<?=$row['Id']?>" class ="text-decoration-none"><h5
              class="card-title"><?=$row['ProductName']?></h5></a>
              <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span> <?=$row['Price']?></h6>
              <a href="detail.php?id=<?= $row['Id'] ?>" class="btn btn-success">More Details</a> <!-- Thêm nút More Details -->
              <a href="delete.php?id=<?= $row['Id'] ?>" class="btn btn-success">Delete</a>
              <a href="edit.php?id=<?= $row['Id'] ?>" class="btn btn-success">Edit</a>
              </h5></span>
          </div>
        </div>
    </div>
    <?php
        }//while
      }//if
    ?>
  </div>
</div>

    
    <div class="b-example-divider"></div>
<?php
require_once('footer.php');
?>


