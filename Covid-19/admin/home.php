<?php

session_start();



$conn = mysqli_connect("localhost", "", "", "id16879392_coviddb") or die("fail to connect to database");







if (!isset($_SESSION['user'])) {

header('Location: index.php');

}





?>







<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



    <title></title>

  </head>

  <body>





<nav class="navbar navbar-expand-lg navbar-light bg-light">



  <a class="navbar-brand" href="home.php"></a> <span style="font-weight: bold ; font-size:1.5em;  background: ;" > Registro para Vacunas Covid-19 </span></a>



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">



    <span class="navbar-toggler-icon"></span>



  </button>







  <div class="collapse navbar-collapse" id="navbarSupportedContent">



  



   <ul class="navbar-nav ml-auto"   >



      <li class="nav-item active">



        <a class="nav-link" href="home.php">Home </a>



      </li>



      <li class="nav-item">



        <a class="nav-link" href="users.php">Administrar Usuario </a>



      </li>



	 



	   <li class="nav-item">



     



		    <a class=" btn btn-danger text-white" href="logout.php">  Cerrar Sesión </a>



      </li>







    </ul> </div>



    



  



</nav>

<div class="jumbotron" id="">

<h1 STYLE="COLOR: green; font-weight: bolder;  border-radius: 10px;" class="text-center bg-light p-4"> Bienvenido <span style="color:red;"> Panel de Administrador </span></h1>





</div>





<footer class="jumbotron" id="foot" style="padding: 20px; text-align: center; font-weight: bold;  font-size: 1.2em;" > 



<p style="line-height:3px;"> Portal de Registro Covid-19 </p>





</footer>



    

  </body>





</html>