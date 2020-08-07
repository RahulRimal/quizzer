<?php
	//Database Credentials
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "quizzer";

	//Create mysqli object
	$mysqli = new mysqli($host, $user, $password, $database);


	//Error Handler
	if($mysqli->connect_error)
	{
		printf("Connection Failed: %s\n", $mysqli->connect_error);
		exit();
	}
