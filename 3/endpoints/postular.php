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
$password = "godzuki";
$dbname = "ecpm";
 

$link = mysql_connect($servername, $username, $password)
    or die('No se pudo conectar: ' . mysql_error());
//echo '(Conexión exitosa)';
mysql_select_db($dbname) or die('No se pudo seleccionar la base de datos'); 
mysql_set_charset("utf8"); 


////// REVISAR SI EL RUT YA EXISTE
 
$checkrut=("select * from aplicant where rut =  '".$rut."' ");
$result1= mysql_query( $checkrut)
      or die(mysql_error());
 
if($result1 === FALSE) {
echo mysql_errno($link);
  //  die(mysql_error()) ;    
}else{
	  $guardar = mysql_num_rows ($result1);
   
   // echo   "Postulación recibida.";   
}

//////////////////AHORA SI GUARDAR
if ($guardar==0){
	$query=("insert into aplicant(name, last_name, email, phone, rut, project_name, experience, motivations, music_work_url) 
				values('".$name."', '".$last_name."', '".$email."','".$phone."','".$rut."','".$project."','".$experience."', '".$motivations."', '".$music_work_url."' ) ");    

	$result= mysql_query( $query)
	      or die(mysql_error());
	 
	if($result === FALSE) {
	echo mysql_errno($link);
	  //  die(mysql_error()) ;    
	}else{
	       
	    echo   "Postulación recibida.";   
	}

 }else echo "El rut ya está registrado.";

 mysql_close($link);
?>


