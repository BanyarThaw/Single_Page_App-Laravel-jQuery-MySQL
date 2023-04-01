/**
 * This js script is a script providing active effect when you click anchor tag. (for header menus)
 */
 
$(document).ready(function() {
    $(document).on('click','#header a', function(event) {
		//get current url form web browser
        var url = document.location.pathname;
		
		//add that url to a variable(old_url)
        var old_url = url.split("/");

		//modify that variable(old_url)
        var remove_previous_url_effect = "#"+old_url[1];

        //special case (since roomtypes is under rooms menu anchor tag)
        if(remove_previous_url_effect == "#roomtypes") {
            remove_previous_url_effect = "#rooms";
        }

		//remove current url effect(to replace it with currently clicked url effect) 
        $(""+remove_previous_url_effect+"").hide();
        $(""+remove_previous_url_effect+"_mobile").hide();

		//get currently clicked url
        var processFile = $(this).attr('href');
		
		//add that url to a variable(pairs) 
        var pairs = processFile.split("/");

		//modify that variable(pairs)
        var active = "#"+pairs[1];
		
		//add currently clicked url effect
        $(""+active+"").show();
        $(""+active+"_mobile").show();

		//use custom jquery plugin to change the url of web browser
        $.ChangeUrl('Web Application',processFile) //custom jquery plugin
    });
});
