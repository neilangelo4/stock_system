<?php
require_once 'php_action/db_connection.php';
session_start();

if(isset($_SESSION['userId'])){
	header('location: http://localhost:8080/stock_system/dashboard.php');
}

$errors = array();

if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)){
		if($username == ""){
			$errors[] = " Username is Required";
		}
		if($password == ""){
			$errors[] = " Password is Required";
			}
		}else{	
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = $connect->query($sql);
			if ($result->num_rows >= 1){

				$password = md5($password);
				//exists
				$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
				$mainResult = $connect->query($mainSql);

				if($mainResult->num_rows == 1){
					$value = $mainResult->fetch_assoc();
					$user_id = $value['user_id'];

					$_SESSION['user_Id'] = $user_id;

					header('location: http://localhost:8080/stock_system/dashboard.php');
				}else{
					$errors[] = " Incorrect username/password combination";
				}

		}else{
		$errors[] = " Username does not exists";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>
</head>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme -->
	<!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-re.min.css"> -->
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/all.css">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
	<!-- jquery -->
	<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
	<!-- jqueryui -->
	<link rel="stylesheet" type="text/css" href="assets/jquery-ui/jquery-ui.min.css">
	<script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<body>

	<div class="container">
		<div class="row justify-content-center vertical">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h5>Please Sign In</h5>
					</div> 
 			 <div class="card-body">
 			 	<div class="messages">
 			 		<?php if($errors)
 			 		{
 			 			foreach ($errors as $key => $value) {
 			 				echo '<div class="alert alert-warning" role="alert">
 			 					<i class="fas fa-exclamation-circle"></i>'.$value.'
								</div>';
 			 			}
 			 		}
 			 		?>
 			 	</div>
 			 	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="loginForm">
			  <div class="form-group row">
			    <label for="username" class="col-sm-2 col-form-label">Username</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="password" class="col-sm-2 col-form-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group row">
			    <div class="col-sm-10">
			      <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Sign in</button>
			    </div>
			  </div>
			</form>
 			 </div>
			</div>
			</div>
		</div>
	</div>

</body>
</html>