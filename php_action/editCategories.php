<?php 

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
	$categoriesName = $_POST['editCategoriesName'];
	$categoriesStatus = $_POST['editCategoriesStatus'];
	$categoriesId = $_POST['categoriesId'];

	$sql = "UPDATE category SET categories_name = '$categoriesName', categories_active = '$categoriesStatus' WHERE categories_id = '$categoriesId'";
	if($connect->query($sql) === TRUE){
		$valid['success'] = true;
		$valid['messages'] = 'Successfully Updated';
	}else{
		$valid['success'] = false;
		$valid['messages'] = 'Error While Updating  the Categories';

	}
}
	$connect->close();

	echo json_encode($valid);
?>