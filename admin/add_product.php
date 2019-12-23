<?php
session_start();
if(isset($_SESSION["admin"])=="") {
    ?>
    <script type="text/javascript">
    window.location="admin_login.php";
    </script>
    <?php
}
include "header.php";
include "menu.php";
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"shop");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>Add Product</h2>
        <div class="block">
            <form name="form1" method="POST" enctype="multipart/form-data">
                <table border="1">
                    <tr>
                        <td>
                            Nazwa
                        </td>
                        <td><input type="text" name="pnm" </td> </tr> <tr>
                        <td>
                            Cena
                        </td>
                        <td><input type="text" name="pprice" </td> </tr> <tr>
                        <td>
                            Stan
                        </td>
                        <td><input type="text" name="pqty" </td> </tr> <tr>
                        <td>
                            Obraz
                        </td>
                        <td><input type="file" name="pimage" </td> </tr> <tr>
                        <td>
                            Kategoria
                        </td>
                        <td>
                            <select name="pcategory">
                                <option value="Drewniane">Drewniane</option>
                                <option value="Interaktywne">Interaktywne</option>
                                <option value="Naukowe">Naukowe</option>
                                <option value="Roboty">Roboty</option>
                            </select>
                        </td>
                    </tr>
                        <tr>
                        <td>
                            Opis
                        </td>
                        <td>
                            <textarea cols="15" rows="10" name="pdesc"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit1" value="Zapisz"
                        </td>
                         </tr>


                </table>



            </form>



            <?php
        if(isset($_POST["submit1"])) {
            // zapisz zdjęcie i zmień nazwę na losową
            $v1=rand(1111,9999);
            $v2=rand(1111,9999);

            $v3=$v1.$v2;

            $v3=md5($v3);

            $fnm=$_FILES["pimage"]["name"];
            $dst="./product_image/".$v3.$fnm;
            $dst1="product_image/".$v3.$fnm;
            move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

            mysqli_query($link, "INSERT INTO product VALUES('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");
        }
            ?>
        </div>
    </div>
</div>

</div>
<?php
include "footer.php";
?>