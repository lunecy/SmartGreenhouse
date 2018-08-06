<?php
//connect to database
$hostname = 'localhost';
$username = 'test';
$password = '123'; 

$lrtemp="";
$hrtemp="";
$lrsoil="";
$hrsoil="";
$lrhumi="";
$hrhumi="";
$errors= array();

try{ 
	$dbh = new PDO("mysql:host=$hostname;dbname=measurements", 
		                       $username, $password);

	if(isset($_POST['insert']))
	{

	$lrtemp=$_POST['lrtemp'];
	$hrtemp=$_POST['hrtemp'];
	$lrsoil=$_POST['lrsoil'];
	$hrsoil=$_POST['hrsoil'];
	$lrhumi=$_POST['lrhumi'];
	$hrhumi=$_POST['hrhumi'];
	
	if(empty($lrtemp)){
		array_push($errors, "Lower Temperature Range is required");
	}	
	if(empty($hrtemp)){
		array_push($errors, "Higher Temperature Range is required");
	}
	if(empty($lrsoil)){
		array_push($errors, "Lower Soil Moisture Range is required");
	}	
	if(empty($hrsoil)){
		array_push($errors, "Higher Soil moisture Range is required");
	}
	if(empty($lrhumi)){
		array_push($errors, "Lower Humidity Range is required");
	}	
	if(empty($hrhumi)){
		array_push($errors, "Higher Humidity Range is required");
	}


	if(count($errors) == 0){

	$pdoQuery = "INSERT INTO `rangep`(`lrtemp`, `hrtemp`, `lrsoil`, `hrsoil`, `lrhumi`, `hrhumi`) VALUES (:lrtemp, :hrtemp, :lrsoil, :hrsoil, :lrhumi, :hrhumi)";

	$pdoResult = $dbh->prepare($pdoQuery);

	$pdoExec = $pdoResult->execute(array(":lrtemp"=>$lrtemp, ":hrtemp"=>$hrtemp, ":lrsoil"=>$lrsoil, ":hrsoil"=>$hrsoil, ":lrhumi"=>$lrhumi, ":hrhumi"=>$hrhumi));
		}
	
	}
	$sthp = $dbh->prepare("
       	SELECT lrtemp, hrtemp, lrhumi, hrhumi, lrsoil, hrsoil FROM rangep
       	WHERE id =(SELECT MAX(id) FROM rangep)");
    $sthp->execute();
    $resultp = $sthp->fetchAll(PDO::FETCH_ASSOC);

} 
	catch(PDOException $exc){
		echo $exc->getMessage();
		exit();
}

?>
