<?php

$conn = mysqli_connect("localhost", "", "", "id16879392_coviddb") or die("fail to connect to database");



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



	

	echo "<script> alert(' User already Registered ! ');</script>";

    

	}

	else  {

	    if (!empty($id) && !empty($name) && !empty($age)  && !empty($date)  && !empty($country)  && !empty($cell)  && !empty($gender)  && !empty($status) ) {

	        $JsonArray = array($id, $name, $age, $date, $country, $cell, $gender, $status);
	        $myJson =  json_encode($JsonArray);
	        
	        



mysqli_query($conn, "insert into my values ('$id','$name','$age','$date','$country','$cell' ,'$gender', '$status','$myJson')") or die("fail to insert");

header("Location: index.php");

	        

	    }

	    else {

	        	

	echo "<script> alert(' Please fill all empty fields! ');</script>";

	        

	    }

	    

	}

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



    <title>Register for Covid-19 Vaccine </title>

  </head>

  <body>





   

    

    <div class="container">

        <br> 

            <h2 class="text-center bg-light p-2" style="border-radius: 20px;"> Registered Users for Covid-19 Vaccine </h2>

        

        <br>

        <div class="row bg-light p-2 shadow border">

            

            <div class="col-md-4 border-right">

                 

                <h3 class="text-center"> Register for the Vaccine </h3>

                

                <form method="POST" action="index.php">

                    

                    <input type="number" class="form-control" placeholder="Enter your ID" name="txtID"/>

                      <input type="text" class="form-control" placeholder="Name" name="txtName"/>

                                <input type="number" min="18"class="form-control" placeholder="Age" name="txtAge"/>

                                  <input type="date" class="form-control" placeholder="Appointment date"  name="txtDate"/>

                          <input type="text" class="form-control" placeholder="State" name="txtCountry"/>

                          <input type="text" class="form-control" placeholder="Phone Number" name="txtCell"/>

          <select class="form-control" placeholder="Gender" name="gender">

              <option>Gender</option>
                            <option>Male</option>
                            <option>Female</option>

          </select>

                <select class="form-control" placeholder="Symptoms" name="status">

              <option>Symptoms</option>
                            <option>Yes</option>
                            <option>No</option>

          </select>

                    

                    <input type="submit" class="btn btn-success form-control" value="Register" name="btnSubmit" /> 

                </form>

                

            </div>

            

                

            <div class="col-md-8">

                       <h3 class="text-center"> Registered Users </h3>

    

    <table class="table table-responsive table-hover bg-light"> 

    

    <tr> 

    <td> ID</td>

      <td> Name</td>

        <td> Age</td>

        <td>App. Date</td>

                <td>State</td>

                  <td>Phone Number</td>

                    <td>Gender</td>

                      <td>Symptoms</td>
                 


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
           
           

    </tr>

    

    <?php }?>

    </table>

                

            </div>

            

        </div>

        

    </div>

    

    

  </body>

</html>