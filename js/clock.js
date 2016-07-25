function updateClock()

{

  currentSeconds++;

  if(currentSeconds==60){

  	currentSeconds=0;

	currentMinutes++;

	if(currentMinutes==60){

	currentMinutes=0;

	currentHours++;

	if(currentHours==12){

	currentHours=1;

	}	

	}

  }

  currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

  // Convert an hours component of "0" to "12"

  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display

  var currentTimeString = (currentHours < 10 ? '0' : '') + currentHours + ":" + (currentMinutes < 10 ? '0' : '') + currentMinutes + ":" + (currentSeconds < 10 ? '0' : '') + currentSeconds ;

  // Update the time display

  document.getElementById("clock").innerHTML = currentTimeString;  

  setTimeout('updateClock();',1000);

}

