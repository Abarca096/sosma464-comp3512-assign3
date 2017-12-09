window.onload=editProfile;

function editProfile(){
$("#editButton").on("click",function(){
    $("#editProfile").css("display","block"); //make the form for editing a profile appear
});

$("#cancelButton").on("click", function(){
    $("#editProfile").css("display","none"); //hide the edit profile form if edit process is cancelled
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
            $(this).addClass("error"); //add the error class if the field is empty (red highlight on the field)
            error=true;
        } else if( $(this).val() != ""){
            $(this).removeClass("error"); //remove the error class if there isn't a validation problem
        }
    });
var regEx = /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}/g; //validation for username/email in the format of x@x.xx ~ x@x.xxxx (top level domains are restricted to 2-4 characters)    
    if(regEx.test($("#userName").val()) == false){
        $("#userName").addClass("error"); //add the error class if there is a formatting issue (red highlight on the field)
        error=true;
    }else{ //remove the error class if there isn't a validation problem
        $("#userName").removeClass("error");
    }
    
    if(error){
        e.preventDefault(); //prevent form submission
    }else{ //profile update was successful
        alert("Your profile has been updated!");
    }
});
}