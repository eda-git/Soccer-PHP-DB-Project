
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="../css/default.css" rel="stylesheet">
<link href="../css/teams.css" rel="stylesheet">
<link href="../css/queries.css" rel="stylesheet">

</head>
   <body>
   <header><div id="menu" onclick="$('#mobilemenu').toggle();"><div id="menubar">
   </div><div id="menubar">
   </div><div id="menubar">
   </div></div>
<div id="logo"></div>
<ul><script src="../js/menuitems.js"></script>
</ul>

</header>
     <script src="../js/mobiletable.js"></script>
      
	
	  <div id="main">
	  
<?php
$GLOBALS['teams'] = $_GET["team"];
$GLOBALS['year'] = $_GET["year"];

 if( $teams ) {
	 $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
		$teaminfo = mysqli_query($con,  "select * from 2017teams where image like '" . $teams. "'");
while($row = mysqli_fetch_array($teaminfo))
{
	 $GLOBALS['Image'] = $row['Image'];
	$GLOBALS['Color'] = $row['Color'];
	$GLOBALS['Team'] = $row['Team'];
	$GLOBALS['City'] = $row['City'];
	$GLOBALS['State'] = $row['State'];
	$GLOBALS['Stadium'] = $row['Stadium'];

		$GLOBALS['League'] = $row['League'];

	}
	 echo '<style>div#teamimage{ background: url(../img/'.$Image.'.png) '. $Color . ' no-repeat center; background-size: contain; }</style>';
	 echo '<div id="team_info"><div id="teamimage">
</div>
<div id="teamname">
        '. $year . ' '. $Team . ' US Open Cup performance</div>
</div>';


 }else {
	  $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
		$teaminfo = mysqli_query($con,  "select * from 2017teams");
		echo '<form action="index.php" method="get">';
		echo '<select name="team">';
while($row = mysqli_fetch_array($teaminfo))
{
	echo '<option value="'. $row['Image'] . '">' . $row['Team']  . '</option>';

}
echo '</select> <input type="submit">
';
echo '</form>';
 }
	 mysqli_close($con);

?>

<?php
 $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
		
$script = "select * 
from 2017teamdetail
where home like '" . $Team . "' or away like '" . $Team . "'
order by gameid desc
limit 1";


echo '<div id="team_notes">
    <div>City: ' . $City  . '</div>
        <div>State: ' . $State  . ' </div>
        <div>League: ' . $League  . '  </div>
  <div>Stadium:  ' . $Stadium  . ' </div>
</div>'

?>

<?php
$con=mysqli_connect('server', 'username', 'password', 'db', 'port');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$script = "select * 
from 2017teamdetail
where home like '" . $Team . "' or away like '" . $Team . "'
order by gameid desc
limit 1";

$result = $con->query($script);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $GLOBALS['lastgame'] =  $row["GAMEID"];
    }
} else {
    echo "0 results";
}
$con->close();
?>
<?php
$con=mysqli_connect('server', 'username', 'password', 'db', 'port');

$result = mysqli_query($con,  "select * from 2017teamdetail where gameid ='" . $lastgame . "'");


while($row = mysqli_fetch_array($result))
{
	$GLOBALS['AWAYTEAM'] = $row['AWAY'];
		$GLOBALS['AWAY_SCORE'] = $row['AWAY_SCORE'];
$GLOBALS['HOMETEAM'] = $row['HOME'];
$GLOBALS['year'] = $row['YEAR'];

		$GLOBALS['HOME_SCORE'] = $row['HOME_SCORE'];
		$penalties = $row['PK'];
$aet = $row['AET'];
if ($penalties == 'TRUE') {
    $status = 'Final/PK: ' . $row['AWAY_PK'] . '-' . $row['HOME_PK'];
} elseif ($aet == "TRUE") {
    $status = 'Final/AET';
} else {
    $status = 'Final';
}

}

$result = mysqli_query($con,  "select * from 2017teams where team ='" . $AWAYTEAM . "'");
while($row = mysqli_fetch_array($result))
{
	$GLOBALS['AWAYCOLOR'] = $row['Color'];
	$GLOBALS['AWAYIMAGE'] = $row['Image'];
}

$result = mysqli_query($con,  "select * from 2017teams where team ='" . $HOMETEAM . "'");
while($row = mysqli_fetch_array($result))
{
	$GLOBALS['HOMECOLOR'] = $row['Color'];
	$GLOBALS['HOMEIMAGE'] = $row['Image'];
}

echo '<div id="lastgame">
<div id="lastgameheader">Last Game Played</div>
    <div id="teams"><div id="lastgameteam" class="away">
    &nbsp;
    </div><div id="lastgameteam" class="home">
	&nbsp;
    </div></div>

<div id="content">
    <div id="score" class="away"> ' . $AWAY_SCORE . ' </div><div id="score" class="home"> ' . $HOME_SCORE . '  </div>
<div>
        <div id="lastgamefinal"><a href="../boxscore.php?query='. $lastgame .'&year='. $year. '" target="_blank"> ' . $status .  '</a></div>
</div></div>
	
    
    
    
</div>'; 	



 echo "<style>div#lastgameteam.home { background: url(../img/" . $HOMEIMAGE . ".png) " . $HOMECOLOR . " no-repeat center; background-size: contain; }</style>";
 echo "<style>div#lastgameteam.away { background: url(../img/" . $AWAYIMAGE . ".png) " . $AWAYCOLOR . " no-repeat center; background-size: contain; }</style>";

?>


 <?php include '../wip.php';?>
<?php
$GLOBALS['year'] = $_GET["year"];
 if( $year ) {
$query = "select Name, Team,  sum(`Penalty Kick Goals`) as `Penalty Kick Goals`, sum(`Penalty Kick Attempts`) as `Penalty Kick Attempts`, sum(Saves) as Saves, sum(Red_Card) as Red_Card, (sum(Second_Yellow)+sum(Yellow_Card)) as `Total Yellows`, sum(Goals) as Goals, sum(Assists) as Assists, sum(`Own Goals`) as `Own Goals`, sum(`Minutes Played`) as `Minutes Played`
from 2017playerdetail
where team = '". $Team  ."' and year(date) = '" . $year ."' and player = 'True' and GK ='False'
group by Name";
	 $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
$query1 = "select *
from 2017teamdetail
where (AWAY = '" . $Team . "' or HOME = '" . $Team . "') and YEAR = '" . $year . "'
order by gameid desc
";

$result = mysqli_query($con,  $query1);
echo "<div id='header'>". $year . " Matches</div>";
 
echo "<table id='displaystats'>
<tr id='headerrow'>
<th onclick='sortTable(0)'>Round</th>
<th onclick='sortTable(1)'>YEAR</th>
<th onclick='sortTable(2)'>DATE</th>
<th onclick='sortTable(3)'>VENUE</th>
<th onclick='sortTable(4)'>GAMEID</th>
<th onclick='sortTable(5)'>AWAY</th>
<th onclick='sortTable(6)'>HOME</th>
<th onclick='sortTable(7)'>AWAY LEAGUE</th>
<th onclick='sortTable(8)'>HOME LEAGUE</th>
<th onclick='sortTable(9)'>AWAY SCORE</th>
<th onclick='sortTable(10)'>HOME SCORE</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ROUND'] . "</td>";
echo "<td>" . $row['YEAR'] . "</td>";
echo "<td>" . $row['DATE'] . "</td>";
echo "<td>" . $row['VENUE'] . "</td>";
echo '<td><a href="../boxscore.php?query=' . $row['GAMEID'] . '&year=' . $year . '">'. $row['GAMEID']. '</a>';
echo "<td>" . $row['AWAY'] . "</td>";
echo "<td>" . $row['HOME'] . "</td>";
echo "<td>" . $row['AWAY_LEAGUE'] . "</td>";
echo "<td>" . $row['HOME_LEAGUE'] . "</td>";
echo "<td>" . $row['AWAY_SCORE'] . "</td>";
echo "<td>" . $row['HOME_SCORE'] . "</td>";

echo "</tr>";
}
echo "</table>";
	 

$con=mysqli_connect('server', 'username', 'password', 'db', 'port');

$result = mysqli_query($con,  $query);
echo "<div id='header'>Outfield Player Stats</div>";

echo " <table class='sortable' id='results'> 
<tbody>
    <tr><th>Name</th><th>Goals</th><th>Assists</th><th>Red Cards</th><th>Total Yellows</th></tr>
    ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Goals'] . "</td>";
echo "<td>" . $row['Assists'] . "</td>";
echo "<td>" . $row['Red_Card'] . "</td>";
echo "<td>" . $row['Total Yellows'] . "</td>";

		echo "</tr>";
	}
} else {
    echo "";
}

echo "</tbody>
</table>";

$con=mysqli_connect('server', 'username', 'password', 'db', 'port');
$query = "select Name, Team,  sum(`Penalty Kick Goals`) as `Penalty Kick Goals`, sum(`Penalty Kick Attempts`) as `Penalty Kick Attempts`, sum(Saves) as Saves, sum(Red_Card) as Red_Card, (sum(Second_Yellow)+sum(Yellow_Card)) as `Total Yellows`, sum(Goals) as Goals, sum(Assists) as Assists, sum(`Own Goals`) as `Own Goals`, sum(`Minutes Played`) as `Minutes Played`
from 2017playerdetail
where team = '". $Team  ."' and year(date) = '" . $year ."' and player = 'True' and GK ='True'
group by Name";
$result = mysqli_query($con,  $query);
echo "<div id='header'>Goalkeeper Stats</div>";

echo " <table class='sortable' id='results'> 
<tbody>
    <tr><th>Name</th><th>Saves</th></tr>
    ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Saves'] . "</td>";

		echo "</tr>";
	}
} else {
    echo "";
}

echo "</tbody>
</table>";

 }else {
	 
	 $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
$query = "select *
from 2017teamdetail
where AWAY = '" . $Team . "' or HOME = '" . $Team . "' 
order by gameid desc
limit 1";

echo "<div id='header'>Years in the US Open Cup</div>";

$result = mysqli_query($con,  $query);
echo " <table class='sortable' id='results'> 
<tbody>
    <tr><th>Year</th><th>Last Round</th></tr>
    ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		$yearfinder = $row['YEAR'];
		
echo "<td><a href='http://students.washington.edu/edali/ussoc/teams/index.php?team=". $teams ."&year=". $yearfinder . "'>" . $yearfinder . "</a></td>";
echo "<td>" . $row['ROUND'] . "</td>";

		echo "</tr>";
	}
} else {
    echo "";
}

echo "</tbody>
</table>";
	 
 }
?>
</div>


</div>
   </body>
</html>