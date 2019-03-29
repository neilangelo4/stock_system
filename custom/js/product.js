$(document).ready(function() {
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
});
//$("i").remove(".glyphicon glyphicon-zoom-in");
