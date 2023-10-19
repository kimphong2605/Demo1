<?php
require_once('header.php');
include_once('connect.php');
$c = new connect();
$blink = $c->connectToMySQL();
$sql = 'SELECT * FROM product ORDER BY Id DESC LIMIT 3';
$re = $blink->query($sql);

if ($re->num_rows > 0) {
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
        <h1 class="text-success">Hot Products</h1>
        <div class="row">
            <?php while ($row = $re->fetch_assoc()) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="./image/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['ProductName'] ?>">
                        <div class="card-body">
                            <a href="detail.php?id=<?= $row['Id'] ?>" class="text-decoration-none">
                                <h5 class="card-title text-success"><?= $row['ProductName'] ?></h5>
                            </a>
                            <h6 class="card-subtitle mb-2 text-muted">$<?= $row['Price'] ?></h6>
                            <a href="detail.php?id=<?= $row['Id'] ?>" class="btn btn-success">More Details</a> <!-- Thêm nút More Details -->
                            <a href="delete.php?id=<?= $row['Id'] ?>" class="btn btn-success">Delete</a>
                            <a href="edit.php?id=<?= $row['Id'] ?>" class="btn btn-success">Edit</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php } ?>
</body>
<style>
    .card {
        border: 2px solid green;
        text-align: center;
        background-color: whitesmoke;
        border-radius: 5px;
          box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1); 
        margin: 0 10px;
        max-width: 250px;
    }

    .card-img-top {
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    .text-success {
        color: red;
        font-weight: bold;
    }

    .card-subtitle {
        font-size: 20px;
        color: black;
        font-weight: bold;
    }

    .btn-success {
        background-color: green;
        color: white;
        font-weight: bold;
    }
</style>
