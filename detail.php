<?php
include_once('header.php');
?>
<div class="container px-4 py-5">
	<?php
	if(isset($_GET['id'])):
		$pid = $_GET['id'];
		require_once 'connect.php';
		$conn = new Connect();
		$db_link = $conn->connectToPDO();
		$sql =	"SELECT * FROM product WHERE Id =?";
		$stmt = $db_link->prepare($sql);
		$stmt ->execute(array($pid));
		$re = $stmt->fetch(PDO::FETCH_BOTH);	
	?>	
		<h2> <?=$re['ProductName']?> </h2>
		<ul style="list-style-type:none ;" class="list-group">
			Price: <li class="list-group-item"> <?=$re['Price']?> </li>
			Image:<img src="./image/<?=$re['image']?>" alt="<?=$re['ProductName']?>" width="300px">
	</ul>
	<form action="order.php" method="GET"> 
		<div class="col-lg-9">
		<input type="hidden" name="pid" value="<?=$pid?>">
		<!-- <input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Order Now"/> -->
		</div>
	</form>
	<?php 
		else:
		?>
		<h2>Nothing to show</h2>
	<?php 
	endif;
	?>
</div>

<?php 
include_once('footer.php');
?>