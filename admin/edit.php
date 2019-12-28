<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
$id = $_GET["id"];
$res = mysqli_query($link, "SELECT * FROM product WHERE id=$id");
while ($row = mysqli_fetch_array($res)) {
    $product_name = $row["product_name"];
    $product_price = $row["product_price"];
    $product_qty = $row["product_qty"];
    $product_img = $row["product_image"];
    $product_category = $row["product_category"];
    $product_desc = $row["pproduct_desc"];
}
?>

<form name="form1" action="" method="POST" enctype="multipart/form-data">
    <div class="grid_10">
        <div class="box round first">
            <h2>Edytuj product ID=<?php echo $id; ?></h2>
            <div class="block">
                <table border="1">
                    <tr>
                        <td colspan="2" align="center">
                            <img src="<?php echo $product_img; ?>" height="100" width="100">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nazwa
                        </td>
                        <td><input type="text" size="100" name="pnm" value="<?php echo $product_name; ?>"> </td>
                    </tr>
                    <tr>
                        <td>
                            Cena
                        </td>
                        <td><input type="text" name="pprice" value="<?php echo $product_price; ?>"> </td>
                    </tr>
                    <tr>
                        <td>
                            Stan
                        </td>
                        <td><input type="text" name="pqty" value="<?php echo $product_qty; ?>"> </td>
                    </tr>
                    <tr>
                        <td>
                            Obraz
                        </td>
                        <td><input type="file" name="pimage"> </td>
                    </tr>
                    <tr>
                        <td>
                            Kategoria
                        </td>
                        <td>
                            <input type="text" name="pcategory" value="<?php echo $product_category; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Opis
                        </td>
                        <td>
                            <textarea cols="100" rows="10" name="pdesc"><?php echo $product_desc; ?>"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit1" value="Zapisz zmiany">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST["submit1"])) {
    $fnm = $_FILES["pimage"]["name"];

    if ($fnm == "") {
        mysqli_query($link, "UPDATE product SET product_name='$_POST[pnm]', product_price='$_POST[pprice]', product_qty='$_POST[pqty]', product_category='$_POST[pcategory]', pproduct_desc='$_POST[pdesc]' WHERE id=$id");
    } else {
        $v1 = rand(1111, 9999);
        $v2 = rand(1111, 9999);

        $v3 = $v1 . $v2;

        $v3 = md5($v3);

        $fnm = $_FILES["pimage"]["name"];
        $dst = "./product_image/" . $v3 . $fnm;
        $dst1 = "product_image/" . $v3 . $fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"], $dst);
        mysqli_query($link, "UPDATE product SET product_image='$dst1', product_name='$_POST[pnm]', product_price='$_POST[pprice]', product_qty='$_POST[pqty]', product_category='$_POST[pcategory]', pproduct_desc='$_POST[pdesc]' WHERE id=$id");
    }
?>
    <script type="text/javascript">
        window.location = "display_product.php";
    </script>
<?php




}
?>

<?php
include "footer.php";
?>