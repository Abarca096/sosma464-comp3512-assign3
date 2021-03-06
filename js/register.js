$(function () {
    function removeText(){
    document.getElementById("errMsg").style.display="none";
    }
});

window.onload = formValidation;

function formValidation(){
$("#registerForm").on("submit", function(e){
    var error = false;
     var regEx = /[\S]+[\s]?/g; //validation for required fields. this checks for fields that are just empty spaces.
    $(".required").each(function (index){
        $(this).on("focus", function(){
            $(this).removeClass("error");
        });
        if(regEx.test($(this).val()) == false){
            $(this).addClass("error"); //add the error class if the field is blank (red highlight)
            $('.reqMsg').show();
            error=true;
        } else if(regEx.test($(this).val()) == true){
            $(this).removeClass("error"); //remove the error class if formatting is okay
        }
    });
var regEx = /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}/g;   //validation for username/email in the format of x@x.xx ~ x@x.xxxx (top level domains are restricted to 2-4 characters)  
    if(regEx.test($("#userName").val()) == false){
        $("#userName").addClass("error"); //add the error class if there is a email formatting problem.
        error=true;
    }else{
        $("#userName").removeClass("error");
    }
    
    if(!$(".passwd").hasClass("error")){
    if($(".passwd").eq(0).val() != $(".passwd").eq(1).val()){
        error= true;
        $(".passwd").addClass("error"); //if passwords do not match, add the error class    
    }else{
        $(".passwd").removeClass("error"); //if passwords match, remove the error class
    }
    }
    if(error){
        e.preventDefault(); //prevent form submission
    }
});
}
