/**
 * This js script is a script providing single page app effect when log in.
 */

$(document).ready(function() {
    $(document).on('click','.login_button', function(event) {
		//show loader container
        $("#loader-container").show();
		
		//show loader
        $("#loader").show();

		//prevent default action
        event.preventDefault();

		//get csrf token for security reason
        var csrf_token = $("input[name='_token']").val();

		//get url from form action and add it to a variable(processFile)
        var processFile = $('form').attr('action');

		//modify the variable(processFile)
        processFile = "/ajax_"+processFile;

		//since we have two form inputs 
		//we need to check which form's input elements have
		//real data 
        function return_value(class_name) {
            var value;
            $(class_name).each(function() {
                var length = $(this).val().length;
                if(length > 0) {
                    value = $(this).val();
                } 
            });
            return value;
        }

		//get email from input
        var email = return_value(".email");

		//get password from input
        var password = return_value(".password");

		//make an ajax call
        $.ajax({
            url: processFile,
            type: "POST",
            data: "email="+email+"&&password="+password+"&&_token="+csrf_token,
            dataType: 'text',
            success: function( response ) {
                $('.container').html(response);  //add response within class named "container"
                
                var title = $(".header_login h3").text(); //get header content

				//check header content(response checking)
                if(title == "Web Application") {
                    // In case of login failed
                    $('.login_header').text("Login failed."); 
                }
            },
            error: function ( error ) {
                console.log('the page was NOT load', error); //show error message
            },
            complete: function( xhr, status ) {
				//remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
            }
        });
		
        //change url
        $.ChangeUrl("Web Application","/reception") //custom jquery plugin
    });
});