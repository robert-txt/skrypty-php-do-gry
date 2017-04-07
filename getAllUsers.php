<?php
	$serverName = "localhost";
	$serverUserName = "";
	$serverUserPassword = "";
	$dbName = "robert_TheyShallNotPassDataBase";

	$conn = new mysqli($serverName, $serverUserName, $serverUserPassword, $dbName);

	if(!$conn) {
		die("Connection failed. ". mysqli_connect_error());
	}

	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			echo "ID:" .$row['ID'] . "|Name:".$row['Name']. "|Password:".$row['Password'].";";
		}
	}	
?>