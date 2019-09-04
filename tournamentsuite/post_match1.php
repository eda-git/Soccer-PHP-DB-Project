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
</script><style>div#middle {    width: 98%;    margin-left: 1%;    background: #FFF;    margin-bottom: 3%;}</style>
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

<div id="middle"><?php$stringyear = $_POST[DATE];$dateline = explode("/",$_POST[DATE]);$year = $dateline[2];$round = $_POST[ROUND];$date = $_POST[DATE]; $awayteam = $_POST[AWAY];$awayscore = $_POST[AWAY_SCORE];$awayleague = $_POST[AWAY_LEAGUE];$hometeam = $_POST[HOME];$homescore = $_POST[HOME_SCORE];$homeleague = $_POST[HOME_LEAGUE];$temperature = $_POST[TEMPERATURE];$insertinfo = $round . ' ' . $date . ' '. $year . ' ' .  $awayteam. ' '. strtoupper($awayscore) . ' '. strtoupper($awayleague) . ' '. $hometeam. ' '. strtoupper($homescore) . ' '. strtoupper($homeleague) . ' ' .  strtoupper($temperature) ;echo $insertinfo;echo $_POST(player);?>

</div>

<div id="rightcard" style="display: none">

</div>
</div>

</div>



</body>
</head>
</html>