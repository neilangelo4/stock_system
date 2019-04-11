var manageProductTable;
$(document).ready(function() {
//top navbar
$("#navProduct").addClass('active');
//manage productTable
manageProductTable = $("#manageProductTable").DataTable({
    'ajax': 'php_action/fetchProduct.php',
    'order' : []
});
//addProduct modal btn clicked
$("#addProductModalBtn").unbind('click').bind('click', function() {
    //product form reset
        //$("#submitProductForm")[0].reset();
        $("input[type='text']").val("");
        $("select").val("");
        $(".fileinput-remove-button").click();

            $("#productImage").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',    
            removeLabel: '',
            browseIcon: '<i class="fas fa-folder"></i>',
            removeIcon: '<i class="fas fa-times"></i></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="assets/images/download.jpg" alt="Your Avatar">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });

        $("#submitProductForm").unbind('submit').bind('submit', function() {

             $(".text-danger").remove();
            // //remove the form error
            // $(".form-group").removeClass('has-error').removeClass('has-success');

            var productImage = $("#productImage").val();
            var productName = $("#productName").val();
            var rate = $("#rate").val();
            var quantity = $("#quantity").val();
            var brandName = $("#brandName").val();
            var categoriesName = $("#categoriesName").val();
            var productstatus = $("#productstatus").val();

            if(productImage == ""){
                $("#productImage").after('<p class="text-danger">Product Image is Required</p>');
            }else{
                $("#productImage").find('.text-danger').remove();
            }
            if(productName == ""){
                $("#productName").after('<p class="text-danger">Product Name is Required!</p>');
            }else{
                $("#productName").find('.text-danger').remove();
            }
             if(rate == ""){
                $("#rate").after('<p class="text-danger">ProductImage is Required></p>');
            }else{
                $("#rate").find('.text-danger').remove();
            }
             if(quantity == ""){
                $("#quantity").after('<p class="text-danger">ProductImage is Required></p>');
            }else{
                $("#quantity").find('.text-danger').remove();
            }
             if(brandName == ""){
                $("#brandName").after('<p class="text-danger">ProductImage is Required></p>');
            }else{
                $("#brandName").find('.text-danger').remove();
            }
             if(categoriesName == ""){
                $("#categoriesName").after('<p class="text-danger">ProductImage is Required></p>');
            }else{
                $("#categoriesName").find('.text-danger').remove();
            }
             if(productstatus == ""){
                $("#productstatus").after('<p class="text-danger">ProductImage is Required></p>');
            }else{
                $("#productstatus").find('.text-danger').remove();
             }

             if(productImage && productName && rate && quantity && brandName && categoriesName && productstatus) {
                //alert('ok');
                var form = $(this);
                var formData = new FormData(this);
                $("#createProductBtn").button('loading');
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response.success == true){
                        //alert('ok');
                        $("input[type='text']").val("");
                        $("select").val("");
                        $(".fileinput-remove-button").click();
                        //$("#createProductBtn").button('reset');
                              swal({
                      title: "Successfully Updated!",
                      text: "Item has been Updated!",
                      icon: "success",
                      button: "Close",
                    });
                        
                            manageProductTable.ajax.reload(null, false);

                            //$("submitProductForm")[0].reset(); 
                        }
                    },
                });
             }
            return false;
        });

    });// add product modal Btn clicked

}); //document


// // $(document).ready(function(){
// //     $("#input-fa").fileinput({
// //     theme: "fa",
// //     uploadUrl: "/file-upload-batch/2"
// // });
// // });
