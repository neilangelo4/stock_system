var manageCategoriesTable;
$(document).ready(function() {
//top bar active
$("#navCategories").addClass('active');
//manage brand Table
manageCategoriesTable = $("#manageCategoriesTable").DataTable( {
	'ajax': 'php_action/fetchCategories.php',
	'order' : []
});
//$("#addCataegoriesModalBtn").unbind('click').bind('click', function(){
$("#submitCategoriesForm").unbind('submit').bind('submit', function() {
	//remove the error text
	$(".text-danger").remove();
	//remove the form error
	$(".form-group").removeClass('has-error').removeClass('has-success');
	
	var categoriesName = $("#categoriesName").val();
	var categoriesStatus = $("#categoriesStatus").val();

	if(categoriesName == ""){
		$("#categoriesName").after('<p class="text-danger">Categories Name field is required</p>');
		// $("#brandName").closest('.form-group').addClass('has-error');
	}else{
		//remove error text field
		$("#categoriesName").find('.text-danger').remove();
		// $("#brandName").closest('.form-group').addClass('has-success');
	}
	if(categoriesStatus == ""){
		$("#categoriesStatus").after('<p class="text-danger">Brand Status  field is required</p>');
		// $("#brandStatus").closest('.form-group').addClass('has-error');

	}else{
		//remove error text field
		$("#categoriesStatus").find('.text-danger').remove();
		// $("#brandStatus").closest('.form-group').addClass('has-success');
	}

	if(categoriesName && categoriesStatus){
		var form = $(this);
		//button loading
		const setItemItemStat = $('#categoriesName option:selected').text();
		$("#createCategoriesBtn").button('loading');
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success:function(response){
				$("#createCategoriesBtn").button('reset');
				if(response.success == true){
					//alert('what is happening');
					//reload the manage member table
					manageCategoriesTable.ajax.reload(null, false);
					// reset form text
					$("#submitCategoriesForm")[0].reset();
					swal({
					  title: "Successfully Added!",
					  text: "Added item set to "+ setItemItemStat ,
					  icon: "success",
					  button: "Close",
					});
				}
			},  
		});
	}
	return false;
});
//});//submit brand form function
});

function editCategory(categoriesId = null){
	//alert(brandId);
	if(categoriesId){
		//remove brandId
		$("#categoriesId").remove();
		//refresh the form
		$("#editCategoriesForm")[0].reset();
		//remove the 

		$(".editCategoriesFooter").after('<input type="hidden" name="categoriesId" id="categoriesId" value="'+ categoriesId +'"/>');

		$.ajax({
			url: 'php_action/fetchSelectedCategories.php',
			type: 'post',
			data: {categoriesId : categoriesId},
			dataType: 'json',
			success:function(response){
				$("#editCategoriesName").val(response.categories_name);
				$("#editCategoriesStatus").val(response.categories_active);

				$("#editCategoriesForm").unbind('submit').bind('submit', function() {

				//e.preventDefault();

				//remove the error text
				$(".text-danger").remove();
				//remove the form error
				$(".form-group").removeClass('has-error').removeClass('has-success');
				
				var categoriesName = $("#editCategoriesName").val();
				var categoriesStatus = $("#editCategoriesStatus").val();

				if(categoriesName == ""){
					$("#editCategoriesName").after('<p class="text-danger">Categories Name field is required</p>');
					// $("#brandName").closest('.form-group').addClass('has-error');

				}else{
					//remove error text field
					$("#editCategoriesName").find('.text-danger').remove();
					// $("#brandName").closest('.form-group').addClass('has-success');
				}
				if(categoriesStatus == ""){
					$("#editCategoriesStatus").after('<p class="text-danger">Categories Status  field is required</p>');
					// $("#brandStatus").closest('.form-group').addClass('has-error');

				}else{
					//remove error text field
					$("#editCategoriesStatus").find('.text-danger').remove();
					// $("#brandStatus").closest('.form-group').addClass('has-success');
				}
				if(categoriesName && categoriesStatus){
					//alert('ok');
					var form = $(this);
					//button loading
					//const setItemItemStat = $('#brandName option:selected').text();

					//$("#createBrandBtn").button('loading');
					$.ajax({
						url: form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),
						dataType: 'json',
						success:function(response){
							//$("#createBrandBtn").button('reset');
							if(response.success == true){
								//hide modal
								$("#editCategoriesModal").modal('hide');
								//reload the manage member table
								manageCategoriesTable.ajax.reload(null, false);

									swal({
					  title: "Successfully Updated!",
					  text: "Item has been Updated!",
					  icon: "success",
					  button: "Close",
					});
								// reset form text
								 //$("#editBrandForm")[0].reset();
								// //remove error text
								// $(".text-danger").remove();
								// // remove the form error
								// $(".form-group").removeClass('has-error').removeClass('has-success');

								// $("#edit-brand-messages").html('<div class="alert alert-success fade show">' +
								// 	'<strong><i class="fas fa-thumbs-up"></i></strong>'+
								//   '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
								//     '<span aria-hidden="true">&times;</span>'+
								//   '</button>'+  response.messages +
								// '</div>');

								// $(".alert-success").delay(500).show(10, function() {
								// 	$(this).delay(3000).hide(10, function(){
								// 		$(this).remove();
								// 	});
								// })

								// swal({
								//   title: "Successfully Added!",
								//   text: "Added item set to "+ setItemItemStat ,
								//   icon: "success",
								//   button: "Close",
								// });

								//$('#remove_modal').click();

							}

							// $('#modal').modal('hide');

						},  
						// error: function(e) {
						//    alert('asdjhaguysdg');
					 //     console.log(e.statusText);
					 //  	}
						});
					}
				return false;
				})
			}
		});
	}
}
		
function removeCategory(categoriesId = null){
	if(categoriesId){
	
				$("#removeCategoriesBtn").unbind('click').bind('click', function() {	


				
					//alert('are you sure you want to remove this brand');

					$.ajax({
						url: 'php_action/removeCategories.php',
						type:'post',
						data: {categoriesId : categoriesId},
						dataType: 'json',
					success:function(response) {



						if(response.success == true) {

								
							//hide modal
							$("#removeCategoriesModal").modal('hide');

							//reload the brand modal
							manageCategoriesTable.ajax.reload(null, false);

							swal({
					  title: "Successfully Removed!",
					  text: "Item Has Been Removed!",
					  icon: "success",
					  button: "Close",
					});
	

					}
				},
			});
		});
	}//if
}		
