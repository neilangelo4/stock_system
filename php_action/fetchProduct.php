<?php 

require_once 'core.php';

$sql = "SELECT p.product_id, p.product_name, p.product_image, p.brand_id, 
				p.categories_id, p.rate, p.quantity, p.active, p.status,
				b.brand_name, c.categories_name
				FROM product as p
				INNER JOIN brands as b  ON p.brand_id = b.brand_id
				INNER JOIN category as c ON p.categories_id = c.categories_id
				WHERE p.status = 1";

	$result = $connect->query($sql);
	$output =  array('data' => array());

	if($result->num_rows > 0) {
	$active = "";
	while($row = $result->fetch_array()){
		//product id
		$productId = $row[0];
		//active
		if($row[7] == 1){
			$active = "<label class='btn btn-success'> Available</label>";
		}else{
			$active = "<label class='btn btn-danger'> Not Available</label>";
		}
		$button = 
					'<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
						<div class="btn-group" role="group">
							<button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
								Action
					      	</button>
					      	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      	<a type="button" data-toggle="modal" data-target="#editCategoriesModal" id="editCategoryBtn" onclick="editCategory('.$productId.')" class="dropdown-item">
						      		<i class="fas fa-edit"></i> Edit</a>
						      		<a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn"
						      		onclick="removeCategory('.$productId.')" class="dropdown-item">
						      		<i class="fas fa-trash"></i> Remove
						      	</a>	
					    	</div>
					    </div>	
					</div>';

					$brand = $row[9];
					$category = $row[10];

					$imageUrl = substr($row[2], 3);
					$productImage = "<img class='img-round' src='".$imageUrl."' style='height:30p; width:50px;' />";

					$output['data'][] = array(
					$productImage,
					//product name
					$row[1],
					//rate
					$row[5],
					//quantity
					$row[6],
					$brand,
					$category,
					$active,
					$button	
					);

				}
			}

			$connect->close();
			echo json_encode($output);

?>