const BASE_URL = "localhost/alfahelix";

function clearErrors() {
    $(".has-error").removeClass("has-error");
    $(".help-block").html("");
}

function showErrors(error_list){
    clearErrors();

    $.each(error_list, function (id, message){
        $(id).parent().parent().adCLass("has-error");
        $(id).paretn().siblings("help-block").html(message);
    })
}

function loadingImg(message=""){
    return "<i class='fa fa-circle-o-notch fa-spin'></i>&nbsp;"+message;
}