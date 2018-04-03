//Ajax Call for the new event form
//Once the form is submitted
$("#new_event").submit(function(event){
    // prevent default php processing
    event.preventDefault();
    // collect user inputs 
//    var datatopost = $(this).serializeArray();
    var datatopost = new FormData($('form')[0]);
//    console.log(datatopost);
    // send them to new-event.php using AJAX
    $.ajax({
        url: "assets/scripts/new-event.php",
        type: "POST",
        data: datatopost,
        contentType: false,
        processData: false,
        success: function(data){
            $('#neweventmessage').html(data);
            window.location = "event-manage.php"
        },
        error: function(){
            $("#neweventmessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please try again!</div>");
        }
    });
});


//POPULATE THE event-manage page
$(function(){
    //define variables
    var activeEvent = 0;
    var editMode = false; 
    
    //load events on page load: Ajax call to loadevents.php
    $.ajax({
        url: "assets/scripts/loadevents.php",
        success: function (data){
            $('#events').html(data);        
        },
        error: function(){
            $('#events').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn(); 
        }
    
    });
    
    //Ajax Call for the update event form
    //Once the form is submitted
    $("#update_event").submit(function(event){
        // prevent default php processing
        event.preventDefault();
        // collect user inputs 
        var datatopost = new FormData($('form')[0]);
    //    console.log(datatopost);
        // send them to login.php using AJAX
        $.ajax({
            url: "assets/scripts/updateevent.php",
            type: "POST",
            data: datatopost,
            contentType: false,
            processData: false,
            success: function(data){
                $('#neweventmessage').html(data);
                window.location = "event-manage.php"
            },
            error: function(){
                $("#neweventmessage").html("<div class='alert alert-danger'>There was error with the Ajax Call. Please check the link and try again!</div>");
            }
        });
    });

});

