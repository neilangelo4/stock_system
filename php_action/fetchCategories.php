<?php
	
	require_once 'core.php';

	$sql = "SELECT * FROM category WHERE categories_status = 1";
	$result = $connect->query($sql);
	$output = array('data' => array());
	if($result->num_rows > 0){	
		$activeCategories = "";
		while($row = $result->fetch_array()){
			$categoriesId = $row[0];
			if($row[2]==1){

				$activeCategories ="<label class='btn btn-success'> Available</label>";
			}else{
				//deactivate brand
				$activeCategories ="<label class='btn btn-danger'> Not Available</label>";
			}
			$button = 
					'<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
						<div class="btn-group" role="group">
							<button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
								Action
					      	</button>
					      	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      	<a type="button" data-toggle="modal" data-target="#editCategoriesModal" id="editCategoryBtn" onclick="editCategory('.$categoriesId.')" class="dropdown-item">
						      		<i class="fas fa-edit"></i> Edit</a>
						      		<a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn"
						      		onclick="removeCategory('.$categoriesId.')" class="dropdown-item">
						      		<i class="fas fa-trash"></i> Remove
						      	</a>	
					    	</div>
					    </div>	
					</div>';

				$output['data'][] = array(
				$row[1],
				$activeCategories,
				$button

			);

			}

		}

	$connect->close();

	echo json_encode($output);