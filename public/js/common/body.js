/**
 * This js script is a script providing single page app effect for user experience. (for sub menus)
 */

$(document).ready(function() {
    $(document).on('click','#body a', function(event) {
        //prevent default action
        event.preventDefault();

        //show loader effect
        $("#loader-container").show();
        $("#loader").show();

        //get process file from anchor tag's herf
        var processFile = $(this).attr('href');

        //change url
        $.ChangeUrl('Web Application',processFile) //custom jquery plugin

        processFile = "/ajax_"+processFile; //modifying process file

        //load page using ajax method
        loadPage(processFile);

        //remove active effect from previously clicked sub menu (anchor tag)
        $('.sub_menus').removeClass('sub_menus_active').addClass('sub_menus');
        $('.sub_menus a').removeClass('sub_menu_anchor_active').addClass('sub_menu_anchor');

        //add active effect to currently clicked  sub menu (anchor tag)
        $(this).parent().addClass('sub_menus_active');
        $(this).addClass('sub_menu_anchor_active');
    });

    //function providing ajax call
    function loadPage(PageRefInput) {
        $.ajax({
            url: PageRefInput,
            type: "GET",
            dataType: 'text',
            success: function(response) {
                $('.detail_info').html(response); //add response within class named "detail_info"
            },
            error: function ( error ) {
                console.log('the page was NOT loaded', error); //show error message
            },
            complete: function( xhr, status ) {
                // remove loader effect
                $("#loader").fadeOut(1000);
                $("#loader-container").fadeOut(1000);

                /**
                 * for mobile view (menu icon is already hiddend in desktop and larger screen views)
                 * to remove category list box below menu icon after selecting category
                 */
                $(".wrap_sub_menu_mobile").hide();
            }
        })
    }
});
