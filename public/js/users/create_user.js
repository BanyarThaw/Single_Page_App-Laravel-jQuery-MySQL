/**
 * This js script is a script that provides single page app effect when user creates new user
 */

$(document).ready(function() {
    $(document).on('click','#users button[type="submit"]', function (event) {
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
        processFile = "/ajax_"+processFile;

		//get name from input
        var name = $('input[name="name"]').val();

		//get email from input
        var email = $('input[name="email"]').val();

		//get password from input
        var password = $('input[name="password"]').val();

		//get password_again from input
        var password_again = $('input[name="password_again"]').val();

		//make an ajax call
        $.ajax({
            url: processFile,
            type: "POST",
            data: "name="+name+"&&email="+email+"&&password="+password+"&&password_again="+password_again+"&&_token="+csrf_token,
            dataType: 'text',
            success: function( response ) {
                $('.detail_info').html(response); //add response within class named "detail_info"

				//get header title content
                var title = $(".detail_info_header h4").text();

				//if title content is user list,works the code below
                if(title == 'User List')
                {
					//remove active effect and replace it with normal effect
                    $('.sub_menus').removeClass('sub_menus_active').addClass('sub_menus');
                    $('.sub_menus a').removeClass('sub_menu_anchor_active').addClass('sub_menu_anchor');

					//add active effect to users/list section
                    $('.sub_menus a[href="/users/list"]').parent().addClass('sub_menus_active');
                    $('.sub_menus a[href="/users/list"]').removeClass('sub_menu_anchor').addClass('sub_menu_anchor_active');
                    
					//change url from web browser
					$.ChangeUrl('Web Application','/users/list'); //custom jquery plugin
                    
					//add message to message dialog box
                    $('.message_dialog').text("New user created."); 
                }
                else {
                    //add message to message dialog box
                    $('.message_dialog').text("Something went wrong."); 
                }
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
});