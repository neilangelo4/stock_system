var manageBrandTable;

$(document).ready(function() {
//top bar active

$("#navBrand").addClass('active');

//manage brand Table

manageBrandTable = $("#manageBrandTable").DataTable( {
	"ajax": 'php_action/fetchBrand.php',
	'order' : []
});
//submit brand form function

$("#submitBrandForm").unbind('submit').bind('submit', function() {

	//e.preventDefault();

	//remove the error text
	$(".text-danger").remove();
	//remove the form error
	$(".form-group").removeClass('has-error').removeClass('has-success');
	
	var brandName = $("#brandName").val();
	var brandStatus = $('#brandStatus').val();

	if(brandName == ""){
		$("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
		// $("#brandName").closest('.form-group').addClass('has-error');

	}else{
		//remove error text field
		$("#brandName").find('.text-danger').remove();
		// $("#brandName").closest('.form-group').addClass('has-success');
	}
	if(brandStatus == ""){
		$("#brandStatus").after('<p class="text-danger">Brand Status  field is required</p>');
		// $("#brandStatus").closest('.form-group').addClass('has-error');

	}else{
		//remove error text field
		$("#brandStatus").find('.text-danger').remove();
		// $("#brandStatus").closest('.form-group').addClass('has-success');
	}

	if(brandName && brandStatus){
		var form = $(this);

		//button loading
		const setItemItemStat = $('#brandName option:selected').text();

		$("#createBrandBtn").button('loading');
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success:function(response){

				$("#createBrandBtn").button('reset');
				if(response.success == true){
					//reload the manage member table

					manageBrandTable.ajax.reload(null, false);

					// reset form text
					$("#submitBrandForm")[0].reset();
					// remove error text
					// $(".text-danger").remove();
					// // remove the form error
					// $(".form-group").removeClass('has-error').removeClass('has-success');

					// $("#add-brand-messages").html('<div class="alert alert-success fade show">' +
					// 	'<strong><i class="fas fa-thumbs-up"></i></strong> You should check in on some of those fields below.'+
					//   '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					//     '<span aria-hidden="true">&times;</span>'+
					//   '</button>'+  response.messages +
					// '</div>');

					// $(".alert-success").delay(500).show(10, function() {
					// 	$(this).delay(3000).hide(10, function(){
					// 		$(this).remove();
					// 	});
					// });

					swal({
					  title: "Successfully Added!",
					  text: "Added item set to "+ setItemItemStat ,
					  icon: "success",
					  button: "Close",
					});

					//$('#remove_modal').click();

				}

				// $('#modal').modal('hide');

			},  
			// error: function(e) {
			//   // alert('asdjhaguysdg');
		 //     console.log(e.statusText);
		 //  	}
			});
		}
	return false;
	});//submit brand form function
});

function addBrand(){

	$("#submitBrandForm")[0].reset();

	$(".text-danger").remove();
	//remove the form error
	$(".form-group").removeClass('has-error').removeClass('has-success');

	$("#submitBrandForm").unbind('submit').bind('submit', function() {

	//e.preventDefault();

	//remove the error tex
	
	var brandName = $("#brandName").val();
	var brandStatus = $('#brandStatus').val();

	if(brandName == ""){
		$("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
		// $("#brandName").closest('.form-group').addClass('has-error');

	}else{
		//remove error text field
		$("#brandName").find('.text-danger').remove();
		// $("#brandName").closest('.form-group').addClass('has-success');
	}
	if(brandStatus == ""){
		$("#brandStatus").after('<p class="text-danger">Brand Status  field is required</p>');
		// $("#brandStatus").closest('.form-group').addClass('has-error');

	}else{
		//remove error text field
		$("#brandStatus").find('.text-danger').remove();
		// $("#brandStatus").closest('.form-group').addClass('has-success');
	}

	if(brandName && brandStatus){
		var form = $(this);

		//button loading
		const setItemItemStat = $('#brandName option:selected').text();

		$("#createBrandBtn").button('loading');
		$.ajax({
			url: form.attr('action'),
			type: form.attr('method'),
			data: form.serialize(),
			dataType: 'json',
			success:function(response){

				$("#createBrandBtn").button('reset');
				if(response.success == true){
					//reload the manage member table

					manageBrandTable.ajax.reload(null, false);

					// reset form text
					$("#submitBrandForm")[0].reset();
					// remove error text
					// $(".text-danger").remove();
					// // remove the form error
					// $(".form-group").removeClass('has-error').removeClass('has-success');

					// $("#add-brand-messages").html('<div class="alert alert-success fade show">' +
					// 	'<strong><i class="fas fa-thumbs-up"></i></strong> You should check in on some of those fields below.'+
					//   '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
					//     '<span aria-hidden="true">&times;</span>'+
					//   '</button>'+  response.messages +
					// '</div>');

					// $(".alert-success").delay(500).show(10, function() {
					// 	$(this).delay(3000).hide(10, function(){
					// 		$(this).remove();
					// 	});
					// });

					swal({
					  title: "Successfully Added!",
					  text: "Added item set to "+ setItemItemStat ,
					  icon: "success",
					  button: "Close",
					});

					//$('#remove_modal').click();

				}

				// $('#modal').modal('hide');

			},  
			// error: function(e) {
			//   // alert('asdjhaguysdg');
		 //     console.log(e.statusText);
		 //  	}
			});
		}
	return false;
	});

}

function editBrands(brandId = null){
	//alert(brandId);
	if(brandId){
		//remove brandId
		$("#brandId").remove();
		//refresh the form
		$("#editBrandForm")[0].reset();
		//remove the 

		$(".editBrandFooter").after('<input type="hidden" name="brandId" id="brandId" value="'+ brandId +'"/>');

		$.ajax({
			url: 'php_action/fetchSelectedBrand.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response){
				$("#editBrandName").val(response.brand_name);
				$("#editBrandStatus").val(response.brand_active);

				$("#editBrandForm").unbind('submit').bind('submit', function() {

				//e.preventDefault();

				//remove the error text
				$(".text-danger").remove();
				//remove the form error
				$(".form-group").removeClass('has-error').removeClass('has-success');
				
				var brandName = $("#editBrandName").val();
				var brandStatus = $('#editBrandStatus').val();

				if(brandName == ""){
					$("#editBrandName").after('<p class="text-danger">Brand Name field is required</p>');
					// $("#brandName").closest('.form-group').addClass('has-error');

				}else{
					//remove error text field
					$("#editBrandName").find('.text-danger').remove();
					// $("#brandName").closest('.form-group').addClass('has-success');
				}
				if(brandStatus == ""){
					$("#editBrandStatus").after('<p class="text-danger">Brand Status  field is required</p>');
					// $("#brandStatus").closest('.form-group').addClass('has-error');

				}else{
					//remove error text field
					$("#editBrandStatus").find('.text-danger').remove();
					// $("#brandStatus").closest('.form-group').addClass('has-success');
				}

				if(brandName && brandStatus){

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
								$("#editBrandModal").modal('hide');
								//reload the manage member table

							
								manageBrandTable.ajax.reload(null, false);

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

function removeBrands(brandId = null){
	if(brandId){
	
				$("#removeBrandBtn").unbind('click').bind('click', function() {	


				
					//alert('are you sure you want to remove this brand');

					$.ajax({
						url: 'php_action/removeBrand.php',
						type:'post',
						data: {brandId : brandId},
						dataType: 'json',
					success:function(response) {



						if(response.success == true) {

								
							//hide modal
							$("#removeBrandModal").modal('hide');

							//reload the brand modal
							manageBrandTable.ajax.reload(null, false);

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
