<?php

session_start();









if (isset($_POST) && !empty($_POST)) 

{

	$username = $_POST['username'];

$password =$_POST['password'];

	



	

	

if ($username== '' && $password=='') {

		



	$_SESSION['user']=$username;

	

	

	

	header("Location: home.php");

}

 else {

	

	header("Location: index.php");

}





} 



?>



<!DOCTYPE html>

<html>

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



<body >



    <div class="container">

<BR> <BR>



        <div class="jumbotron"  >

		

		    <h2 class="text-center"> Portal de Administrador </h2>

	

		<form name="form" action="index.php" method="POST">







<input type="text" class="form-control" placeholder="Usurio" name="username"/> 





<input type="password" class="form-control" placeholder="Contraseña" name="password" />





  <button type="submit" class="btn btn-warning form-control" name="submit1" style="margin-top:10px; "> Login </button>



  </center> 

 



</form>

		

     </div>

   </div>



</body>



</html>