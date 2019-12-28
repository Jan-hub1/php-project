<?php
session_start();
?>
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


<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Check out</li>
			</ol>
		</div>



		<div class="register-req">
			<p>Podaj prawidłowe dane na które chcesz żeby wysłać Twoje zamówione produkty</p>
		</div>


		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-3">

				</div>
				<div class="col-sm-5 clearfix">
					<div class="bill-to">
						<p>Podaj adres dostawy</p>
						<div>
							<form name="form1" action="" method="POST">
								<div class="form-group">
									<input type="text" placeholder="Imię" name="firstname" required class="form-control">
									<input type="text" placeholder="Nazwisko" name="lastname" required class="form-control">
									<input type="text" placeholder="Email" name="email" required class="form-control">
									<input type="text" placeholder="Ulica i numer" name="resi" required class="form-control">
									<input type="text" placeholder="Miasto" name="city" required class="form-control">
									<input type="text" placeholder="Kod pocztowy" name="zipcode" required class="form-control">
									<input type="text" placeholder="Numer telefonu" name="cno" required class="form-control">
								</div>
								<button type="submit" name="submit1" class="btn btn-warning">Wyślij</button>
							</form>
						</div>

					</div>
				</div>

			</div>
		</div>


		<?php
		if (isset($_POST["submit1"])) {
			$link = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link, "shop");
			mysqli_query($link, "INSERT INTO client VALUES('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[resi]','$_POST[city]','$_POST[zipcode]','$_POST[cno]')");
			mysqli_query($link, "INSERT INTO torder_id VALUES('')");

			$res = mysqli_query($link, "SELECT id FROM client ORDER BY id DESC LIMIT 1");
			while ($row = mysqli_fetch_array($res)) {
				$client_id = $row["id"];
			}
			$res2 = mysqli_query($link, "SELECT id FROM torder_id ORDER BY id DESC LIMIT 1");
			while ($row2 = mysqli_fetch_array($res2)) {
				$order_id = $row2["id"];
			}
			foreach ($_COOKIE['item'] as $name1 => $value) {
				$values11 = explode("__", $value);

				mysqli_query($link, "INSERT INTO torder VALUES('','$order_id','$client_id','$values11[0]','$values11[2]','$values11[3]','$values11[4]')");
			}
		?>
			<script type="text/javascript">
				window.location = "order_confirm.php";
			</script>
		<?php
		}


		?>

	</div>
</section>




<?php
include "footer.php";
?>




<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>

</html>