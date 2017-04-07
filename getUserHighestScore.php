<?php
	$serverName = "localhost";
	$serverUserName = "";
	$serverUserPassword = "";
	$dbName = "robert_TheyShallNotPassDataBase";

	$userName=$_POST["userNamePost"];

	$conn = new mysqli($serverName, $serverUserName, $serverUserPassword, $dbName);

	if(!$conn) {
		die("Connection failed. ". mysqli_connect_error());
	}

	$sql = "SELECT * FROM scores WHERE Name = '".$userName."' ORDER BY Score DESC ";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			echo "Score:".$row['Score'].";";
		}
	}	
?>