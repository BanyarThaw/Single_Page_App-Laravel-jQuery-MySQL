/**
 * This js script is a custom jquery plugin script that changes url form web browser without reloading web page.
 */

(function($) {
    //Extends  the jQuery object to change URL
    $.ChangeUrl = function (title,url) {
        if (typeof(history.pushState) != "undefined") {
            var obj = { Title: title, Url:url };
            history.replaceState(obj,obj.Title,obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
    }
})(jQuery);