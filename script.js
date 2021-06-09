function validateEmail(emailString){

    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(String(emailString).toLowerCase());

}

function validateFormDataOne(){

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var pwd = document.getElementById("pwd").value;
    
    
    if(!fname || !lname || !email || !phone || !address || !pwd){ 
        alert("Please fill in all information correctly, all fields must be filled");
    }
    else{
        if (validateEmail(email)){
            
        }
        else{
            alert("Please fill in your email address using the proper format");
        }
        
    }
    
    }
/*
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_user.php",
        data:'email='+$("#email").val(),
        type: "POST",
        success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
        },
        error:function (){}
        });
        } 
        
*/