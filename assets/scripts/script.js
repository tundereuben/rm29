//Ajax call for the signup form
//Once the form is submitted
$("#signupform").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
        url: "assets/scripts/signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                 $("#signupmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please try again later</div>");
        }
    });
});


//Ajax call for the login Form
//Once the form is submitted
$("#loginform").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    // send them to login.php using AJAX
    $.ajax({
        url: "assets/scripts/login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "event-manage.php";
                $('#loginmessage').html(data);
            } else {
                $('#loginmessage').html(data);
            } 
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please try again later</div>");
        }
    });
}); 



//Ajax Call for the forgot password Form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    // send them to login.php using AJAX
    $.ajax({
        url: "assets/scripts/forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please check the link and try again!</div>");
        }
    });
}); 


//Ajax Call for the profile update form
//Once the form is submitted
$("#profile").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
//    var datatopost = $(this).serializeArray();
    var datatopost = new FormData($('form')[0]);
//    console.log(datatopost);
    // send them to login.php using AJAX
    $.ajax({
        url: "assets/scripts/profile-update.php",
        type: "POST",
        data: datatopost,
        contentType: false,
        processData: false,
        success: function(data){
            $('#profilemessage').html(data);
            window.location = "profile-detail.php"
        },
        error: function(){
            $("#profilemessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please check the link and try again!</div>");
        }
    });
});


//Ajax Call for the service provider registration form
//Once the form is submitted
$("#serviceprovider").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
    var datatopost = $(this).serializeArray();
//    var datatopost = new FormData($('form')[0]);
    console.log(datatopost);
    // send them to login.php using AJAX
    $.ajax({
        url: "assets/scripts/provider-register.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $('#providermessage').html(data);
//            window.location = "profile-detail.php"
        },
        error: function(){
            $("#providermessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please check the link and try again!</div>");
        }
    });
});

//Ajax Call for the search button
//Once the form is submitted
$("#searchForm").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    // send them to login.php using AJAX
    $.ajax({
        url: "assets/scripts/fetch.php",
//        url: "search-result.php",
        type: "POST",
        data: datatopost,
//        contentType: false,
//        processData: false,
        success: function(data){
//            $('#result').html(data);
//            console.log(data);
            window.location = "search-result.php"
            $('#result').html(data);
            sessionStorage.result = data;
        },
        error: function(){
            $("#result").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please check the link and try again!</div>");
        }
    });
});



//Ajax call to generate codes
//Once the form is submitted
$("#generateCodes").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
        url: "assets/scripts/code-generator.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                 $("#codeOutput").html(data);
//                window.location = "generate-code.php"
            }
        },
        error: function(){
            $("#codeOutput").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please try again later</div>");
        }
    });
});


//Ajax Call for the request contact form up form 
//Once the form is submitted
$("#contact").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "assets/scripts/contact.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#contactformmessage").html(data);
            }
        },
        error: function(){
            $("#contactformmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

