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
    <style>
    @-webkit-keyframes textGradient
    {
      0% {
      background-position: 0 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0 50%;
      }
    }
    h1
    {
      font-size: 10em;        
    }
    body
    {
      background: top repeat url("strangerThings.jpg") ;
    }
    @keyframes masuperanimation {
      0% {
          transform: skewX(0deg);
      }
      25% {
          transform: skewY(-5deg);
      }
      50% {
          transform: skewX(5deg);
      }
      75% {
          transform: skewY(5deg);
      }
      100% {
          transform: skewX(-5deg);
      }
    }
    .gradientText
    {
      animation: textGradient 8s linear infinite;
      background-image: linear-gradient(45deg, black, maroon 40%, white 50%, maroon 60%, black);
      background-size: 300%;
      background-clip: text;
      color: transparent;
    }
    .deform
    {
      animation: masuperanimation 7s infinite alternate; /* On utilise "ma super animation" définie plus tôt */
    }

    </style>
    <title>Super RSS Reader</title>
  </head>

<body>
<!-- brown-text text-darken-4 -->
<div class="container center-align deform">
    <h1 class="gradientText"> 404 </h1>
    <h2 class="gradientText">- ERROR -</h2> 
    <h3 class="gradientText"> Keep cool and have a break...  <i class="material-icons medium ">local_cafe</i> </h3>
    <br/>
    <br/>
</div>
<div class="container center-align">
<a class="btn brown darken-4" href="http://www.rssfeed.info/index.php"> <i class="material-icons left">arrow_back</i> Retour </a>
</div>
<?php
//header("refresh:3;url=index.php");
?>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".modal").modal();     
        $("select").formSelect();
      });
  </script>
  </body>
</html>