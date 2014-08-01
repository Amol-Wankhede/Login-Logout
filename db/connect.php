<?php
	$hostname = "localhost";
	$database = "db";
	$username = "root";
	$password = "root";
	try	{
		$pdo = new PDO("mysql:host=$hostname;dbname=". $database, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec("SET NAMES 'utf8'");
	}
	catch (PDOException $e) {
	    echo "<div class='alert alert-error'>ERROR : " . $e->getMessage() . "</div>";
		exit();
 	}
?>