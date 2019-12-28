<?php
session_start();

if (isset($_COOKIE['item']))  
{
    foreach ($_COOKIE['item'] as $name1 => $value) {

        if (isset($_POST["delete$name1"])) {

            setcookie("item[$name1]", "", time() - 1800);
?>
            <script type="text/javascript">
                window.location.href = window.location.href;
            </script>
<?php
        }
    }
}

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
<!--/header-->

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Koszyk</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <form name="form1" action="" method="post">
                    <?php
                    $d = 0;
                    if (isset($_COOKIE['item']))  //Sprawdza czy cookie jest dostępne
                    {
                        $d = $d + 1;
                    }
                    if ($d == 0) {
                        echo "Koszyk jest pusty";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    } else {
                    ?>
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Produkt</td>
                                <td class="description"></td>
                                <td class="price">Cena</td>
                                <td class="quantity">Ilość</td>
                                <td class="total">Suma</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_COOKIE['item'] as $name1 => $value)
                            {
                                $values11 = explode("__", $value);

                            ?>
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="../admin/<?php echo $values11[0]; ?>" alt="" height="100" width="100"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""><?php echo $values11[1]; ?></a></h4>

                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $values11[2]; ?> zł</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">

                                            <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $values11[3]; ?>" autocomplete="off" size="2" readonly>

                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo $values11[4]; ?> zł</p>
                                    </td>
                                    <td><input type="submit" name="delete<?php echo $name1; ?>" value="Usuń" id="s3"></td>

                                </tr>
                            <?php

                            }

                            ?>


                        </tbody>
                </form>
            </table>
            <table class="table">
                <tbody>
                <tr>
                    
                    <td class="cart_total pull-right">
        <?php

                    }
                    $tot = 0;

                    if (isset($_COOKIE['item']))
                    {
                        foreach ($_COOKIE['item'] as $name1 => $value)
                        {
                            $values11 = explode("__", $value);
                            $tot = $tot + $values11[4];
                        }

                        ?><p class="cart_total_price">Razem: <?php echo $tot." zł"; ?></p>
                        <?php
                    }
        ?>
        </td>
        </tr>
        <tr>
            <td class="pull-right">
            <a href="checkout.php">
        <input type="button" value="Zamawiam"></a>
            </td>
        </tr>
        </tbody>
        </table>


        </div>
    </div>
</section>
<!--/#cart_items-->
<?php
include "footer.php";
?>
<!--/Footer-->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>

</html>