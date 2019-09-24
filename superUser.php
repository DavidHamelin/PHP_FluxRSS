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
        <p>POST : <?=print_r($_POST);?> </p>
        <p>DETAILS POST : <?=var_dump($_POST);?> </p>
        <p>SESSION : <?=print_r($_SESSION);?> </p>
        <p>DETAILS SESSION : <?=var_dump($_SESSION);?> </p>
        <p>COOKIES : <?=print_r($_COOKIE);?> </p>
        <p>DETAILS COOKIES : <?=var_dump($_COOKIE);?> </p>
        </div>
        <br/>
      <?php
      }
      ?>