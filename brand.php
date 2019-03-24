<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		

		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Brand</li>
		  </ol>
		</nav>
		<div class="card">
		  <div class="card-header"><i class="fas fa-edit"></i>
		     Manage Brand
		  </div>
		  <div class="card-body text-right">
		    <div class="remove-messages"></div>
		    	<div class="div-action" style="padding-bottom: 20px">
		    		<button class="btn btn-primary" data-toggle="modal" data-target="#addBrandModal"><i class="fas fa-plus"></i> Add Brand</button>
		    </div> <!-- div action -->
		  </div>
		   <table class="table" id="manageBrandTable">
				  <thead>
				    <tr>
				      <th scope="col">Brand Name</th>
				      <th scope="col">Status</th>
				      <th scope="col" style="width: 15%;">Options</th>
				    </tr>
				  </thead>
				</table>
		</div>
	</div> <!-- col-md-12 -->
</div><!-- row -->


<div class="modal" tabindex="-1" role="dialog" id="addBrandModal">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
		    <div class="modal-header">
		        <h5 class="modal-title"><i class="fas fa-plus"></i> Add Brand</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>

	      	<form id="submitBrandForm" action="php_action/createBrand.php" method="POST">
	  			<div id="add-brand-messages"></div>
			      <div class="modal-body">
				  <div class="form-group row">
				    <label for="brandName" class="col-sm-3 col-form-label">Brand Name:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Brand Name" 
				      autocomplete="off">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="brandStatus" class="col-sm-3 col-form-label">Status :</label>
				    <div class="col-sm-9">
				    	<select class="form-control" id="brandStatus" name="brandStatus">
				    		<option value="">~~Select~~</option>
				    		<option value="1">Available</option>
				    		<option value="2">Not Available</option>
				    	</select>
				    </div>
				  </div>
			   	</div>

			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" id="remove_modal" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." >Save changes</button>
			    </div>
			</form>

	    </div>
  	</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="editBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-plus">Edit Brand</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editBrandForm" action="php_action/editBrand.php" method="POST">
      <div class="modal-body">
			<div class="form-group row">
		    <label for="editBrandName" class="col-sm-3 col-form-label">Brand Name:</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="editBrandName" name="editBrandName" placeholder="Brand Name" 
		      autocomplete="off">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="editBrandStatus" class="col-sm-3 col-form-label">Status :</label>
		    <div class="col-sm-9">
		    	<select class="form-control" id="editBrandStatus" name="editBrandStatus">
		    		<option value="">~~Select~~</option>
		    		<option value="1">Available</option>
		    		<option value="2">Not Available</option>
		    	</select>
		    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>



<div class="modal" tabindex="-1" role="dialog" id="removeBrandModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-trash"></i> Remove Brand </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-minus-circle"></i>Close</button>
        <button type="button" class="btn btn-primary"><i class="fas fa-clipboard-check"></i> Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="custom/js/brand.js"></script>

<?php require_once 'includes/footer.php'; ?>