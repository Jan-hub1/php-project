<?php
include "header.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
?>
<?php
include "left_menu.php"
?>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/style.css" rel="stylesheet" type="text/css" />

<div class="col-sm-9 padding-right">
	<div class="features_items">
		<!--produkty-->
		<h2 class="title text-center">Produkty</h2>

		<?php

		include("pagination/function.php");
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$limit = 6; // ilość przedmiotów na jednej stronie
		$startpoint = ($page * $limit) - $limit;
		$statement = "product";

		$res = mysqli_query($link, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
		while ($row = mysqli_fetch_array($res)) {

		?>
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="../admin/<?php echo $row["product_image"]; ?>" alt="" width="266" height="300" />
							<h2><?php echo $row["product_price"] ?> zł</h2>
							<p><?php echo $row["product_name"] ?></p>
							<a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Kup Teraz</a>
						</div>
						<div class="product-overlay">
							<div class="overlay-content">
								<h2><?php echo $row["product_price"] ?> zł</h2>
								<p><?php echo $row["product_name"] ?></p>
								<a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Zobacz opis</a>
							</div>
						</div>
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
							<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
						</ul>
					</div>
				</div>
			</div>
		<?php


		}
		?>


	</div>
	<ul class="pagination">
		<?php
		echo pagination($statement, $limit, $page);
		?>
	</ul>
</div>
<!--koniec produktów-->
</div>
</div>
</div>
</section>

<?php
include "footer.php";
?>