/**
 * This js script is a script providing live search effect from search bar.
 */

$(document).ready(function() {
    var value; //global variable
    var anchor; //global variable

    $(document).on('input','#Search', function(event) {
		//show live search effect while loading
        $(".snippet").show();
		
		//get url form currently clicked element's class name and add it to 
		//a variable(processFile)
        var processFile = this.className;
		
		//modify that variable(processFile)
        processFile = "/ajax/"+processFile;

		//special case
        if(processFile == "/ajax/ajax_user_list")
        {
            anchor = "users";
        }
        else {
            anchor = "guests";
        }

		//get current search value
        value = $(this).val();

		//get csrf token for security reason
        var csrf_token = $("input[name='_token']").val();

        // call ajax method after 0.5 sec later (for online cases)
        setTimeout(function() { call_ajax(value,csrf_token,processFile);}, 500);

        // final check to search input
        var final_value = $("#Search").val();
        if(final_value == '') { // if null
            $("#search_results").hide(); // hide search results
        }
    });

    function call_ajax(value,csrf_token,processFile) {
        //make an ajax call
        $.ajax({
            type: "POST",
            url: processFile,                           
            data: "search="+value+"&&_token="+csrf_token,
            dataType: 'json',
            success: function(data) {
                show_search_results(data); //modify return data in "show_search_results" function
            },
            error: function(msg) {
                console.log(msg); //show error message
            }
        });
    }

	//function that show search results
    function show_search_results(data) {
        $("#search_results").show(); // testing
        $("#search_results").children().hide(); //hide it's child elements
        data.forEach((element) => {
            var id = element.id;
            var name = element.name;
            var highlighted_name = highlight(name); //highlight searched words
            if(anchor == "users") {
                $("#search_results").append("<div class='search_result_detail'><b><a href='/"+anchor+"/detail/"+id+"' class='user_detail_anchor detail_anchor'>"+highlighted_name+"</a></b></div>");
            } else {
                $("#search_results").append("<div class='search_result_detail'><b><a href='/"+anchor+"/"+id+"' class='user_detail_anchor detail_anchor'>"+highlighted_name+"</a></b></div>");
            }
        });
    }

	//function that highlight searched words form return
    function highlight(text) {
        //check word's character limit
        if(text.length > 15) {
            text = text.substring(0,7);
            text = text+"....";
        }
        var re = new RegExp(value, "gim"); // search for all instances
        var newText = text.replace(re, `<b class="highlight">$&</b>`);

        return newText;
    }
});
