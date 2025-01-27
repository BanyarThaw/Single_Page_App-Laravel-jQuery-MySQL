/**
 * This js script is a script that provides single page app effect when user creates new room
 */

$(document).ready(function() {
    $(document).on('click','#rooms button[type="submit"]', function (event) {
		//prevent default action
        event.preventDefault();

		//show loader container
        $("#loader-container").show();

		//show loader
        $("#loader").show();

		//get csrf token for security reason
        let csrf_token = $("input[name='_token']").val();

		//get url form form's action and add it to a variable(processFile)
        let processFile = $('form').attr('action');

		//modify that variable(processFile)
        // processFile = "/ajax_"+processFile;

		//get room name from input
        var room_name = $('input[name="room_name"]').val();

		//get room number from input
        var room_number = $('input[name="room_number"]').val();

		//get room type from input
        var room_type = $('select[name="room_type"]').val();

		//make an ajax call
        $.ajax({
            url: processFile,
            type: "POST",
            data: "room_name="+room_name+"&&room_number="+room_number+"&&room_type="+room_type+"&&_token="+csrf_token,
            dataType: 'text',
            success: function( response ) {
                $('.detail_info').html(response); //add response within class named "detail_info"

				//get header title content
                var title = $(".room_detail_info_header h4").text();

				//if title content is room list,works the code below
                if(title == 'Room List')
                {
					//remove active effect and replace it with normal effect
                    $('.sub_menus').removeClass('sub_menus_active').addClass('sub_menus');
                    $('.sub_menus a').removeClass('sub_menu_anchor_active').addClass('sub_menu_anchor');

					//add active effect to rooms/list section
                    $('.sub_menus a[href="/rooms/list"]').parent().addClass('sub_menus_active');
                    $('.sub_menus a[href="/rooms/list"]').removeClass('sub_menu_anchor').addClass('sub_menu_anchor_active');

					//change url from web browser
                    $.ChangeUrl('Web Application','/rooms') //custom jquery plugin

					// add message to message dialog box
                    $('.message_dialog').text("Room created.");
                }
                else {
                    // add message to message dialog box
                    $('.message_dialog').text("Something went wrong.");
                }
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error); //show error message
            },
            complete: function ( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);

                // show and hide message dialog box
                $(".modal_2").show();
                $(".modal_2").fadeOut(2000);
            }
        });
    });
});
