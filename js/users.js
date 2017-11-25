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

}