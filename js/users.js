window.onload=editProfile;

function editProfile(){
$("#editButton").on("click",function(){
    $("#editProfile").css("display","block");
});

$("#cancelButton").on("click", function(){
    $("#editProfile").css("display","none");
});

/* Style the input */
var inputs = $("#editProfile form input");

inputs.change(function(){
    $(this).css("background-color","#b5e7a0");
});

inputs.focus(function(){
    $(this).val('');
    $(this).css("color", "black");
})

formValidation();
}

function formValidation(){
$("#profileForm").on("submit", function(e){
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
    
    if(error){
        e.preventDefault();
    }else{
        alert("Your profile has been updated!");
    }
});
}