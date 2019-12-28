<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>Lista produktów</h2>
        <div class="block">
            <?php
            $res = mysqli_query($link, "SELECT * FROM product");
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>";
            echo "ID";
            echo "</th>";
            echo "<th>";
            echo "Obrazek";
            echo "</th>";
            echo "<th>";
            echo "Nazwa";
            echo "</th>";
            echo "<th>";
            echo "Cena";
            echo "</th>";
            echo "<th>";
            echo "Stan magazynowy";
            echo "</th>";
            echo "<th>";
            echo "Kategoria";
            echo "</th>";
            echo "<th>";
            echo "Opis";
            echo "</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>";
                echo $row["id"];
                echo "</td>";
                echo "<td>"; ?>
                <img src="<?php echo $row["product_image"]; ?>" height="50" width="50">
                <?php echo "</td>";
                echo "<td>";
                echo $row["product_name"];
                echo "</td>";
                echo "<td>";
                echo $row["product_price"];
                echo "</td>";
                echo "<td>";
                echo $row["product_qty"];
                echo "</td>";
                echo "<td>";
                echo $row["product_category"];
                echo "</td>";
                echo "<td>";
                echo $row["pproduct_desc"];
                echo "</td>";
                echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>">Usuń</a> <?php echo "</td>"; echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>">Edytuj</a> <?php echo "</td>"; echo "</tr>";
}
                echo "</table>";
?>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>