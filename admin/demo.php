<?php
include "header.php";
include "menu.php";
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "shop");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>Szablon</h2>
        <div class="block">
            <?php
            ?>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>