<!DOCTYPE html>
<html lang="pl">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Opis...">
    <meta name="author" content="Jan Kowalski">
    <title>Sklep z zabawkami</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="pagination/css/style.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<?php
include "header.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
?>

<section>
	<div class="container">
		<div class="row">
			<?php
			include "left_menu.php"
			?>



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