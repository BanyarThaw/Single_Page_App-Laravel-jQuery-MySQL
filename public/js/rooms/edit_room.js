/**
 * This js script is a script that provides single page app effect when user edits room
 */

$(document).ready(function() {
    $(document).on('click','.edit_room',function (event) {
		//prevent default action
        event.preventDefault();

		//show loaer container
        $("#loader-container").show();

		//show loader
        $("#loader").show();

		//get url form form's action and add it to a variable(processFile)
        let processFile = $('form').attr('action');

		//modify that variable(processFile)
        // processFile = "/ajax_"+processFile;

		//get csrf token for security reason
        let csrf_token = $("input[name='_token']").val();

		//get room name from input
        var room_name = $('input[name="room_name"]').val();

		//get room number from input
        var room_number = $('input[name="room_number"]').val();

		//get room type from input
        var room_type = $('select[name="room_type"]').val();

    console.log(processFile);

		//make an ajax call
        $.ajax({
            url: processFile,
            type: "POST",
            data: "room_name="+room_name+"&&room_number="+room_number+"&&room_type="+room_type+"&&_token="+csrf_token,
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

    //checking the response (whether it is room list or edit dialog box)
    function extract(response) {
		//add it to a variable(html_markup)
        const html_markup = response;

		//make a regex
        const regex = /Edit Room/g;

		//check if regex is found in variable(html_markup)
		const found = html_markup.match(regex);

        //if response is edit dialog box
        if (found) {
			//add to modal-content div element
            $('.modal-content div').html(html_markup);

            // add message to message dialog box
            $('.message_dialog').text('Something went wrong.');
        }
        //if response is room list
        else {
			//add to detail_info div element
            $('.detail_info').html(response);

			//fade out  the modal
            $("#myModal").fadeOut();

			//remove active effect and replace it with normal effect
            $('.sub_menus').removeClass('sub_menus_active').addClass('sub_menus');
            $('.sub_menus a').removeClass('sub_menu_anchor_active').addClass('sub_menu_anchor');

			//add active effect to rooms/list section
            $('.sub_menus a[href="/rooms/list"]').parent().addClass('sub_menus_active');
            $('.sub_menus a[href="/rooms/list"]').removeClass('sub_menu_anchor').addClass('sub_menu_anchor_active');

			//change url from web browser
            $.ChangeUrl('Web Application','/rooms') //custom jquery plugin

            //add message to message dialog box
            $('.message_dialog').text("Room edited.");

            //remove html elements of modal-content after 2 seconds
            setTimeout(function() {
                $(".modal-content div").empty();
            },2000);
        }
    }
});
