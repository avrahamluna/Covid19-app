<?php

session_start();

$conn = mysqli_connect("localhost", "", "", "id16879392_coviddb") or die("fail to connect to database");

if (!isset($_SESSION['user'])) {

header('Location: index.php');

}

if (isset($_POST['btnSubmit'])) {
    
   $id = htmlspecialchars($_POST['txtID']);

     $name = htmlspecialchars($_POST['txtName']);

      $age = htmlspecialchars($_POST['txtAge']);

      $date = htmlspecialchars($_POST['txtDate']);

         $country = htmlspecialchars($_POST['txtCountry']);

                 $cell = htmlspecialchars($_POST['txtCell']);

                         $gender = htmlspecialchars($_POST['gender']);

                           $status = htmlspecialchars($_POST['status']);
                       

                  //         echo $id . $name . $age . $date . $country . $cell . $gender . $status;
    

$sql= mysqli_query($conn,"select * from my where  id='$id' ") or die("qry eror");

	$count=mysqli_num_rows($sql);

	if ($count >0) 

	

	{	



	

	echo "<script> alert(' Usuario ya Registrado ! ');</script>";

    

	}

	else  {

	    if (!empty($id) && !empty($name) && !empty($age)  && !empty($date)  && !empty($country)  && !empty($cell)  && !empty($gender)  && !empty($status) ) {

	
	
	        $JsonArray = array($id, $name, $age, $date, $country, $cell, $gender, $status);
	        $myJson =  json_encode($JsonArray);
	        
	                
mysqli_query($conn, "insert into my values ('$id','$name','$age','$date','$country','$cell' ,'$gender','$status', '$myJson')") or die("Error intenta de nuevo");

header ("Location: users.php");



	        

	    }

	    else {

	        	

	echo "<script> alert(' Llena todo los campos! ');</script>";

	        

	    }

	    

	}

}

else if (isset($_GET['del'])){

  //  echo $_GET['del'];

  

$queryFire= mysqli_query($conn,"delete from my where id='$_GET[del]'") or die('fail to delete');

header ("Location: users.php");

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



  <a class="navbar-brand" href="home.php"></a> <span style="font-weight: bold ; font-size:1.5em;  background: ;" > Portal de Registro Covid-19 </span></a>



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">



    <span class="navbar-toggler-icon"></span>



  </button>







  <div class="collapse navbar-collapse" id="navbarSupportedContent">



  



   <ul class="navbar-nav ml-auto"   >



      <li class="nav-item active">



        <a class="nav-link" href="home.php">Home </a>



      </li>



      <li class="nav-item">



        <a class="nav-link" href="users.php">Administrar Usuarios </a>



      </li>



	 



	   <li class="nav-item">



     



		    <a class=" btn btn-danger text-white" href="logout.php">  Cerrar Sesión </a>



      </li>







    </ul> </div>



    



  



</nav>





  

    <div class="container">

        <br> 

            <h2 class="text-center bg-light p-2" style="border-radius: 20px;"> Usuarios Registrados para Vacuna Covid-19 </h2>

        

        <br>

        <div class="row bg-light p-2 shadow border">

            

            <div class="col-md-4 border-right">

                 

                <h3 class="text-center"> Registrate para tú Vacuna </h3>

                

                <form method="POST" action="users.php">

                    

                    <input type="number" class="form-control" placeholder="Ingresa tu ID" name="txtID"/>

                      <input type="text" class="form-control" placeholder="Nombre Completo" name="txtName"/>

                                <input type="number" min="18"class="form-control" placeholder="Edad" name="txtAge"/>

                                  <input type="date" class="form-control"  name="txtDate"/>

                          <input type="text" class="form-control" placeholder="Estado" name="txtCountry"/>

                          <input type="text" class="form-control" placeholder="Teléfono" name="txtCell"/>

          <select class="form-control" name="gender">

              <option>Genero</option>
                            <option>Femenimo</option>
                            <option>Masculino</option>

          </select>

                <select class="form-control" name="status">

              <option>Síntomas</option>
                            <option>Si</option>
                            <option>No</option>

          </select>

                    

                    <input type="submit" class="btn btn-success form-control" value="Add" name="btnSubmit" /> 

                </form>

                

            </div>

            

                

            <div class="col-md-8">

                       <h3 class="text-center"> Usuarios Registrados </h3>

    

    <table class="table table-responsive table-hover bg-light"> 

    

    <tr> 

    <td> ID</td>

      <td> Nombre</td>

        <td> Edad</td>

        <td> Fecha-Nac</td>

                <td>Estado</td>

                  <td>Teléfono</td>

                    <td>Género</td>

                      <td>Sintomas</td>
                      
                         <td>JsonCovid</td>

                            <td>Acción</td>



    </tr>

    

    <?php

    

		$res = mysqli_query($conn, "select *from my");



	while ($row=mysqli_fetch_array($res)) {



	







	



	



		?>



		



		<tr>

		    <td> <?php echo $row["id"] ?> </td>

 <td> <?php echo $row["name"] ?> </td>

  <td> <?php echo $row["age"] ?> </td>

   <td> <?php echo $row["dateReg"] ?> </td>

     <td> <?php echo $row["country"] ?> </td>

       <td> <?php echo $row["cell"] ?> </td>

         <td> <?php echo $row["gender"] ?> </td>

           <td> <?php echo $row["status"] ?> </td>
           
    <td> <?php echo $row["jsonCovid"] ?> </td>
    

 <td>    <a href="users.php?del=<?php echo $row['id']?>"class="btn btn-danger btn- " onclick="return confirm('Confirmar Eliminar ? <?php echo  $name;?> ')"> Eliminar  </a>  </td>

    </tr>

    

    <?php }?>

    </table>

                

            </div>

            

        </div>

        

    </div>



<footer class="jumbotron" id="foot" style="padding: 20px; text-align: center; font-weight: bold;  font-size: 1.2em;" > 



<p style="line-height:3px;"> Pre-Registro Covid-19 </p>





</footer>



    

  </body>





</html>
