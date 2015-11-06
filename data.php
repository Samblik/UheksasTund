<?php

		require_once("functions.php");
		
		
		$car_number_error = "";
		$car_color_error = "";
		
		$car_number = "";
		$car_color = "";
		
		
		
		
	
	//Kontrollin kas kasutaja on sisse loginud
	if(!isset($_SESSION["id_from_db"])){
		header("Location: login_sample.php");
		
		
		
	}
	//aadressireal on ?logout=?
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: login_sample.php");
		
	}
	
	
if(isset($_POST["add_car"])){
		
		//echo $_SESSION["logged_in_user_id"];
		
		// valideerite väljad
		if ( empty($_POST["car_number"]) ) {
			$car_number_error = "See väli on kohustuslik";
		}else{
			$car_number = cleanInput($_POST["car_number"]);
		}
		
		if ( empty($_POST["car_color"]) ) {
			$car_color_error = "See väli on kohustuslik";
		}else{
			$car_color = cleanInput($_POST["car_color"]);
		}
		
		// mõlemad on kohustuslikud
		if($car_color_error == "" && $car_number_error == ""){
			//salvestate ab'i fn kaudu addCarPlate
		$msg = addCarPlate($car_number, $car_color);
			
			if($msg != ""){
				//salvestamine õnnestus
				
				$car_number = "";
				$car_color = "";
				
				echo $msg;
				
			}
		}
		
	}
	
	
	
	
	  function cleanInput($data) {
  	$data = trim($data); //tabulaator, tühikud, Enter
  	$data = stripslashes($data); //Kaldkriipsud
  	$data = htmlspecialchars($data); // 
  	return $data;
  }
	

?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>

<p>
	Tere, <?=$_SESSION["user_email"]; ?>
	<a href="?logout=1">Logi väljalja</a>
</p>

  <h2>Lisa auto</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
  	<input name="car_number" type="text" placeholder="Auto number" value="<?php echo $car_number; ?>"> <?php echo $car_number_error; ?><br><br>
  	<input name="car_color" type="text" placeholder="Auto värv" value="<?php echo $car_color; ?>"> <?php echo $car_color_error; ?><br><br>
  	<input type="submit" name="add_car" value="Lisa">
  </form>
<body>
<html>