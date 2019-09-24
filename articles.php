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