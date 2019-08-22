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
      <div class="nav-wrapper container">
        <ul id="navSujet" class="left hide-on-med-and-down">
          <li><a href="sass.html">Sécurité</a></li>
          <li><a href="badges.html">Applis, Logiciels</a></li>
          <li><a href="collapsible.html">Jeux</a></li>
        </ul>
        <ul id="navParams" class="right hide-on-med-and-down">
          <li><a href="sass.html">Nom Prénom</a></li>
          <li>
          <form action="index.php" method="post">
          <button type="submit" id="default" name="default" class="btn gray">default</button>
          <button type="submit" id="blue" name="blue" class="btn orange">halloween</button>
          <button type="submit" id="red" name="red" class="btn black">dark</button>
          </form>
          </li>
        </ul>
      </div>
    </nav>

  <section class="row container">

    <article class="col s4">
      <h3>Sécurité</h3>
        <?php
        $url = "https://www.01net.com/rss/actualites/securite/"; /* insérer ici l'adresse du flux RSS de votre choix */
        $rss = simplexml_load_file($url);
        echo '<ul class="colection">';
        foreach ($rss->channel->item as $item){
        $datetime = date_create($item->pubDate);
        $date = date_format($datetime, 'd M Y, H\hi');
        echo '<li class="collection-item"><a href="'.$item->link.'">'.'<img src="'.utf8_decode((string)$item->enclosure['url']).'" height="50"/> <span> '.utf8_encode(utf8_decode($item->title)).' </span> </a> ('.$date.')</li>';
        }
        echo '</ul>';
        ?>    
    </article>

    <article class="col s4">
        <h3>Applis, Logiciels</h3>
      <?php
        $url = "https://www.01net.com/rss/actualites/applis-logiciels/"; /* insérer ici l'adresse du flux RSS de votre choix */
        $rss = simplexml_load_file($url);
        echo '<ul class="colection">';
        foreach ($rss->channel->item as $item){
        $datetime = date_create($item->pubDate);
        $date = date_format($datetime, 'd M Y, H\hi');
        echo '<li class="collection-item"><a href="'.$item->link.'">'.'<img src="'.utf8_decode((string)$item->enclosure['url']).'" height="50"/> <span> '.utf8_encode(utf8_decode($item->title)).' </span> </a> ('.$date.')</li>';
        }
        echo '</ul>';
      ?> 
    </article>

    <article class="col s4">
        <h3>Jeux</h3>
      <?php
        $url = "https://www.01net.com/rss/actualites/jeux/"; /* insérer ici l'adresse du flux RSS de votre choix */
        $rss = simplexml_load_file($url);
        echo '<ul class="colection">';
        foreach ($rss->channel->item as $item){
        $datetime = date_create($item->pubDate);
        $date = date_format($datetime, 'd M Y, H\hi');
        echo '<li class="collection-item"><a href="'.$item->link.'">'.'<img src="'.utf8_decode((string)$item->enclosure['url']).'" height="50"/> <span> '.utf8_encode(utf8_decode($item->title)).' </span> </a> ('.$date.')</li>';
        }
        echo '</ul>';
      ?> 
    </article>

  </section>


    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.dropdown-trigger');
      var instances = M.Dropdown.init(elems, options);
      });
  </script>
  </body>
</html>