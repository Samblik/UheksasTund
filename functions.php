 <?php
	require_once("../konfig_global.php");
	require_once("User.class.php");
	
	$database = "if13_rene_p";
	
	//paneme sessiooni k2ima, saame kasutada $_session muutujaid
	session_start();
 
 
	//loome anbmebaasi ühenduse
	
	$mysqli = new mysqli($servername, $server_username, $server_password, $database);
	
	//uus instanst klassist User
	
	
	$User = new User($mysqli);
	
 
 
 
 
 
 
 
 
/* 
	require_once("../konfig_global.php");
	$database = "if13_rene_p";
	
	//paneme sessiooni k2ima, saame kasutada $_session muutujaid
	session_start();
	
	function createUser($create_email, $password_hash){
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
				
				//asendame ? muutujate v22rtustega
				
				//echo $mysqli->error;
				//echo $stmt->error;
				
				$stmt->bind_param("ss",$create_email, $password_hash);
				$stmt->execute();
				$stmt->close();
				
				$mysqli->close();
		
		
	} 
	
	//logi sisse
	
	function loginUser($email, $password_hash){
				$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
				$stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
				$stmt->bind_param("ss", $email, $password_hash); //asnendab küsimärgid
				
				//paneme vastused muutujatesse
				
				$stmt->bind_result($id_from_db, $email_from_db);
				$stmt->execute();
				echo "<br>";
				
				if($stmt->fetch()){
					
					echo "Kasutaja id=".$id_from_db;
					
					$_SESSION["id_from_db"] = $id_from_db;
					$_SESSION["user_email"] = $email_from_db;
					
					//suunan kasutaja
					
					header("Location: data.php");
					
				}
				else{
					//tühi, ei leidnud
					echo "Wrong password or email";
				}
				$stmt->close();
				$mysqli->close();
		
		
	}
	
		function addCarPlate($car_number, $car_color) {
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("INSERT INTO car_plates (user_id, number_plate, color) VALUES (?,?,?)");
		$stmt->bind_param("iss", $_SESSION["id_from_db"], $car_number, $car_color);
		
		$message = "";
		if($stmt->execute()){
			
		$message = "Eduklat edastatud anbmebaasi";	
		}else{
			echo $stmt->error;
			
		}
		
		$stmt->close();
		
		$mysqli->close();
		
		return $message;
	}
*/


	
 ?>