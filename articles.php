<?php
    if (isset($_GET['sécurité']) || (isset($_GET['applis'])) || (isset($_GET['jeux'])) || (isset($_POST['customRss'])) )
    {
      // if(isset($_POST['customRss']) && (preg_match("#(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})#", $_POST['customRss'])))
      if(isset($_POST['customRss']))
      {
        // $test = $_POST['customRss'];
        // if(startsWith($test, "https://www.01net.com/rss/"))
        //   {
        //     $url = $test;
        //   }
        $url = 'https://www.01net.com/rss/'.$_POST['customRss'];
      }
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