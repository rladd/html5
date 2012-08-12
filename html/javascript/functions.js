
/*
 *  Display the info box for the specified item and change the rollover
 *  state for the icon.
*/
function showInfo(strBase) {

   // Initiate our vars
   var objIcon = null;

   // Load our objects
   objIcon           = document.getElementById(strBase + 'Icon');
   objInfo           = document.getElementById(strBase + 'Info');


   // Show the highlighted icon
   objIcon.src             = "images/icon_info_on.png";

   // Show the info div
   objInfo.style.display   = 'inline';

}

function showReset(strBase) {

   // Initiate our vars
   var objIcon = null;

   // Load our objects
   objIcon = document.getElementById(strBase + 'Icon');
   objInfo = document.getElementById(strBase + 'Info');

   // Return the icon to it's normal state
   objIcon.src = "images/icon_info.png";

   // Hide the info div
   objInfo.style.display = 'none';

}




