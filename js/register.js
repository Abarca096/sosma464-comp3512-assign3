$(function () {
    function removeText(){
    document.getElementById("errMsg").style.display="none";
    }
});

window.onload = formValidation;

function formValidation(){
$("#registerForm").on("submit", function(e){
    var error = false;
    $(".required").each(function (index){
        if( $(this).val() == ""){
            $(this).addClass("error");
            error=true;
        } else if( $(this).val() != ""){
            $(this).removeClass("error");
        }
    });
var regEx = /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}/g;    
    if(regEx.test($("#userName").val()) == false){
        $("#userName").addClass("error");
        error=true;
    }else{
        $("#userName").removeClass("error");
    }
    
    if(!$(".passwd").hasClass("error")){
    if($(".passwd").eq(0).val() != $(".passwd").eq(1).val()){
        error= true;
        $(".passwd").addClass("error");
    }else{
        $(".passwd").removeClass("error");
    }
    }
    if(error){
        e.preventDefault();
    }
});
}
