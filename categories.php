<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<nav aria-label="breadcrumb">
  		<ol class="breadcrumb">
    		<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
    		<li class="breadcrumb-item active" aria-current="page">Category</li>
 			</ol>
 		</nav>
<div class="card">
  <div class="card-header"><i class="fas fa-edit"></i> Manage Categories</div>
 		<div class="card-body text-right">
    	<div class="remove-messages row"></div>
   		<div class="div-action" style="padding-bottom: 20px">
    	<button class="btn btn-primary" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal">
    		<i class="fas fa-plus-square"></i> Add Categories </button>
   		</div>	
    </div>
    	<table class="table" id="manageCategoriesTable">
				<thead>
				  <tr>
				  	<th scope="col">Categories Name</th>
				    <th scope="col">Status</th>
				    <th scope="col" style="width: 15%;">Options</th>
				  </tr>
				</thead>
			</table>
</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="editCategoriesModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-plus">Edit Categories</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
      <div class="modal-body">
        <div id="edit-Categories-messages"></div>
      <div class="form-group row">
        <label for="editCategoriesName" class="col-sm-3 col-form-label">Categories Name:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="editCategoriesName" name="editCategoriesName" placeholder="Categories Name" 
          autocomplete="off">
        </div>
      </div>
      <div class="form-group row">
        <label for="editCategoriesStatus" class="col-sm-3 col-form-label">Status :</label>
        <div class="col-sm-9">
          <select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
            <option value="">~~Select~~</option>
            <option value="1">Available</option>
            <option value="2">Not Available</option>
          </select>
        </div>
      </div>
      <div class="modal-footer editCategoriesFooter">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-clipboard-check" id="editCategoriesBtn"></i> Save changes</button>
      </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="removeCategoriesModal">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeCategoriesBtn"><i class="fas fa-clipboard-check"></i> Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addCategoriesModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="submitCategoriesForm" action="php_action/createCategories.php" method="POST">
      <div class="modal-body">
  <div class="form-group row">
    <label for="categoriesName" class="col-sm-4 col-form-label">Categories Name: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="categoriesName" name="categoriesName" placeholder="Categories Name" autocomplete="off">
    </div>
  </div>
  <div class="form-group row">
    <label for="categoriesStatus" class="col-sm-4 col-form-label">Status :</label>
    <div class="col-sm-8">
      <select class="form-control" id="categoriesStatus" name="categoriesStatus">
				<option value="">~~Select~~</option>
				<option value="1">Available</option>
				<option value="2">Not Available</option>
			</select>
    </div>
      </div>
      <div class="modal-footer editCategoriesFooter">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="createCategoriesBtn">Save Changes</button>
      </div>
      </div>
      </form>
  </div>
</div>


<script type="text/javascript" src="custom/js/categories.js"></script>

<?php require_once 'includes/footer.php'; ?>
