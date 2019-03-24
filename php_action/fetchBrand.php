<?php

	require_once 'core.php';

	$sql = "SELECT * FROM brands WHERE brand_status = 1";
	$result = $connect->query($sql);

	$output = array('data' => array());

	if($result->num_rows > 0){
		while($row = $result->fetch_array()){
			$brandId = $row[0];
			//active brand
			if($row[2]==1){
				
				$activeBrands ="<label class='btn btn-success'>Available</label>";
			}else{
				//deactivate brand
				$activeBrands ="<label class='btn btn-danger'> Not Available</label>";
			}
			$button = 
					'<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
						<div class="btn-group" role="group">
							<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle"data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
								Action
					      	</button>
					      	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      	<a type="button"  data-toggle="modal" data-target="#editBrandModal" onclick="editBrands('.$brandId.')" class="dropdown-item">
						      		<i class="fas fa-edit"></i> Edit</a>
						      		<a type="button" data-toggle="modal" data-target="#removeBrandModal" onclick="removeBrands('.$brandId.')" class="dropdown-item">
						      		<i class="fas fa-trash-alt"></i>
						      		 Remove
						      	</a>
					    	</div>
					    </div>	
					</div>';

			$output['data'][] = array(
				$row[1],
				$activeBrands,
				$button
			);

		}//while
		
	}
	$connect->close();
	echo json_encode($output);
	

