/**
 * This js script is a script that provides single page app effect when user makes check out
 */

$(document).ready(function() {
    $(document).on('click','.anchor_check_out',function (event) {
		//prevent default action
        event.preventDefault();
		
		//show loader container
        $("#loader-container").show();
		
		//show loader
        $("#loader").show();

		//get url from currently clicked anchor and add it to a variable(processFile)
        let processFile = $(this).attr('href');

		//modify that variable(processFile) and add it to another variable(pairs)
        let pairs = processFile.split('?');
		
		//modify again that variable(pairs) and add it to next variable(File)
        let File = "/ajax_"+pairs[0];

		//make an ajax call
        $.ajax({
            url: File,
            type: "GET",
            dataType: 'text',
            success: function( response ) {
                $('.detail_info').html(response); //add response within class named "detail_info"

                //add message to message dialog box
                $('.message_dialog').text("Guest check out.");
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error); //show error message
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
}); 