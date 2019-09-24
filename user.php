<h3 class="center-align">Connexion</h3>

<div class="container">
    <form class="container" method="post" action="index.php">
        <label for="login">Identifiant</label>
        <input type="text" id="login" name="login"/>
        <label for="password">Mot de Passe</label>
        <input type="password" id="password" name="password"/>
        <label for="theme">Sélectionnez un Theme</label>
        <select name="theme" id="theme" >
            <option value="default">Default</option>
            <option value="blue">Submarine</option>
            <option value="red">Dark</option>
        </select>
        <label for="choice">Nombre d'articles sur la page d'accueil</label>
        <select name="choice" id="choice" >
            <option value="3">3</option>
            <option value="5">5</option>
            <option value="8">8</option>
        </select>
        <input class="btn" type="submit" id="send" value="Envoyer"/>
    </form>
</div>
<br/>
