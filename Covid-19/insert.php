<?php


$conn = mysqli_connect("localhost", "", "", "id16879392_coviddb") or die("fail to connect to database");

if($_SERVER['REQUEST_METHOD']=='POST'){

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$date = $_POST['dateReg'];
$country = $_POST['country'];
$cell = $_POST['cell'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$jsonCovid = $_POST['jsonCovid'];

   
   $sql= mysqli_query($conn,"select * from my where  id='$id' ") or die("qry eror");
	$count=mysqli_num_rows($sql);
	if ($count >0) 
	
	{	

	
	echo "User Already Registered ! ";
    
	}
   else {
   $sql = "INSERT INTO my (id,name, age, dateReg, country, cell	, gender, status, jsonCovid)
VALUES ($id, '$name', '$age', '$date','$country','$cell', '$gender','$status', '$jsonCovid')";

$res = mysqli_query($conn,$sql) ;

if($res) {
		echo "Registered Succesfully";
	}
	else {
		echo "Error, Try Again";
	}
   }  
    
}
?>
