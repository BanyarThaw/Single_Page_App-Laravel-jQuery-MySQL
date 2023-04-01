/**
 * This js script is a script providing single page app effect when you click pagination links.
 */
 
var processFile;  // global variable

$(document).ready(function() {
    $(document).on('click','.StartAjaxPagination .pagination a', function(event) {
		//get file name (from parent element id) and add it to global variable(processFile)
        processFile = $(".StartAjaxPagination").parent().prop('id');
		
		//modify that variable(processFile)
        processFile = "/ajax/"+processFile;

		//prevent default action
        event.preventDefault();
		
		//get page number from clicking
        var page = $(this).attr('href').split('page=')[1];
		
		//show loader container 
        $("#loader-container").show();
		
		//show loader
        $("#loader").show();
        
		//call fetch_data function to load page from return 
		fetch_data(page);
    });

	//function providing ajax call
    function fetch_data(page)
    {
        $.ajax({
            url: processFile+"?page="+page,
            success:function(guests)
            {
                $('.guest_foreach').html(guests); //add response within class named "guest_foreach"
            },
            complete: function( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);
            }
        });
    }
});