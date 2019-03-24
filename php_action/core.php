<?php
			
			session_start();

			require_once 'db_connection.php';

			// echo $_SESSION['userId'];

			if(!$_SESSION['user_Id']){
				header('location: http://localhost:8080/stock_system/index.php');
			}
?>