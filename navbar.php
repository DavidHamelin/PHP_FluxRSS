<nav>
      <div class="nav-wrapper">
        <ul id="navSubjects">
          <li><a href="?sécurité">Sécurité<i class="material-icons left">lock</i></a></li>
          <li><a href="?applis">Applis, Logiciels<i class="material-icons left">android</i></a></li>
          <li><a href="?jeux">Jeux<i class="material-icons left">games</i></a></li>
        </ul> 

        <div class="right hide-on-med-and-down">
          <ul id="navParams">
            <li><i class="material-icons left">perm_identity</i> Bonjour <?php
             if(isset($_SESSION["login"])) {
              echo htmlspecialchars($_SESSION["login"]);
             }
             ?>
             </li>
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