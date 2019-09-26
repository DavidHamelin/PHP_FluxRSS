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
        <p>GET : <?=print_r($_GET);?> </p>
        <p>DETAILS GET : <?=var_dump($_GET);?> </p>
        <p>POST : <?=print_r($_POST);?> </p>
        <p>DETAILS POST : <?=var_dump($_POST);?> </p>
        <p>SESSION : <?=print_r($_SESSION);?> </p>
        <p>DETAILS SESSION : <?=var_dump($_SESSION);?> </p>
        <p>COOKIES : <?=print_r($_COOKIE);?> </p>
        <p>DETAILS COOKIES : <?=var_dump($_COOKIE);?> </p>
        <br/>
        <h5><i class="material-icons">storage</i>URL Custom RSS :</h5>
        <!-- <nav> -->
          <!-- <div class="nav-wrapper"> -->
            <form method="post" action="index.php" class="row">
              <p class="col s3" style="padding-top:10px;">https://www.01net.com/rss/</p>
              <div class="input-field col s6">
                <input id="customRss" name="customRss" type="search" placeholder="actualites/buzz-societe/" <?php if(isset($_POST['customRss'])) { ?> value="<?= $_POST['customRss'] ?>" <?php } else { ?> value="actualites/buzz-societe/" <?php } ?> title="Saisissez une url de flux RSS">
                <!-- <label class="label-icon" for="customRss"><i class="material-icons">search</i></label> -->
                <!-- <i class="material-icons">close</i> -->
              </div>
            </form>
          <!-- </div> -->
        <!-- </nav> -->
        <br/>

        <form method="post" action="index.php">
        <button class="btn" type="submit" id="bonus" name="bonus">
        <i class="material-icons left">mood</i>Bonus </button>
        </form>
        <?php
        if(isset($_POST["bonus"]))
        {
        ?>
        <div class="video-container">
        <iframe width="853" height="480" src="https://www.youtube.com/embed/NjxNnqTcHhg" frameborder="0" allowfullscreen></iframe>
        </div>
        </div>
        <?php } ?>
        <br/>
      <?php
      }
      ?>