<?php
if( (isset($_SESSION['login']) && isset($_SESSION['password'])) 
&& ( ($_SESSION['login'] == "Admin") && ($_SESSION['password'] == "goliath") ) )
{
  ?>
  <div class="container" style="
  border:2px solid gray;
  border-radius:10px;
  padding:2em;
  padding-top:0em;
  background:#2b2b2b;
  color:lime;
  ">
    <h3 class="center-align">
    <i class="material-icons small">star_border</i>
    Super User 
    <i class="material-icons small">star_border</i>
    </h3>
    <h5><i class="material-icons">storage</i> Données enregistrées :</h5>
    <p>GET : <?=var_dump($_GET);?> </p>
    <p>POST : <?=var_dump($_POST);?> </p>
    <p>SESSION : <?=var_dump($_SESSION);?> </p>
    <p>COOKIES : <?=var_dump($_COOKIE);?> </p>
    <br/>
    <!-- Custom URL de flux RSS  -->
    <h5><i class="material-icons">border_color</i> URL Custom RSS :</h5>
    <form method="post" action="index.php" class="row">
      <p class="col s3" style="padding-top:10px;">https://www.01net.com/rss/</p>
      <div class="input-field col s6">
      <?php
      $customUrl = [
        'info/flux-rss/flux-toutes-les-actualites/',
        'tests/les-derniers-tests/rss-derniers-tests/',
        'actualite/',
        'diaporama/',
        'actualites/produits/',
        'actualites/technos/',
        'actualites/buzz-societe/',
        'actualites/culture-medias/',
        'actualites/politique-droits/',
        'actualites/science-recherche/',
        'smartphones/',
        'tablettes/',
        'pc-portables/',
        'pc-peripheriques/',
        'voiture-connectee/',
        'photo/',
        'tv-video/',
        'audio/',
        'objets-connectes/',
        'maison-connectee/',
        'jeux-video/',
        'actualite/top-10/'
      ];
      ?>
        <select name="customRss" id="customRss" class="form-control" onChange="submit()" >
          <option value="def" selected disabled>Sélectionnez un flux rss</option>
        <?php
        foreach($customUrl as $opt)
        {
          ?> <option value="<?=$opt?>"><?=$opt?></option> <?php
        }
        ?>
        </select>
      </div>
    </form>

    <!-- Vidéo bonus -->
    <form method="post" action="index.php" class="input-field">
      <button class="btn" type="submit" id="bonus" name="bonus">
      <i class="material-icons left">arrow_downward</i>Bonus </button>
    </form>
    <?php
    if(isset($_POST["bonus"]))
    {
    ?>
    <hr/>
    <a href="spaceinvaders.php" class="btn white">SpaceInvaders</a>
    <hr/>
    <div class="video-container">
    <iframe width="853" height="480" src="https://www.youtube.com/embed/NjxNnqTcHhg" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php } ?>
  </div>

<?php
}
?>