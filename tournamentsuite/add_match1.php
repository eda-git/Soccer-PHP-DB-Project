<?php// Initialize the sessionsession_start(); // If session variable is not set it will redirect to login pageif(!isset($_SESSION['username']) || empty($_SESSION['username'])){  header("location: login.php");  exit;}?><html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://code.getmdl.io/1.2.0/material.min.js"> </script> <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:700" rel="stylesheet"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"> 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
 <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.deep_purple-pink.min.css"><link rel="stylesheet" href="tabs.css"><link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><script src="https://code.jquery.com/jquery-1.12.4.js"></script><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script><script> $( function() { $( "#datepicker" ).datepicker(); } ); </script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  
  <script type="text/javascript" src="http://www.google.com/jsapi"> 
<script async="" src="//www.google-analytics.com/analytics.js">
</script>
<link rel="stylesheet" type="text/css" href="style.css"> 
<link rel="stylesheet" type="text/css" href="zoomfixes.css">


<script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.js">
</script> 
<script type="text/javascript" src="http://fiddle.jshell.net/js/lib/yui-min-3.3.0.js">
</script> 

<script src="//code.jquery.com/jquery-1.10.2.js">
</script> 
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js">
</script> 

<script type="text/javascript" src="http://absoluterad.com/sports/rssdisplayer.js">
</script> 
<script type="text/javascript">$(document).ready(function(){$("#loading_wrap").remove()});
</script>

</head>
<body>
<div id="top">
<div id="leftid">
<div id ="suiteid"> Tournament Suite </div> 
<div id="season">Season 2017-18</div>
</div> 

<div id="rightid">
<div id="teamlogo"></div> 
<div id="teamrightid">
<div id="loginname"><?php echo htmlspecialchars($_SESSION['username']); ?> <a href="logout.php" class="btn btn-danger">Log Out</a></div>
<hr id="rightidline"> </hr>
<div id="date"><script src="./js/date.js"></script></div>
</div>
</div>
</div>

<div id="nav">
<ul><script src="./js/menubar.js"></script>

</ul>
</div>

<div class="add_matches" id="middle">
  <form action="post_match.php" method="post" id='matchform'>Round: <input type="text" name="ROUND"><br>  <p>Date: <input type="text" name="DATE" id="datepicker"></p>   Away Team: <select name="AWAY">	  <?php        $con=mysqli_connect('server', 'username', 'password', 'db', 'port');// Check connectionif (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}$year = $_GET["year"];$querytest = 'select * from 2017teams order by Team';echo $querytest;$query = 'select * from 2017teams order by Team';$result = mysqli_query($con,  $querytest);while($row = mysqli_fetch_array($result)){echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';}mysqli_close($con);  ?>  </select>    Away League:  <select name="AWAY_LEAGUE">    <option value="mls">MLS</option>	    <option value="usl">USL</option>    <option value="nasl">NASL</option>	    <option value="pdl">PDL</option>			    <option value="npsl">NPSL</option>    <option value="usasa">USASA</option>  </select><BR>  Away Score: <input type='text' name='AWAY_SCORE'>  <br>  Home Team:<select name="HOME">	  <?php        $con=mysqli_connect('server', 'username', 'password', 'db', 'port');// Check connectionif (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}$year = $_GET["year"];$querytest = 'select * from 2017teams order by Team';echo $querytest;$query = 'select * from 2017teams order by Team';$result = mysqli_query($con,  $querytest);while($row = mysqli_fetch_array($result)){echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';}mysqli_close($con);  ?></select>  Home League: <select name="HOME_LEAGUE">    <option value="mls">MLS</option>	    <option value="usl">USL</option>    <option value="nasl">NASL</option>	    <option value="pdl">PDL</option>			    <option value="npsl">NPSL</option>    <option value="usasa">USASA</option></select><br>Home Score: <input type='text' name='HOME_SCORE'><br>Head Referee: <input type='text' name='REFEREE'><br>Attendance: <input type='text' name='ATTENDANCE'><br> Weather Description: <select name="WEATHER_DESC">    <option value="Clear">Clear</option>	    <option value="Partly Cloudy">Partly Cloudy</option>	    <option value="Cloudy">Cloudy</option>    <option value="Rain">Rain</option>	    			    <option value="Windy">Windy</option>    <option value="Overcast">Overcast</option>	<option value="Snow">Snow</option>			    <option value="Blizzard">Blizzard</option>	    <option value="Indoors">Indoors</option></select><br>Temperature (if Indoors, set to 68): <input type='text' name='TEMPERATURE'><br>   Players:   <div id="playerlist"> <br>   <input id='addplayer' type='button' value='+'>     <script>  /* PLAYER, DATE, GAMEID, HOME, TEAM, GK, STARTED, MINUTE SUBBED, SUBBED,   SUBBED IN ADDED TIME, PENALTY KICK GOALS, PENALTY KICK ATTEMPTS, SAVES, RED CARDS,   SECOND YELLOW CARD, GOALS, ASSISTS, OWN GOALS, MINUTES PLAYED, MANAGER, PLAYER  */    jQuery(function($) {      $('#addplayer').click(addAnotherTextBox);    function addAnotherTextBox() {    $("#matchform").append("<br><label>Player: <input name='player' type='text'> Date:");  }  });</script></div><br><input type="submit">   </form>


</div>

<div id="rightcard" style="display: none">

</div>
</div>

</div>



</body>
</head>
</html>