
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link href="./css/boxscorefix.css" rel="stylesheet">

<link href="./css/teams.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=0.28, maximum-scale=1.0, user-scalable=no" />
<script src="./js/sorttable.js"></script>
<?php
   if( $_GET["query"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_GET['query'];

$result = mysqli_query($con,  "select * from 2017teamdetail where gameid ='" . $user . "'");


while($row = mysqli_fetch_array($result))
{


echo "<title> " .  $row['AWAY'] . " vs. " . $row['HOME'] . " </title>" ;





}


mysqli_close($con);
   }
?>
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
	   
	  <?php
   if( $_GET["query"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_GET['query'];
$GLOBALS['year'] = $_GET['year'];
if ( $year ){
	$mysqlquery = "select * from 2017teamdetail where gameid ='" . $user . "' and year ='" . $year . "'";
}else {
	$mysqlquery = " ";
}
$result = mysqli_query($con, $mysqlquery);


while($row = mysqli_fetch_array($result))
{
$penalties = $row['PK'];
$aet = $row['AET'];
if ($penalties == 'TRUE') {
    $status = 'Final/PK: ' . $row['AWAY_PK'] . '-' . $row['HOME_PK'];
} elseif ($aet == "TRUE") {
    $status = 'Final/AET';
} else {
    $status = 'Final';
}
echo "<div id='tournament'><div id='year'>" . $row['YEAR'] . " US Open Cup</div>";
echo "<table id='scoreline'><tbody><tr>";

echo "<td id='team' class='away'>" . ' ' . "</td>";
echo "<td id='scorebox' class='away'>" . $row['AWAY_SCORE'] . "</td>";
echo "<td id='scorebox' class='home'>" . $row['HOME_SCORE'] . "</td>";

echo "<td id='team' class='home'>" . ' ' . "</td>";
echo "</tbody></table>";
echo "<div id='final'>" . $status . "</div>";
echo '<div id="friv">Referee: ' . $row['REFEREE'] . '<br>Attendance: ' . $row['ATTENDANCE'];
echo "</div>";


}


mysqli_close($con);
   }
?>



<?php
   if( $_GET["query"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_GET['query'];

$away = mysqli_query($con,  "select Name, Goals, Assists, Yellow_Card, Second_Yellow, Red_Card, Team from 2017playerdetail where HOME = 'FALSE' and GK = 'FALSE' and PLAYER = 'TRUE' and year(date) ='" . $year . "' and gameid ='" . $user . "'");
$home = mysqli_query($con,  "select Name, Goals, Assists, Yellow_Card, Second_Yellow, Red_Card, Team from 2017playerdetail where HOME = 'TRUE' and GK = 'FALSE' and PLAYER = 'TRUE' and year(date) ='" . $year . "' and gameid ='" . $user . "'");
$awaygk = mysqli_query($con,  "select Name, Goals, Assists, Saves, Team from 2017playerdetail where HOME = 'FALSE' and GK = 'TRUE' and year(date) ='" . $year . "' and gameid ='" . $user . "'");
$homegk = mysqli_query($con,  "select Name, Goals, Assists, Saves, Team from 2017playerdetail where HOME = 'TRUE' and GK = 'TRUE' and year(date) ='" . $year . "' and gameid ='" . $user . "'");
$awayteam = mysqli_fetch_array($away)['Team'];
$hometeam = mysqli_fetch_array($home)['Team'];
$homestats = mysqli_query($con,  "select SHOTS, SAVES, CORNERS, FOULS, OFFSIDE from teamstats where TEAM = '". $hometeam  . "' and year ='" . $year . "' and GK = 'TRUE' and gameid ='" . $user . "'");

$awayteamname = mysqli_query($con,  "select Team, Image, Color from 2017teams where team like '" . $awayteam. "'");


$hometeamname = mysqli_query($con,  "select Team, Image, Color from 2017teams where team like '" . $hometeam. "'");


while($row = mysqli_fetch_array($awayteamname))
{
	 $GLOBALS['awayimage'] = $row['Image'];
	$GLOBALS['awaycolor'] = $row['Color'];
	$GLOBALS['awayteam'] = $row['Team'];
}

while($row = mysqli_fetch_array($hometeamname))
{
	$homeimage = $row['Image'];
	$homecolor  = $row['Color'];
}

echo '
<div id="background">
<div id="gradientbottom">
</div>
<div class="bggradient" style="background: linear-gradient(to right, ' . $awaycolor . ' 0%, ' . $homecolor . ' 100%);">
</div>
<div>
<div class="backgroundlogo bglogo1">
<span class="ImageLogo logo-image">
<img src="../ussoc/img/' . $awayimage .  '.png" alt="'. $awayteam . '" style="height: 212px; margin-top: 58px;">
</span>
</div>
<div class="backgroundlogo bglogo2">
<span class="ImageLogo logo-image">
<img src="../ussoc/img/' . $homeimage .  '.png" alt="'. $hometeam . '" style="height: 212px; margin-top: 58px;">
</span>
</div>
</div>
</div>';
$outfield = "
<tr id='headerrow'>
<th onclick='sortTable(0)'>Name</th>
<th onclick='sortTable(1)'>Goals</th>
<th onclick='sortTable(2)'>Assists</th>
</tr>
";

$goalkeepers = "
<tr id='headerrow'>
<th onclick='sortTable(0)'>&nbsp;</th>
<th onclick='sortTable(1)'>Team</th>
<th onclick='sortTable(2)'>Name</th>
<th onclick='sortTable(3)'>Saves</th>
</tr>
";

$GLOBALS['teamstats'] = "
<tr id='headerrow'>
<th onclick='sortTable(0)'>&nbsp;</th>
<th onclick='sortTable(1)'>Shots</th>
<th onclick='sortTable(2)'>Saves</th>
<th onclick='sortTable(3)'>Corners</th>
<th onclick='sortTable(4)'>Fouls</th>
<th onclick='sortTable(5)'>Offside</th>

</tr>
";


echo "<style>td#team.away { margin-left: 148px; background: url(../ussoc/img/" . $awayimage . ".png) " . $awaycolor . " no-repeat center; background-size: contain; }</style>";
echo "<style>td#team.home { margin-left: 2px; background: url(../ussoc/img/" . $homeimage . ".png) " . $homecolor . " no-repeat center; background-size: contain; }</style>";
echo "<style> div#teamlogo.away { background: url(../ussoc/img/" . $awayimage .  ".png) " . $awaycolor . " no-repeat center; background-size: contain;} </style>";
echo "<style> div#teamlogo.home { background: url(../ussoc/img/" . $homeimage .  ".png) " . $homecolor . " no-repeat center; background-size: contain;} </style>";
$GLOBALS['awayimage'] = $awayimage; 
$GLOBALS['homeimage'] = $homeimage; 

echo "
<script>
  var colorThief = new ColorThief();
var colors = colorThief.getColor('../img" . $awayimage. ".png');
document.write(colors);
</script>
";

 

echo "<div id='boxscore'>";
echo "<div id='outfieldplayers'>";
echo "<div id='playerstats'><div id='team'><div id='teamlogo' class='away'></div><a href='http://students.washington.edu/edali/ussoc/teams/index.php?team="  . $awayimage . "&year=". $year . "'> " . mysqli_fetch_array($away)['Team'] . "</a></div>";
echo "<table id='playerstatstable'><tbody>"; 
echo $outfield;
while($row = mysqli_fetch_array($away))
{
$yellows = $row['Yellow_Card'] + $row['Second_Yellow'];
if(strpos($yellows, '2') !== false){
	$yellowcardtotal = "<div class='yellows'></div>";
}elseif(strpos($yellows, '1') !== false){
	$yellowcardtotal = "<div class='yellows'></div>";
}else{
	$yellowcardtotal = "";
}

$red = $row['Red_Card'];
if(strpos($red, '1') !== false){
	$redcardtotal = "<div class='red'></div>";
}else{
	$redcardtotal = "";
}

echo "<tr>";

echo "<td id='playernames' class='away'>" .  $redcardtotal . $yellowcardtotal .  $row['Name'] . "</td>";
echo "<td id='playernumbers' class='away'>" . $row['Goals'] . "</td>";
echo "<td  id='playernumbers' class='away'>" . $row['Assists'] . "</td>";

echo "</tr>";


}

echo "</table>";
echo "</div>";

echo "<div id='playerstats'><div id='team'><div id='teamlogo' class='home'></div><a href='http://students.washington.edu/edali/ussoc/teams/index.php?team="  . $homeimage . "&year=". $year . "'> " . mysqli_fetch_array($home)['Team'] . "</a></div>";
echo "<table id='playerstatstable'><tbody>"; 
echo $outfield;
while($row = mysqli_fetch_array($home))
{
$yellows = $row['Yellow_Card'] + $row['Second_Yellow'];
if(strpos($yellows, '2') !== false){
	$yellowcardtotal = "<div class='yellows'></div><div class='red'></div>";
}elseif(strpos($yellows, '1') !== false){
	$yellowcardtotal = "<div class='yellows'></div>";
}else{
	$yellowcardtotal = "";
}
$red = $row['Red_Card'];
if(strpos($red, '1') !== false){
	$redcardtotal = "<div class='red'></div>";
}else{
	$redcardtotal = "";
}
echo "<tr>";

echo "<td id='playernames' class='away'>" . $yellowcardtotal .  $row['Name'] . "</td>";
echo "<td id='playernumbers' class='away'>" . $row['Goals'] . "</td>";
echo "<td  id='playernumbers' class='away'>" . $row['Assists'] . "</td>";

echo "</tr>";


}

echo "</table>";
echo "</div>";
echo "</div>";
echo "<style> td#goalkeeperlogos.awayteam { background: url(../ussoc/img/" . $awayimage .  ".png) " . $awaycolor . " no-repeat center; background-size: contain;} </style>";
echo "<style> td#goalkeeperlogos.hometeam { background: url(../ussoc/img/" . $homeimage .  ".png) " . $homecolor . " no-repeat center; background-size: contain;} </style>";

echo "<div id='goalkeepers_sum'>";
echo "<table class='keepers' id='playerstatstable'><tbody>"; 
echo $goalkeepers;
while($row = mysqli_fetch_array($awaygk))
{

echo "<tr>";
echo "<td id='goalkeeperlogos' class='awayteam'></td>";
echo "<td id='playernames' class='teamname'>" . $row['Team'] . "</td>";
echo "<td id='playernames' class='away'>" . $row['Name'] . "</td>";
echo "<td id='playernumbers' class='away'>" . $row['Saves'] . "</td>";
echo "</tr>";


}
echo "</div>";


while($row = mysqli_fetch_array($homegk))
{

echo "<tr>";
echo "<td id='goalkeeperlogos' class='hometeam'></td>";
echo "<td id='playernames' class='teamname'>" . $row['Team'] . "</td>";
echo "<td id='playernames' class='home'>" . $row['Name'] . "</td>";
echo "<td id='playernumbers' class='home'>" . $row['Saves'] . "</td>";
echo "</tr>";


}

echo "</table>";
echo "</div>";
echo "</div>";

mysqli_close($con);
   }
?>
 <?php
   if( $_GET["query"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_GET['query'];

$homestats = mysqli_query($con,  "select * from teamstats where  home='true' and gameid ='" . $user . "'");
$awaystats = mysqli_query($con,  "select * from teamstats where  home='false' and gameid ='" . $user . "'");
echo "<style> td#teamstats.hometeam { background: url(../ussoc/img/" . $homeimage .  ".png) " . $homecolor . " no-repeat center; background-size: contain;} </style>";
echo "<style> td#teamstats.awayteam { background: url(../ussoc/img/" . $awayimage .  ".png) " . $awaycolor . " no-repeat center; background-size: contain;} </style>";

echo "<div id='team_sum'>";
echo "<table class='stats' id='playerstatstable'><tbody>";
echo $teamstats; 
while($row = mysqli_fetch_array($awaystats))
{
echo "<tr>";
echo "<td id='teamstats' class='awayteam'></td>";
echo  "<td id='numbers'>" . $row['SHOTS'] . "</td><td id='numbers'> " .  $row['SAVES'] . "</td><td id='numbers'>" . $row['CORNERS'] . " </td><td id='numbers'>" . $row['FOULS'] . "</td><td id='numbers'> " . $row['OFFSIDE'] . "</td>" ;
echo "</tr>";
}
while($row = mysqli_fetch_array($homestats))
{
echo "<tr>";
echo "<td id='teamstats' class='hometeam'></td>";
echo  "<td id='numbers'>" . $row['SHOTS'] . "</td><td id='numbers'> " .  $row['SAVES'] . "</td><td id='numbers'>" . $row['CORNERS'] . " </td><td id='numbers'>" . $row['FOULS'] . "</td><td id='numbers'> " . $row['OFFSIDE'] . "</td>" ;
echo "</tr>";
}

echo "</tbody></table>";
echo "</table>";
echo "</div>";
echo "</div>";


mysqli_close($con);
   }
?>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("displaystats");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</div>
   </body>
</html>