<?php
	$serverName = "localhost";
	$serverUserName = "";
	$serverUserPassword = "";
	$dbName = "robert_TheyShallNotPassDataBase";

	$userName=$_POST["userNamePost"];
	$userScore=$_POST["userScorePost"];

	$conn = new mysqli($serverName, $serverUserName, $serverUserPassword, $dbName);

	if(!$conn) {
		die("Connection failed. ". mysqli_connect_error());
	}

	$sql = "INSERT INTO scores(Name, Score)
		VALUES ('".$userName."','".$userScore."')";
	$result = mysqli_query($conn, $sql);

	if(!result) echo "Error";
	else echo "ok";
	
?>