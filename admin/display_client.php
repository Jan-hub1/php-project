<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
$client_id = $_GET["client_id"];
?>
        
        <div class="grid_10">
            <div class="box round first">
                <h2>Klient nr <?php echo $client_id ?> </h2>
                <div class="block">
                    <?php
                    
                    $res = mysqli_query($link, "SELECT * FROM client WHERE id=$client_id");
                    echo "<table border='1'>";
                    echo "<tr>";
                        echo "<th>"; echo "Imię"; echo "</th>";
                        echo "<th>"; echo "Nazwisko"; echo "</th>";
                        echo "<th>"; echo "E-mail"; echo "</th>";
                        echo "<th>"; echo "Ulica"; echo "</th>";
                        echo "<th>"; echo "Miasto"; echo "</th>";
                        echo "<th>"; echo "Kod pocztowy"; echo "</th>";
                        echo "<th>"; echo "Numer telefonu"; echo "</th>";
                        echo "</tr>";
                    while($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        echo "<td>"; echo $row["firstname"]; echo "</td>";
                        echo "<td>"; echo $row["lastname"]; echo "</td>";
                        echo "<td>"; echo $row["email"]; echo "</td>";
                        echo "<td>"; echo $row["address"]; echo "</td>";
                        echo "<td>"; echo $row["city"]; echo "</td>";
                        echo "<td>"; echo $row["zipcode"]; echo "</td>";
                        echo "<td>"; echo $row["contactno"]; echo "</td>";
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