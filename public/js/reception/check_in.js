/**
 * This js script is a script that provides single page app effect when user makes check in
 */

$(document).ready(function() {
    $(document).on('click','#reception button[type="submit"]', function (event) {
		//prevent default action
        event.preventDefault();

		//show loader container
        $("#loader-container").show();

		//show loader
        $("#loader").show();

		//get csrf token for security reason
        let csrf_token = $("input[name='_token']").val();

		//get url from form action and add it to a variable(processFile)
        let processFile = $('form').attr('action');

		//modify that variable(processFile)
        // processFile = "/ajax_"+processFile;

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

		//get guest name from input
        var guest_name = return_value(".guest_name");

		//get nrc number from input
        var nrc = return_value(".nrc");

		//get email from input
        var email = return_value(".email");

		//get phone from input
		var phone = return_value(".phone");

		//get adult number from input
        var adult = return_value(".adult");

		//get children number from input
        var child = return_value(".child");

		//get address from input
        var address = return_value(".address");

		//get room info from input
        var room = return_value(".room");

		//make an ajax call to load page
        $.ajax({
            url: processFile,
            type: "POST",
            data:"guest_name="+guest_name+"&&nrc="+nrc+"&&email="+email+"&&phone="+phone+"&&adult="+adult+"&&child="+child+"&&address="+address+"&&room="+room+"&&_token="+csrf_token,
            dataType: 'text',
            success: function( response ) {
                $('.detail_info').html(response); //add response within class named "detail_info"

				//get header title content
                var title = $(".reception_detail_info_header h4").text();

				//if title content is chek-in list,works the code below
                if(title == 'Check-in List')
                {
					//remove active effect and replace it with normal effect
                    $('.sub_menus').removeClass('sub_menus_active').addClass('sub_menus');
                    $('.sub_menus a').removeClass('sub_menu_anchor_active').addClass('sub_menu_anchor');

					//add active effect to reception/check_in section
                    $('.sub_menus a[href="/reception/check_in"]').parent().addClass('sub_menus_active');
                    $('.sub_menus a[href="/reception/check_in"]').removeClass('sub_menu_anchor').addClass('sub_menu_anchor_active');

					//change url from web browser
                    $.ChangeUrl('Web Application','/reception/check_in') //custom jquery plugin

                    //add message to message dialog box
                    $('.message_dialog').text("Guest check in.");
                }
                else {
                    //add messge to message dialog box
                    $('.message_dialog').text("Something went wrong.");
                }
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
