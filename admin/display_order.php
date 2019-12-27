<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>Zamówienia</h2>
        <div class="block">
            <?php
            $res = mysqli_query($link, "SELECT * FROM torder ORDER BY id DESC");
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>"; echo "Numer zamówienia"; echo "</th>";
                echo "<th>"; echo "Numer klienta"; echo "</th>";
                echo "<th>"; echo "Numer produktu"; echo "</th>";
                echo "<th>"; echo "Cena"; echo "</th>";
                echo "<th>"; echo "Ilość"; echo "</th>";
                echo "<th>"; echo "Suma pozycji"; echo "</th>";
                echo "<th>"; echo " "; echo "</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>"; echo $row["order_id"]; echo "</td>";
                echo "<td>"; echo $row["client_id"]; echo "</td>";
                echo "<td>"; echo $row["product_id"]; echo "</td>";
                echo "<td>"; echo $row["product_price"]; echo "</td>";
                echo "<td>"; echo $row["product_qty"]; echo "</td>";
                echo "<td>"; echo $row["product_total"]; echo "</td>";
                echo "<td>"; ?> <a href="display_client.php?client_id=<?php echo $row["client_id"]; ?>">Szczegóły klienta</a> <?php echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
</div>

</div>

<?php
include "footer.php";
?>