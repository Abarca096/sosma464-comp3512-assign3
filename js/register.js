$(function () {
    function removeText(){
    document.getElementById("errMsg").style.display="none";
    }
})

function validateForm() {
    var lastname = $("input[name='lastname']");
    var submit = true;
    if (lastname.val() == "") { lastname.addClass("error"); submit = false; }
    
    var city = $("input[name='city']");
    if (city.val() == "") { city.addClass("error"); submit = false; }
    
    var country = $("input[name='country']");
    if (country.val() == "") { country.addClass("error"); submit = false; }
    
    var username = $("input[name='username']");
    var username_regex = new RegExp("[a-z0-9A-Z]");
    console.log("fucking usename:" + username.name);
    var username_regex_result = username_regex.test(username);
    console.log(username_regex_result);
    
    if (username.val() == "") { username.addClass("error"); submit = false; }
    
    var password = $("input[name='password']");
    if (password.val() == "") { password.addClass("error"); submit = false; }
    return false;
}