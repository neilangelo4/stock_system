<?php  require_once 'includes/header.php' ?>

<div class="row">
	<div class="col-md-12">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Product</li>
		  </ol>
		</nav>
<div class="card">
	<div class="card-header"><i class="fas fa-edit"></i>
	Manage Product
	</div>
		 <div class="card-body text-right">
		   <div class="remove-messages row"></div>
		    <div class="div-action" style="padding-bottom: 20px">
		    	<button class="btn btn-primary" data-toggle="modal" 
		    	data-target="#addProductModal"><i class="fas fa-plus-square"></i> Add Product</button>
		    </div> <!-- div action -->
		  </div>
		   	<table class="table" id="manageProductTable">
				  <thead>
				    <tr>
				      <th scope="col" style="width: 15%;">Photo</th>
				      <th scope="col" >Product Name</th>
				      <th scope="col" >Rate</th>
				      <th scope="col" >Quantity</th>
				      <th scope="col" >Brand</th>
				      <th scope="col" >Category</th>
				      <th scope="col" >Status</th>
				      <th scope="col" style="width: 15%;">Options</th>
				    </tr>
				  </thead>
				</table>
		</div>
	</div> <!-- col-md-12 -->
</div>

<div class="modal" tabindex="-1" role="dialog" id="addProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="submitProductForm">
  <div class="form-group row">
    <label for="ProductImage" class="col-sm-4 col-form-label"> Product Image :</label>
    <div class="col-sm-8">
      <form class="form form-vertical" action="/avatar_upload.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-11.5 text-center">
            <div class="kv-avatar">
                <div class="file-loading">
                    <input id="productImage" name="productImage" type="file" required>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
  </div>
  <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Product Name : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" name="" placeholder="">
    </div>
  </div>
   <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Rate : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" name="" placeholder="">
    </div>
  </div>
   <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Quantity : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" name="" placeholder="">
    </div>
  </div>
   <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Brand Name : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" name="" placeholder="">
    </div>
  </div>
   <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Category Name : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" name="" placeholder="">
    </div>
  </div>
   <div class="form-group row">
    <label for="" class="col-sm-4 col-form-label"> Status : </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="" name="" placeholder="">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="editProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Add Product </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="custom/js/product.js"></script>

<?php  require_once 'includes/footer.php' ?>



