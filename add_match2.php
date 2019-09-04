<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add a Match</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>
<form id='matchform'>
  Away Team: <input type="text"> Away League:  <select name="league">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>


  </select>
  <br>
  Home Team: <input type="text"> Home League: <select name="league">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>


  </select>
   
   <br>
   Players:
   <div id="playerlist"> <br>
   <input id='addplayer' type='button' value='+'>
     <script>
  /* PLAYER, DATE, GAMEID, HOME, TEAM, GK, STARTED, MINUTE SUBBED, SUBBED, 
  SUBBED IN ADDED TIME, PENALTY KICK GOALS, PENALTY KICK ATTEMPTS, SAVES, RED CARDS, 
  SECOND YELLOW CARD, GOALS, ASSISTS, OWN GOALS, MINUTES PLAYED, MANAGER, PLAYER
  */

  
  jQuery(function($) {
  
  
  $('#addplayer').click(addAnotherTextBox);
  
  function addAnotherTextBox() {
    $("#matchform").append("<br><label>Player: <input type='text'> Date:");
  }
  
});
</script>


</div>

  </form>
 
 
</body>
</html>