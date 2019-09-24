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
      if (isset($_SESSION['color']))
      {
        if ($_SESSION['color'] == "red")
        {
          ?> <link rel="stylesheet" href="style03.css"> <?php
        }
        elseif ($_SESSION['color'] == "blue")
        {
          ?> <link rel="stylesheet" href="style02.css"> <?php
        }
        else
        {
          ?> <link rel="stylesheet" href="style01.css"> <?php
        }
      }
      else
      {
        ?> <link rel="stylesheet" href="style01.css"> <?php
      }
    ?>
    <title>Super RSS Reader</title>
  </head>

  <body>
    <?php
    ///////////// TESTS ////////////
    // print_r($_POST);
    // echo '<br/> ';
    // print_r($_SESSION);
    // echo '<br/> ';
    // var_dump($_SESSION);
    // echo '<br/> ';
    // print_r($_COOKIE);
    // echo '<br/> ';
    // echo 'salut : ' . $_COOKIE['red'];
    /////////// FIN TESTS //////////
    ?>

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
    ?>

    <nav>
      <div class="nav-wrapper">
        <ul id="navSubjects">
          <li><a href="?sécurité">Sécurité<i class="material-icons left">lock</i></a></li>
          <li><a href="?applis">Applis, Logiciels<i class="material-icons left">android</i></a></li>
          <li><a href="?jeux">Jeux<i class="material-icons left">games</i></a></li>
        </ul> 

        <div class="right hide-on-med-and-down">
          <ul id="navParams">
            <li> <a><i class="material-icons left">perm_identity</i> Bonjour <?php
             if(isset($_SESSION["login"])) {
              echo $_SESSION["login"];
             }
             ?> </a></li>
            <li><a href="#modalParams" class="modal-trigger"><i class="material-icons left">build</i> Paramètres</a></li>
          </ul>   
        </div>
          
      </div>
    </nav>

    <div id="modalParams" class="modal">
      <div class="modal-content">
        <h4>Choisissez un Theme :</h4>
          <form action="index.php" method="post">
            <button type="submit" id="default" name="default" class="btn gray">default</button>
            <button type="submit" id="blue" name="blue" class="btn orange">submarine</button>
            <button type="submit" id="red" name="red" class="btn black">dark</button>
            <br/>
            <hr/>
            <button type="submit" id="logOut" name="logOut" class="btn red"><i class="material-icons left">power_settings_new</i> Déconnexion </button>
          </form>
      </div>
      <div class="modal-footer">
        <a class="modal-close waves-effect waves-green btn-flat">Fermer</a>
      </div>
    </div>
  
    <?php
    if (isset($_GET['sécurité']) || (isset($_GET['applis'])) || (isset($_GET['jeux'])) )
    {
      if (isset($_GET['sécurité']))
      {
        ?>
        <h4 class="center-align">Sécurité</h4>
        <?php
        $url = "https://www.01net.com/rss/actualites/securite/";
        
      }
      if (isset($_GET['applis']))
      {
        ?>
        <h4 class="center-align">Applis, Logiciels</h4>
        <?php
        $url = "https://www.01net.com/rss/actualites/applis-logiciels/";
        
      }
      if (isset($_GET['jeux']))
      {
        ?>
        <h4 class="center-align">Jeux</h4>
        <?php
        $url = "https://www.01net.com/rss/actualites/jeux/";
        
      }
      GetRssCard($url);
    }
    else
    {
    ?>    

  <section class="row">

    <article class="col s4">
      <h4>Sécurité</h4>
        <?php
        $url = "https://www.01net.com/rss/actualites/securite/"; /* insérer ici l'adresse du flux RSS de votre choix */
        GetRssCollection($url, "secu");
        ?>    
    </article>

    <article class="col s4">
        <h4>Applis, Logiciels</h4>
      <?php
        $url = "https://www.01net.com/rss/actualites/applis-logiciels/"; /* insérer ici l'adresse du flux RSS de votre choix */
        GetRssCollection($url, "app");
      ?> 
    </article>

    <article class="col s4">
        <h4>Jeux</h4>
      <?php
        $url = "https://www.01net.com/rss/actualites/jeux/"; /* insérer ici l'adresse du flux RSS de votre choix */
        GetRssCollection($url, "jeux");
      ?> 
    </article>

  </section>
      <?php } ?>

    <?php
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