/**
 * This js script is a script providing single page app effect when you click header menus anchors.
 */

$(document).ready(function() {
    $(document).on('click','#header a', function(event) {
		//show loader container
        $("#loader-container").show();
		
		//show loader
        $("#loader").show();
		
		//prevent default action
        event.preventDefault();
		
		//get process file from anchor tag's herf and add it to a variable(processFile)
        var processFile = $(this).attr('href');
		
		//modify that variable(processFile)
        processFile = "/ajax_"+processFile;

		//call loadPage function to load page from return 
        loadPage(processFile);
    });

	//function providing ajax call
    function loadPage(PageRefInput) {
        $.ajax({
            url: PageRefInput,
            type: "GET",
            dataType: 'text',
            success: function(response) {
                $('.main_body').html(response); //add response within class named "guest_foreach"
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error); //show error message
            },
            complete: function( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
            }
        });
    }
});