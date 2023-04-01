/**
 * This js script is a script that toggles current user info and menu box(sub menus) 
 */

$(document).ready(function() {
	//toggle menu box(sub menus)
    $(document).on('click','.menu_icon',function(event) {
        //prevent default action
		event.preventDefault();
        //toggle
        if($(".wrap_sub_menu_mobile").first().is(":hidden")) {
            $(".wrap_sub_menu_mobile").slideDown("slow");
        } else {
            $(".wrap_sub_menu_mobile").slideUp("slow");
        }
    });
});
