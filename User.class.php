<?php 
class User {
	
	
	private $connection;

	//funktioon, mis käivitub siis, kui on ! NEW User();
	function __construct($mysqli){
	//selle klassi muutuja	
	$this->connection = $mysqli;
		
		
		
		
	}
	
	function createUser($create_email, $password_hash){
		
		//kas selline email on juba olemas
		$response = new StdClass();
		
		$stmt = $this->connection->prepare("SELECT email FROM user_sample WHERE email = ?");
		$stmt->bind_param("s",$create_email);
		$stmt->execute();
		
		if($stmt->fetch()){
			
			//Saadan tagasi errori
			$error = new StdClass();
			$error->id = 0;
			$error->message = "Sellinse e-mailiga kasutaja juba olemas!";
			
			//panen errori responsile külge
			$response->error = $error;
			
			
			return $response;
			
		}
		
		//******************
		//***OLULINE********
		//******************
		
		//panen eelimse k2su kinni
		$stmt->close();
		
		$stmt = $this->connection->prepare("INSERT INTO user_sample (email, password) VALUE (?, ?)");
				
				//asendame ? muutujate v22rtustega
				
				//echo $mysqli->error;
				//echo $stmt->error;
				
				$stmt->bind_param("ss",$create_email, $password_hash);
				
				
				if($stmt->execute()){
					//edukalt salvestatud
					$success = new StdClass();
					$success->message = "kasutaja Edukalt loodud";
					
					$response->success = $success;
				}else{
					//midagi l2ks katki
					$error = new StdClass();
					$error->id = 1;
					$error->message = "Midagi l2ks Katki!";
					
					$response->error = $error;
			
					
					
				}
				
				$stmt->close();
				
				//saadan tagasi vastuse, kas Sucess või Error
				return $response;
				
				
		
		
	}
	
	
	
		function loginUser($email, $password_hash){
				$stmt = $this->connection->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
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
				
		
		
	}
	
	
	



	
} ?>