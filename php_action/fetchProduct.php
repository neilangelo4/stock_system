<?php 

require_once 'core.php';

$sql = "SELECT  From category where status = 1";
$result = $connect->query($sql);
$output =  array('data' => array());

?>