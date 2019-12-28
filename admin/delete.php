<?php
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
$id = $_GET["id"];

$res = mysqli_query($link, "SELECT * FROM product WHERE id=$id");
while($row=mysqli_fetch_array($res)) {
    $img = $row["product_image"];
}

unlink($img);

mysqli_query($link, "DELETE FROM product WHERE id=$id");
?>

<script type="text/javascript">window.location="display_product.php";</script>