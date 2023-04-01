/**
 * This js script is a script that provides single page app effect when user edits room type
 */

$(document).ready(function() {
    $(document).on('click','.edit_roomtype',function (event) {
		//prevent default action
        event.preventDefault();
		
		//show the loader container
        $("#loader-container").show();
		
		//show loader
        $("#loader").show();

		//get url form form's action and add it to a variable(processFile)
        let processFile = $('form').attr('action');

		//modify that variable(processFile)
        processFile = "/ajax_"+processFile;

		//get csrf token for security reason
        let csrf_token = $("input[name='_token']").val();

		//get room type name from input
        var room_type_name = $('input[name="room_type_name"]').val();
		
		//make an ajax call
        $.ajax({
            url: processFile,
            type: "POST",
            data: "room_type_name="+room_type_name+"&&_token="+csrf_token,
            dataType: 'text',
            success: function(response) {
                extract(response); //extract the response
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error); //show the error message
            },
            complete: function( xhr, status ) {
                //remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);

                //show and hide message dialog box
                $(".modal_2").show();
                $(".modal_2").fadeOut(2000);
            }
        });
    });

    //checking the respone (whether it is room type list or edit dialog box)
    function extract(response) {
		//add it to a variable(html_markup)
        const html_markup = response;

		//make a regex
        const regex = /Edit Room Type/g;

		//check if regex is found in variable(html_markup)
        const found = html_markup.match(regex);

        //if response is edit dailog box
        if (found) {
			//add to modal-content div element
            $('.modal-content div').html(html_markup);

            //add message to message dialog box
            $('.message_dialog').text("Something went wrong."); 
        }
        //if response is room type list
        else {
			//add to detail_info div element
            $('.detail_info').html(response);
			
			//fade out  the modal
            $("#myModal").fadeOut();

			//remove active effect and replace it with normal effect
            $('.sub_menus').removeClass('sub_menus_active').addClass('sub_menus');
            $('.sub_menus a').removeClass('sub_menu_anchor_active').addClass('sub_menu_anchor');

			//add active effect to roomtypes section
            $('.sub_menus a[href="/roomtypes"]').parent().addClass('sub_menus_active');
            $('.sub_menus a[href="/roomtypes"]').removeClass('sub_menu_anchor').addClass('sub_menu_anchor_active');
            
			//change url from web browser
			$.ChangeUrl('Web Application','/roomtypes') //custorm jquery plugin

            //add message to message dialog box
            $('.message_dialog').text("Room type edited."); 
           
            //remove html elements of modal-content after 2 seconds
            setTimeout(function() {
                $(".modal-content div").empty();
            },2000);
        }
    }
});