<?php

 # id, name, last_name, email, phone, rut, project_name, experience, motivations, music_work_url
 

$name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$rut = $_POST['rut'];
$project = $_POST['project_name'];
$experience = $_POST['experience'];
$motivations = $_POST['motivations'];
$music_work_url = $_POST['music_link'];
 
$servername = "localhost";
$username = "root";
$password = "eb436ec1de19aef9d339deffa9aa2013804a7e225a7ccc21";
$dbname = "ecpm";
 

$mysqli = new mysqli($servername,$username,$password,$dbname);
mysqli_set_charset($mysqli,"utf8");
 
////// REVISAR SI EL RUT YA EXISTE
$checkrut=("select * from aplicant where rut =  '".$rut."' ");
 if($result1 = $mysqli->query($checkrut)){ 
  		 $guardar = mysql_num_rows ($result1); 
 }

//////////////////AHORA SI GUARDAR
if ($guardar==0){
	$query=("insert into aplicant(name, last_name, email, phone, rut, project_name, experience, motivations, music_work_url) 
				values('".$name."', '".$last_name."', '".$email."','".$phone."','".$rut."','".$project."','".$experience."', '".$motivations."', '".$music_work_url."' ) ");    

	 if($result = $mysqli->query($query)){ 
  		  echo   "Postulación recibida."; 
	 }else echo $mysqli->errno;

	 
	 
	       
	    echo   "Postulación recibida.";   
	}

 }else echo "El rut ya está registrado.";

 mysql_close($link);
?>

