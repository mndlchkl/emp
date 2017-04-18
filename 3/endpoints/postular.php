<?php
$name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$rut = $_POST['rut'];
$project = $_POST['project_name'];
$experience = $_POST['experience'];
$motivations = $_POST['motivations'];
$music_work_url = isset($_POST['music_link'])? $_POST['music_link']:"";
$music_work_url2 = isset($_POST['music_link2'])? $_POST['music_link2']:"";
$music_work_url3 = isset($_POST['music_link3'])?$_POST['music_link3']:""   ;
 
$servername = "localhost";
$username = "root";
$password = "godzuki";
$dbname = "ecpm";
 
$mysqli = new mysqli($servername,$username,$password,$dbname);
mysqli_set_charset($mysqli,"utf8");

////// REVISAR SI EL RUT YA EXISTE
$checkrut=("select * from aplicant where rut =  '".$rut."' ");
 if($result1 = $mysqli->query($checkrut)){ 
  		 $guardar =  $row_cnt = $result1->num_rows;// mysql_num_rows($result1); 
 }
//////////////////AHORA SI GUARDAR
if ($guardar==0){
	$query=("insert into aplicant(name, last_name, email, phone, rut, project_name, experience, motivations, music_work_url,music_work_url2,music_work_url3) 
				values('".$name."', '".$last_name."', '".$email."','".$phone."','".$rut."','".$project."','".$experience."', '".$motivations."', '".$music_work_url."' , '".$music_work_url2."' , '".$music_work_url3."') ");    

	 if($result = $mysqli->query($query)){ 
  		  echo   "Postulación recibida. pronto tendrás noticias sobre los resultados"; 
	 }else echo $mysqli->errno;
 }else echo "El rut ya está registrado. (Alguien registro un proyecto usando este rut.)";
 mysqli_close($mysqli);
?>


