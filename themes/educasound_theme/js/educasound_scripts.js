// _________ Modal window _________//

// Get the modal
var modal = document.getElementById('reserva_modal');

// Get the button that opens the modal
var trigger = document.getElementById("reserva_trigger");

// Get the <span> element that closes the modal
var close = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
trigger.onclick = function() {
	modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
close.onclick = function() {
	modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}