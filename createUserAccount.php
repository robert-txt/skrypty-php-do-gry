<?php
	$serverName = "localhost";
	$serverUserName = "";
	$serverUserPassword = "";
	$dbName = "robert_TheyShallNotPassDataBase";

	$userName=$_POST["userNamePost"];
	$userPassword=$_POST["userPasswordPost"];
	$userConfirmPassword=$_POST["userConfirmPasswordPost"];

	$conn = new mysqli($serverName, $serverUserName, $serverUserPassword, $dbName);

	if(!$conn) {
		die("Connection failed. ". mysqli_connect_error());
	}

	if(!$userName || !$userPassword) {
		echo "Empty name or password.";
	} else if ($userPassword!=$userConfirmPassword) {
		echo "Passwords not equal.";
	} else {
		$sql = "SELECT * FROM users WHERE Name = '".$userName."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			echo "Name already used";
		} else {
			$sql = "INSERT INTO 'users' WHERE Name = '".$userName."'";
			$sql = "INSERT INTO users(Name, Password)
				VALUES ('".$userName."', MD5('".$userPassword."'));";			
			$result = mysqli_query($conn, $sql);
			echo "Success";
		}
	}
	
?>