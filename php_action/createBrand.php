<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){

	$brandName = $_POST['brandName'];
	$brandStatus = $_POST['brandStatus'];

	$sql = "INSERT INTO brands (brand_name, brand_active, brand_status) VALUES ('$brandName','$brandStatus', 1)";

	if($connect->query($sql) === TRUE){

		$valid['success'] = true;
		$valid['messages'] = 'Successfully Added';
		// redirect('http://localhost:8080/stock_system/brand.php', 200);

	}else{

		$valid['success'] = false;
		$valid['messages'] = 'Error while adding brands';

		// redirect('brand.php', 401);

	}

	$connect->close();
	echo json_encode($valid);

	// print_r($valid);

}

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}


?>