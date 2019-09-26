<?php
///////////////// TRAITEMENT DONNEES /////////////////

if( isset($_POST['red']) || (isset($_POST['theme']) && ($_POST['theme'] == "red")) )
{
  $_SESSION['color'] = "red";
}
if( isset($_POST['blue']) || (isset($_POST['theme']) && ($_POST['theme'] == "blue")) )
{
  $_SESSION['color'] = "blue";
}
if( isset($_POST['default']) || (isset($_POST['theme']) && ($_POST['theme'] == "default")) )
{
  $_SESSION['color'] = "default";
}

if ( isset($_POST['login']) && isset($_POST['password']) )
{
  if( ($_POST['login'] == "") ||
  ($_POST['password'] == "") ||
  ($_POST['login'] == " ") ||
  ($_POST['password'] == " ") ||
  ($_POST['login'] == null) ||
  ($_POST['password'] == null) )
  {
    header("Location: http://www.rssfeed.info/error.php");
    // exit();
  }
  else
  {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
  }

}

if(isset($_POST['choice']))
{
  $_SESSION['choice'] = $_POST['choice'];
}

//////////////////// FONCTIONS //////////////////////

function CheckCSSLink()
{
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
}

function GetRssCollection($url, $titre)
{
  $rss = simplexml_load_file($url);
  echo '<ul class="collection">';
  $modalID = 1;
  $count = 0;
  $limit = $_SESSION['choice'];
  if(!isset($_SESSION['choice']) || ($_SESSION['choice'] == 0) )
  {
    $limit = 8;
  }
  foreach ($rss->channel->item as $item){
  /* date en français */ 
  setlocale(LC_TIME, 'fr_FR.utf8');
  $datetime = date_create($item->pubDate);  
  $dateT = date_format($datetime, 'd-M-Y H:i');
  $date = strftime('%A %d %B %G, %Hh%M', strtotime($dateT));

  echo '
  <li class="collection-item"> 
    <img src="'.utf8_decode((string)$item->enclosure['url']).'" height="50" class="left"/> 
    <span class="title"> '.utf8_encode(utf8_decode($item->title)).' </span> 
    <p>('.$date.') </p> 
    <a href="'.$item->link.'"> Aller vers l\'article </a> <br/>
    <a href="#'.$titre.$modalID.'" class="modal-trigger">Ouvrir Description de l\'article </a>
  </li>

  <div id="'.$titre.$modalID.'" class="modal">
      <div class="modal-content">
        <h4>'.utf8_encode(utf8_decode($item->title)).'</h4>
        <p>'.utf8_encode(utf8_decode($item->description)).'</p>
      </div>
      <div class="modal-footer">
        <a href="'.$item->link.'"> Aller vers l\'article </a> 
        <a class="modal-close waves-effect waves-green btn-flat">Fermer</a>
      </div>
  </div>';
  $modalID++;
  $count++;
    if($count == $limit)
    {
      break;
    }
  }
  echo '</ul>';
}

function GetRssCard($url)
{
$rss = simplexml_load_file($url);
    echo '<h4 class="center-align">'.$rss->channel->title.'</h4>';
    echo '<div class="row">';
    $test = 1;
    foreach ($rss->channel->item as $item){
    setlocale(LC_TIME, 'fr_FR.utf8');
    $datetime = date_create($item->pubDate);  
    $dateT = date_format($datetime, 'd-M-Y H:i');
    $date = strftime('%A %d %B %G, %Hh%M', strtotime($dateT));

    echo '
    <div class="col s4 m4">
      <div class="card small">

        <div class="card-image">
          <img src="'.utf8_decode((string)$item->enclosure['url']).'">
          <span class="card-title">'.utf8_encode(utf8_decode($item->title)).'</span>
        </div>

        <div class="card-content">
          <p>('.$date.') </p> 
          <a href="#modal'.$test.'" class="modal-trigger">Ouvrir Description de l\'article </a>
        </div>

            <div class="card-action">
              <a href="'.$item->link.'"> Aller vers l\'article </a>

              <div id="modal'.$test.'" class="modal">
                <div class="modal-content">
                  <h4>'.utf8_encode(utf8_decode($item->title)).'</h4>
                  <p>'.utf8_encode(utf8_decode($item->description)).'</p>
                </div>
                <div class="modal-footer">
                  <a href="'.$item->link.'"> Aller vers l\'article </a> 
                  <a class="modal-close waves-effect waves-green btn-flat">Fermer</a>
                </div>
              </div>
            </div>

      </div>
    </div>
      ';
      $test++;
    }
  echo '</div>';
}

/////////////// DECONNEXION ////////////////

if(isset($_POST['logOut']))
{
  unset($_SESSION['login']);
  unset($_SESSION['password']);
  unset($_SESSION['color']);
  unset($_SESSION['choice']);
  // Refresh puis redirect
  // header("Refresh:0; url=page2.php");
  header("Refresh:0");
}
?>