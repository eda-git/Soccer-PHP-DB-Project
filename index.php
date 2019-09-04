
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link href="./css/queries.css" rel="stylesheet">
<link href="./css/teams.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=0.50, maximum-scale=1.0, user-scalable=no" />
<script src="./js/sorttable.js"></script>

</head>
   <body>
   <header><div id="menu" onclick="$('#mobilemenu').toggle();"><div id="menubar">
   </div><div id="menubar">
   </div><div id="menubar">
   </div></div>
<div id="logo"></div>
<ul><script src="./js/menuitems.js"></script>
</ul>

</header>
     <script src="./js/mobiletable.js"></script>
      
	  <div id="main">
	  <div id="details"><p id="timeremaining"></p>
<?php include 'lastgame.php';?>
<style>
div#lastgameteam {
    width: 50%;
    height: 63%;
    display: table;
    background: #FFF;
} div#lastgame { width: 100%; height: 211px; position: absolute; top: 79px; /* display: flex; */ left: 0; } div#lastgamefinal a {color #FFF;text-decoration: none;color: #FFF;}table#displaystats {margin-top: 204px;} div#lastgameheader {/* top: -18px; */position: absolute;margin-top: -5px;width: 100%;background: linear-gradient(to bottom, #565656 33%, #292929);color: gold;font-family: 'Oswald', sans-serif;text-align: center;}  div#teams { width: 100%; display: inline-flex; float: right; } div#content { width: 100%; display: inline-flex; float: left; } div#lastgamefinal {width: 100%;margin: 0 auto;/* border: 1px solid hsla(0, 0%, 0%, 1); */background: linear-gradient(to bottom, #9ea18c 33%, #6a6d5a);color: #FFF;font-size: 22px;text-shadow: 1px 1px #000;position: absolute;text-align: center;top: 77%;left: 0;right: 0;font-family: 'Oswald', sans-serif;}
</style>
	  
	  
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 25, 2018 11:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("timeremaining").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timeremaining").innerHTML = "EXPIRED";
    }
}, 1000);
</script></div>
<?php include 'wip.php';?>

	
	  <?php

      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = 'Select * from 2017teamdetail';
$query = 'select 2017teamdetail.GAMEID, 2017teamdetail.HOME, 2017teamdetail.AWAY, 2017teamdetail.year
from 2017playerdetail
INNER JOIN 2017teamdetail ON 2017teamdetail.gameid = 2017playerdetail.gameid
group by 2017teamdetail.gameid';
$result = mysqli_query($con,  $query);

echo "<style>table#displaystats { zoom: 122%; font-family: 'Roboto Condensed', sans-serif; text-align: center;  width: 100%; float: left; }</style>";
echo "<table class='sortable' id='displaystats'>
<tr id='headerrow'>
<th onclick='sortTable(0)'>GAMEID</th>
<th onclick='sortTable(1)'>AWAY</th>
<th onclick='sortTable(2)'>HOME</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo '<td><a href="boxscore.php?query=' . $row['GAMEID'] . '&year='.$row['year']. '">'. $row['GAMEID']. '</a>';
echo "<td>" . $row['AWAY'] . "</td>";
echo "<td>" . $row['HOME'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
  
?>

</div>
   </body>
</html>