/**
 * This js script is a script that shows pop up dialog while showing each
 * respective detail info (guest detail,user detail,rooms detail,roomtypes detail)
 */

$(document).ready(function() {
   $(document).on('click','.detail_anchor', function(event) {
		//prevent default action
		event.preventDefault();

		//show loader container
		$("#loader-container").show();

		//show loader
		$("#loader").show();

		//Get the modal
		var modal = document.getElementById("myModal");

		//Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		//Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		//When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			$("#myModal").fadeOut(1000);
		}

		//When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				$("#myModal").fadeOut(1000);
			}
		}

		//get url from currently clicked anchor and add it to a variable(processFile)
		var processFile = $(this).attr('href');

		//modify that variable(processFile)
		// processFile = "/ajax_"+processFile;

		//call loadPage function to show return value from controller
		loadPage(processFile);
   });

	//function providing an ajax call
   	function loadPage(PageRefInput) {
      	$.ajax({
			url: PageRefInput,
			type: "GET",
			dataType: 'text',
			success: function(response) {
				$('.modal-content div').html(response); //add response within the child div of class named ".modal-content"
				//show modal 0.5s later
				setTimeout(function() {
					$('.modal').fadeIn();
				},500);
			},
			error: function ( error ) {
				console.log('the page was NOT loaded', error); //show error messsage
			},
			complete: function( xhr, status ) {
				// remove loader effect
				$("#loader-container").fadeOut(1000);
				$("#loader").fadeOut(1000);
			}
		})
	}
});
