<?php 

require_once 'core.php';

$valid['success'] = array('success' =>  false, 'messages' => array());


if($_POST){
	$productName = $_POST['productName'];
	$rate = $_POST['rate'];
	$quantity = $_POST['quantity'];
	$brandName = $_POST['brandName'];
	$categoriesName = $_POST['categoriesName'];
	$productStatus = $_POST['productstatus'];
	//var_dump($brandName);
	//for product image
	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type) - 1];
	$url = '../assets/images/stock/'.uniqid(rand()).'.'.$type;

	//echo $url;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','JPG', 'GIF','JPEG', 'PNG'))){
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])){
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)){

				$sql = "INSERT INTO product 
							(product_name, product_image, brand_id, categories_id, quantity, rate, active, status) 
						VALUES 
							('$productName', '$url', $brandName, $categoriesName, $quantity, $rate, $productStatus, 1)";
										//var_dump($sql);
				if($connect->query($sql) === TRUE){	
				$valid['success'] = true;
				$valid['messages'] = 'Successfully Added';
				}else{
				$valid['success'] = false;
				$valid['messages'] = 'Error while Adding Product!';
				}

			}else{
				return false;
			}
		}
	}

	$connect->close();
	echo json_encode($valid);
}// if $_Post