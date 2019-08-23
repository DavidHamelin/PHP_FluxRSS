<?php 
/* TODO

récupérer choix css sheet via cookie

this : descriptions rss differentes
*/


function GetRss($url)
{
  $rss = simplexml_load_file($url);
  echo '<ul class="collection">';
  foreach ($rss->channel->item as $item){
  /* date en français */ 
  setlocale(LC_TIME, 'fr_FR.utf8');
  $datetime = date_create($item->pubDate);  
  $dateT = date_format($datetime, 'd-M-Y H:i');
  $date = strftime('%A %d %B %G, %Hh%M', strtotime($dateT));

  /* IDEE MODAL UNIQUE : id=" item[1]  href="# channel[item]"  ???? */
    
  echo '<li class="collection-item avatar"> 
  <img src="'.utf8_decode((string)$item->enclosure['url']).'" height="50" class="left"/> 
  <span class="title"> '.utf8_encode(utf8_decode($item->title)).' </span> 
  <p>('.$date.') </p> 
  <a href="'.$item->link.'"> Aller vers l\'article </a> <br/>
  <a href="#modalDescription" class="modal-trigger">Ouvrir Description de l\'article </a> </li>
  <div id="modalDescription" class="modal">
      <div class="modal-content">
        <h4>'.utf8_encode(utf8_decode($item->title)).'</h4>
        <p>'.utf8_encode(utf8_decode($item->description)).'</p>
      </div>
      <div class="modal-footer">
        <a href="'.$item->link.'"> Aller vers l\'article </a> 
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fermer</a>
      </div>
  </div> ';
  }
  echo '</ul>';
}
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
      if (isset($_POST['red']))
      {
        ?> <link rel="stylesheet" href="style03.css"> <?php
      }
      elseif (isset($_POST['blue']))
      {
        ?> <link rel="stylesheet" href="style02.css"> <?php
      }
      else
      {
        ?> <link rel="stylesheet" href="style01.css"> <?php
      }
      
    ?>
    <title>Super RSS Reader</title>
  </head>

  <body>

    <header>
      <h1 class="center-align">Super RSS Reader</h1>
    </header>

    <nav>
      <div class="nav-wrapper">
          <ul id="navSubjects">
            <li><a href="?sécurité">Sécurité<i class="material-icons left">lock</i></a></li>
            <li><a href="?applis">Applis, Logiciels<i class="material-icons left">android</i></a></li>
            <li><a href="?jeux">Jeux<i class="material-icons left">games</i></a></li>
          </ul> 
        <div class="right hide-on-med-and-down">
          <ul id="navParams">
            <li> <a><i class="material-icons left">perm_identity</i> Nom Prénom </a></li>
            <li><a href="#modal1" class="modal-trigger"><i class="material-icons left">build</i> Paramètres</a></li>
          </ul>   
        </div>
          
      </div>
    </nav>

    <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Choisissez un Theme</h4>
      <form action="index.php" method="post">
        <button type="submit" id="default" name="default" class="btn gray">default</button>
        <button type="submit" id="blue" name="blue" class="btn orange">submarine</button>
        <button type="submit" id="red" name="red" class="btn black">dark</button>
    </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fermer</a>
    </div>
  </div>
  
  <?php
  if (isset($_GET['sécurité']) || (isset($_GET['applis'])) || (isset($_GET['jeux'])) )
  {
        if (isset($_GET['sécurité']))
        {
        $url = "https://www.01net.com/rss/actualites/securite/";
        }
        if (isset($_GET['applis']))
        {
        $url = "https://www.01net.com/rss/actualites/applis-logiciels/";
        }
        if (isset($_GET['jeux']))
        {
        $url = "https://www.01net.com/rss/actualites/jeux/";
        }
        $rss = simplexml_load_file($url);
        echo '<div class="row">';
        foreach ($rss->channel->item as $item){
        setlocale(LC_TIME, 'fr_FR.utf8');
        $datetime = date_create($item->pubDate);  
        $dateT = date_format($datetime, 'd-M-Y H:i');
        $date = strftime('%A %d %B %G, %Hh%M', strtotime($dateT));
        echo '<div class="col s4 m4">
        <div class="card small">
        <div class="card-image">
        <img src="'.utf8_decode((string)$item->enclosure['url']).'">
            <span class="card-title">'.utf8_encode(utf8_decode($item->title)).'</span>
            </div>
              <div class="card-content">
                <p>('.$date.') </p> 
                <a href="#modalSécu" class="modal-trigger">Ouvrir Description de l\'article </a>
              </div>
              <div class="card-action">
              <a href="'.$item->link.'"> Aller vers l\'article </a>
              
              </div>
            </div>
          </div>
          ';
        }
      echo '</div>';
        }
        else
        {
        ?>    

  <section class="row">

    <article class="col s4">
      <h4>Sécurité</h4>
        <?php
        $url = "https://www.01net.com/rss/actualites/securite/"; /* insérer ici l'adresse du flux RSS de votre choix */
        GetRss($url);
        ?>    
    </article>

    <article class="col s4">
        <h4>Applis, Logiciels</h4>
      <?php
        $url = "https://www.01net.com/rss/actualites/applis-logiciels/"; /* insérer ici l'adresse du flux RSS de votre choix */
        GetRss($url);
      ?> 
    </article>

    <article class="col s4">
        <h4>Jeux</h4>
      <?php
        $url = "https://www.01net.com/rss/actualites/jeux/"; /* insérer ici l'adresse du flux RSS de votre choix */
        GetRss($url);
      ?> 
    </article>

  </section>
        <?php } ?>

  <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.modal').modal();
        
        $('select').formSelect();
      });
  </script>
  </body>
</html>