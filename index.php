<?php 

session_start();
// effacer les éléments d'une session :
// unset($_SESSION['blue']);
include("methods.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php
    CheckCSSLink();
    ?>
    <title>Super RSS Reader</title>
  </head>

  <body>

    <header>
      <h1 class="center-align"> <a href="http://www.rssfeed.info/index.php">Super RSS Reader</a> </h1>
      <?php
      include("superUser.php");
      ?>
    </header>

    <?php
    if(!isset($_SESSION['login']) || !isset($_SESSION['password']))
    {
      include("user.php");
    }
    else
    { 
    include("navbar.php");
    include("articles.php");
    }
    ?>

  <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".modal").modal();
        
        $("select").formSelect();

        // $("select").on("change", function() {
        // var y = $(this).val();
        // // alert(y);
        // $("body").css("background-color", y);
        // });
      });
  </script>
  </body>
</html>