<?php
function GetRssCollection($url, $titre)
{
  $rss = simplexml_load_file($url);
  echo '<ul class="collection">';
  $modalID = 1;
  foreach ($rss->channel->item as $item){
  /* date en français */ 
  setlocale(LC_TIME, 'fr_FR.utf8');
  $datetime = date_create($item->pubDate);  
  $dateT = date_format($datetime, 'd-M-Y H:i');
  $date = strftime('%A %d %B %G, %Hh%M', strtotime($dateT));

  echo '
  <li class="collection-item avatar"> 
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
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fermer</a>
      </div>
  </div>';
  $modalID++;
  }
  echo '</ul>';
}

function GetRssCard($url)
{
$rss = simplexml_load_file($url);
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
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fermer</a>
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
?>