/**
 * This js script is a script providing single page app effect when log out.
 */

$(document).ready(function() {
    $(document).on('click','.logout_button',function(event) {
		//prevent default action
        event.preventDefault();

		//show loader container
        $("#loader-container").show();

		//show loader
        $("#loader").show();

		//get url from currently clicked anchor tag and add it to a variable(processFile)
        var processFile = $(this).attr('href');

		//modify that variable(processFile)
        // processFile = "/ajax_"+processFile;

		//make an ajax call
        $.ajax({
            url: processFile,
            type: "GET",
            success: function( response ) {
                $('.container').html(response); //add response within class named "container"
            },
            error: function ( error ) {
                console.log('the page was NOT load') //show error message
            },
            complete: function ( xhr, status ) {
				//remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
            }
        });
        //change url
        $.ChangeUrl("Web Application","/users/login") //custom jquery plugin
    });
});
