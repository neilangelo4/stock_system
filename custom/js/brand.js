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

$("#submitBrandForm").unbind('submit').bind('submit', function(e) {

	e.preventDefault();

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
		const setItemItemStat = $('#brandStatus option:selected').text();

		$("#createBrandBtn").button('loading');
		$.ajax({
			url: form.attr('action'),
			type: 'POST',
			data: form.serialize(),
			dataType: 'json',
			success:function(response){

				$("#createBrandBtn").button('reset');
				if(response.success == true){
					//reload the manage member table

					manageBrandTable.ajax.reload(null, false);

					// reset form text
					$("#submitBrandForm")[0].reset();
					// // remove error text
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

					$('#remove_modal').click();

				}

				// $('#modal').modal('hide');

			},  
			error: function(e) {
			  // alert('asdjhaguysdg');
		     console.log(e.statusText);
		  	}
		});
	}
	return false;
});

});