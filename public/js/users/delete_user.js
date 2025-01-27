/**
 * This js script is a script that provides single page app effect when user deletes another user
 */

$(document).ready(function() {
    $(document).on('click','.delete_user',function (event) {
		//show loader container
        $("#loader-container").show();

		//show loader
        $("#loader").show();

		//prevent default action
        event.preventDefault();

		//get url form form's action and add it to a variable(processFile)
        let processFile = $(this).attr('href');

		//modify that variable(processFile)
        // processFile = "/ajax_"+processFile;

		//make an ajax call
        $.ajax({
            url: processFile,
            type: "GET",
            dataType: 'text',
            success: function( response ) {
                $('.detail_info').html(response); //add response within class named "detail_info"

                //add message to message dialog box
                $('.message_dialog').text("User deleted.");
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error); //show the error message
            },
            complete: function ( xhr, status ) {
                //remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);

                //show and hide message dialog box
                $(".modal_2").show();
                $(".modal_2").fadeOut(2000);
            }
        });
    });
})
