<?php
	$serverName = "localhost";
	$serverUserName = "";
	$serverUserPassword = "";
	$dbName = "robert_TheyShallNotPassDataBase";

	$userName=$_POST["userNamePost"];
	$userPassword=$_POST["userPasswordPost"];

	$conn = new mysqli($serverName, $serverUserName, $serverUserPassword, $dbName);

	if(!$conn) {
		die("Connection failed. ". mysqli_connect_error());
	}

	if(!$userName || !$userPassword) {
		echo " Login or password cannot be empty";
	} else {

		$sql = "SELECT Password FROM users WHERE Name = '"$userName"'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$userPasswordMD5 = MD5($userPassword);
				if($userPasswordMD5==$row['Password']) {
					echo "Success";
				} else {
					echo "Login failed. Invalid user name or password.";
				}
			}
		} else {
			echo "Login failed. User not found";
		}
	}
?>