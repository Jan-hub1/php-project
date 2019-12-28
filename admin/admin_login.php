<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"shop");
?>


<!DOCTYPE html>
<html lang="pl">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
   <title>Formularz logowania</title>
</head>

<body>
   <div class="sidenav">
      <div class="login-main-text">
         <h2>Witaj!</h2>
         <p>Zaloguj się lub załóż konto.</p>
         
      </div>
   </div>
   <div class="main">
      <div class="col-md-6 col-sm-12">
         <div class="login-form">
            <form name="form1" method="POST">
               <div class="form-group">
                  <label>Nazwa użytkownika</label>
                  <input type="text" class="form-control" placeholder="Nazwa użytkownika" required name="username">
               </div>
               <div class="form-group">
                  <label>Hasło</label>
                  <input type="password" class="form-control" placeholder="Hasło" required name="pwd">
               </div>
               <input type="submit" value="Zaloguj się" class="btn btn-black" name="submit1">
               <button type="submit" class="btn btn-secondary">Załóż konto</button>
            </form>
         </div>
      </div>
   </div>

   <?php
   if (isset($_POST["submit1"])) {
      $res=mysqli_query($link,"SELECT * FROM admin_login WHERE username='$_POST[username]' && password='$_POST[pwd]'");
      while($row=mysqli_fetch_array($res))
      {
         $_SESSION["admin"]=$row["username"];
         ?>
         <script type="text/javascript">
         window.location="add_product.php";
         </script>
         <?php
      }
   }
   ?>


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
</body>

</html>