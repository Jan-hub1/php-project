<?php
$id = $_GET["id"];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");

if (isset($_POST["submit1"])) {
	$d = 0;
	if (isset($_COOKIE['item'])) //sprawdź czy istnieje cookie 'item'
	{

		foreach ($_COOKIE['item'] as $name => $value) {
			$d = $d + 1;
		}
		$d = $d + 1;
	} else {
		$d = $d + 1;
	}

	//pobierz produkt z tablicy
	$res3 = mysqli_query($link, "SELECT * FROM product WHERE id=$id");
	while ($row3 = mysqli_fetch_array($res3)) {
		$cid = $row3["id"];
		$nm = $row3["product_name"];
		$prize = $row3["product_price"];
		$qty = "1";
		$total = $prize * $qty;
	}

	if (isset($_COOKIE['item']))  //sprawdź dostępność cookie
	{
		foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
		{
			$values11 = explode("__", $value);
			$found = 0;
			if ($cid == $values11[0])      //this is for check same cookies available or not if available then increase qty
			{
				//check here for quantity add in the cart for more than available quantity
				$found = $found + 1;
				$qty = $values11[3] + 1;

				$tb_qty;
				$res = mysqli_query($link, "SELECT * FROM product WHERE id='$cid'");
				while ($row = mysqli_fetch_array($res)) {
					$tb_qty = $row["product_qty"];
				}

				if ($tb_qty < $qty) {
?>
					<script type="text/javascript">
						alert("Niestety nie mamy tyle na stanie");
					</script>
				<?php

				} else {

					$total = $values11[2] * $qty;
					setcookie("item[$name1]", $cid . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800);
				}
			}
		}

		if ($found == 0) {
			$tb_qty;
			$res = mysqli_query($link, "SELECT * FROM product WHERE id='$cid'");
			while ($row = mysqli_fetch_array($res)) {
				$tb_qty = $row["product_qty"];
			}

			if ($tb_qty < $qty) {
				?>
				<script type="text/javascript">
					alert("Niestety nie mamy tyle na stanie");
				</script>
			<?php

			} else {

				setcookie("item[$d]", $cid . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800); //nowe ciasteczko

			}
		}
	} else {
		$tb_qty;
		$res = mysqli_query($link, "SELECT * FROM product WHERE id='$cid'");
		while ($row = mysqli_fetch_array($res)) {
			$tb_qty = $row["product_qty"];
		}

		if ($tb_qty < $qty) {
			?>
			<script type="text/javascript">
				alert("this much quantity not available");
			</script>
<?php

		} else {
			setcookie("item[$d]", $cid . "__" . $nm . "__" . $prize . "__" . $qty . "__" . $total, time() + 1800); //new
		}
	}
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Opis produktu</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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

?>
<section>
	<div class="container">
		<div class="row">

			<?php
			include "left_menu.php"
			?>

			<?php
			$res = mysqli_query($link, "SELECT * FROM product WHERE id=$id");
			if (isset($_GET['id'])) { // jeśli istnieje zmienna id to pokaż towar
				while ($row = mysqli_fetch_array($res)) {
			?>

					<!-- początek produkctu -->
					<div class="col-sm-9 padding-right">
						<div class="product-details">
							<div class="col-sm-5">
								<div class="view-product">
									<img src="../admin/<?php echo $row["product_image"]; ?>" alt="" />
								</div>
							</div>

							<form name="form1" method="POST">

								<div class="col-sm-7">
									<div class="product-information">
										<h2><?php echo $row["product_name"] ?></h2>
										<p>Numer katalogowy: <?php echo $row["id"] ?></p>

										<span>
											<span><?php echo $row["product_price"] ?> zł</span>
											<label>Ilość:</label>
											<input type="text" value="1" />
											<button type="submit" name="submit1" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Kup Teraz
											</button>
										</span>
										<p><b>Stan w magazynie:</b> <?php echo $row["product_qty"] ?> sztuk</p>
									</div>
								</div>
						</div>
						</form>
						<!-- Koniec produktu-->

						<div class="category-tab shop-details-tab">
							<!--category-tab-->
							<div class="col-sm-12">
								<ul class="nav nav-tabs">
									<li><a href="#details" data-toggle="tab">Opis</a></li>
									
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="details">
									<div class="col-sm-12">

										<p class="m-2"><?php echo $row["pproduct_desc"] ?></p>

									</div>
								</div>

								

								

								

							</div>
						</div>
						<!--/category-tab-->
				<?php
				}
			}
				?>


					</div>
		</div>
	</div>
</section>

<?php
include "footer.php";
?>
<!--/Footer-->



<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>

</html>