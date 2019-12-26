
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link rel="shortcut icon" href="http://thecup.us/favicon.ico" type="image/x-icon">
<script src="./js/sorttable.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script> $( function() { $( "#datepicker" ).datepicker(); } ); 
$( function() { $( "#datepicker2" ).datepicker(); } );</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="./js/table.js"></script>
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

 <div id="pgf">
<form action="pgf.php">
    <div id="columns"><div>
        <input type="radio" name="match" value="single" style="visibility: visible;" checked=""> Single Game
<br>
<input type="radio" name="match" value="cumulative" style="visibility: visible;"> Combined Games
    </div>
<div id="selector" class="year">
    Date:<br>
    <div><select id="DATE_MIN" name="DATE_MIN">
	<option value="2017" selected="">2017</option>
	</select>
</div>
<div>
    to
</div>
    <div>
   
<select id="DATE_MAX" name="DATE_MAX">
	<option value="2017" selected="">2017</option>
	</select>   

    </div></div><div id="selector" class="year">
	Round:<br>
    <div><select id="round_min" name="round_min">
	<option value="" selected="">1</option>
	<option value="2">2</option><option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option><option value="7">7</option>
<option value="8">8</option>

</select>
</div>
<div>
    to
</div>
    <div><br>
    <select id="round_max" name="round_max" class="no_chosen">
			

			<option value="1">1</option>
	<option value="2">2</option><option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option><option value="7">7</option>
<option value="8" selected="">8</option>

</select>
    </div>
</div><div><br>

        </div></div><div id="columns">
<div id="selector" class="year">
    <div>Player's Team  <br><select id="team" name="team" class="no_chosen">
	<option value="" selected="">All Teams</option>
	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
	  </select>

	</div>

    </div><div><br>
    <br><input type="radio" name="location" value="home">Home
    <br><input type="radio" name="location" value="away">Away<br>
  <input type="radio" name="location" value="" checked="">Either<br>
        </div></div><div id="columns">
<div id="selector" class="year">
    <div>Opponent  <br><select id="opponent" name="opponent" class="no_chosen">
	<option value="" selected="">All Teams</option>
	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
	  </select>

	</div>

    </div><div><br>
    <br><input type="radio" name="result" value="Win">Wins
    <br><input type="radio" name="result" value="Loss">Loss<br>
  <input type="radio" name="result" checked value="">Either<br>
        </div></div>
<div id="columns">


<div><div>
	<select name="c1stat" id="c1stat">
		<option value="">Choose</option>
		
		
		<option value="Goals">Goals</option>
		
		<option value="Assists">Assists</option>
		
		<option value="Minutes Played">Minutes Played</option>
<option value="Yellow_Card+Second_Yellow">Yellow Card</option>
<option value="Red_Card">Red Card</option>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</select>
		
        <select name="c1comp" id="c1comp" class="criteria-comp">
              
              <option value="greaterthan">&gt;=</option>
	      
              <option value="lessthan">&lt;=</option>
	      
              <option value="equal">=</option>
	      
	</select>

 	<input type="text" name="c1val" id="c1val" value="" size="4" class="criteria-val">
</div><div>Sort by<br><select id="orderby" name="orderby" class="no_chosen">
	
	<option value="goals">Goals</option>
    	<option value="assists">Assists</option>

    	<option value="Minutes Played">Minutes Played</option>

    	<option value="Red_Card">Red Card</option>
        	<option value="Yellow_Card+Second_Yellow">Yellow Card</option>


</select>
</div>
  <input type="submit" value="Submit">

</div></div></form>
</div>

 

<?php
   if( $_GET["DATE_MIN"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//c1stat=&c1comp=greaterthan&c1val=
/*
DATE_MIN=2017&DATE_MAX=2017
&round_min=&round_max=8
&playervalue=outfield
&team=AFC+Cleveland
&location=
&opponent=Atlanta+United&result=&c1stat=goals&
c1comp=greaterthan&c1val=2&orderby=goals
*/
$minimumdate = $_GET["DATE_MIN"];
$maximumdate = $_GET["DATE_MAX"];
$match_type = $_GET["match"];


$c1comp = $_GET["c1comp"];
if(strpos($c1comp, 'greaterthan') !== false){
	$comparison = ">=";
}elseif(strpos($c1comp, 'lessthan') !== false){
	$comparison = "<=";
}else{
	$comparison = "=";
}
$round_min = strlen($_GET['round_min']);
$maximumround = $_GET["round_max"];
if(strpos($round_min, '0') !== false){
	$minimumround = "1";
}else{
	$minimumround =  $_GET['round_min'];
}
/*echo $clcomp;
echo $minimumround;
*/
$datebetween = "between " . $minimumdate . " and " . $maximumdate;
$c1val = $_GET["c1val"];
$c1stat = $_GET["c1stat"];
$teamfinder = $_GET["team"];
$result = $_GET["result"];

$false = "'False'";
$location = $_GET["location"];
$order = $_GET["orderby"];
echo $location;
if (strpos($location, 'home') !== false){
	$locationassignment = "'True'";
	$combinedassignment = "(Team = 2017teamdetail.Home)";
}elseif (strpos($location, 'away') !== false){
	$locationassignment = 'False';
	$combinedassignment = "(Team = 2017teamdetail.Away)";
}else { 
$locationassignment = 'False or True';
$combinedassignment = "(Team = 2017teamdetail.Away or Team = 2017teamdetail.Home)";
}

if(empty($teamfinder)){
	$teamqueries = "";
	} else {  
	$teamqueries = "and 2017playerdetail.Team = '".$teamfinder."'"; 
	}

if(strpos($result, 'Win') !== false){
	$resultquery = " 
	 and (IF(2017teamdetail.HOME_SCORE>2017teamdetail.AWAY_SCORE, 2017teamdetail.home, 2017teamdetail.away) = 2017playerdetail.Team
 or IF(2017teamdetail.HOME_SCORE<2017teamdetail.AWAY_SCORE, 2017teamdetail.away, 2017teamdetail.home) = 2017playerdetail.Team)
";}elseif(strpos($result, 'Loss') !== false){
	$resultquery = " 
 and (IF(2017teamdetail.HOME_SCORE<2017teamdetail.AWAY_SCORE, 2017teamdetail.home, 2017teamdetail.away) = 2017playerdetail.Team
 or IF(2017teamdetail.HOME_SCORE>2017teamdetail.AWAY_SCORE, 2017teamdetail.away, 2017teamdetail.home) = 2017playerdetail.Team)";}
	 else {  
	$resultquery = "";}


if(empty($clval)){
$finalclval = 0;
} else {
	$finalclval = $clval; 
}

if(empty($c1stat)){
	$finalc1stat = ucfirst($order);
} else {
	$finalc1stat = $c1stat; 
}
	

	
$combined = "Select Name, Team, sum(`" . $finalc1stat ."`) as '" . $finalc1stat . "'
, 2017teamdetail.Away, 2017teamdetail.Home, IF(2017teamdetail.HOME_SCORE>2017teamdetail.AWAY_SCORE, 2017teamdetail.home, 2017teamdetail.away) as 'Winner' from 2017playerdetail

INNER JOIN 2017teamdetail ON 2017teamdetail.GAMEID = 2017playerdetail.GAMEID 
where Player = 'True' " . $teamqueries . " and (year(2017playerdetail.date) between'" . $minimumdate . "' and '" . $maximumdate . "') and " . $combinedassignment . "
group by name, `". $finalc1stat ."`
order by sum(`". $finalc1stat .  "`) desc";


echo $combined;


$querystring = "select 
Year,
2017teamdetail.Round as 'Round',
Name,  
2017teamdetail.GAMEID as 'GAMEID',
2017playerdetail.TEAM, 
2017playerdetail.date,
2017teamdetail.Date, 
IF(2017teamdetail.HOME_SCORE>2017teamdetail.AWAY_SCORE, 2017teamdetail.home, 2017teamdetail.away) as 'Winner',
2017teamdetail.Home, 
2017teamdetail.Away, 
Goals, 
Assists, 
`Minutes Played`
from 2017playerdetail
INNER JOIN 2017teamdetail ON 2017teamdetail.GAMEID = 2017playerdetail.GAMEID
where (2017playerdetail.HOME = ".$locationassignment.") and Player = 'True' "  . $teamqueries . $resultquery . "  and (year(2017playerdetail.date) between'" . $minimumdate . "' and '" . $maximumdate . "') and (Round BETWEEN " . $minimumround . " and " . $maximumround ." ) and `" .  $finalc1stat  . "` " .  $comparison . " " . $finalclval  . " order by `" . $order . "` desc";



if(strpos($match_type, 'single') !== false){
	


$result = $con->query($querystring);

echo " <table class='sortable' id='results'> 
<tbody>
    <tr><th>Round</th><th>Date</th><th>Player</th><th>Team</th><th>" .$finalc1stat ."</th><th>Opponent</th></tr>
    ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$team = $row["TEAM"];
		$date = $row['Date'];
		$year = substr($date, 0, 4);
		$gameid = $row["GAMEID"];
		$hometeam = $row["Home"];
		$awayteam = $row["Away"];
		$stringcomp = strcmp($team, $hometeam);
		if ($stringcomp === 0) { $opp = $awayteam;} else { $opp = $hometeam;}
		echo "<tr>";
        echo "<td>" . $row["Round"]. "</td><td><a href='boxscore.php?query=". $gameid  ."&year=". $year. "' target='_blank'> " . $row['Date'] . "</a></td><td> " . $row["Name"] . "</td><td>" . $row["TEAM"]. " </td><td>" . $row[$finalc1stat] .  "</td><td>" . $opp . "</td>" ;
    echo "</tr>";
	}
} else {
    echo "0 results";
}

echo "</tbody>
</table>";
}else {
	$result = $con->query($combined);

echo " <table class='sortable' id='results'> 
<tbody>
    <tr><th>Player</th><th>Team</th><th>" .$finalc1stat ."</th></tr>
    ";

if ($result->num_rows > 0) {
    // output data of each row Name, Team, Goals
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td>" . $row["Name"]. "</td><td> " . $row["Team"] . "</td><td>" . $row[$finalc1stat] .  "</td>" ;
    echo "</tr>";
	}
} else {
    echo "0 results";
}
}
mysqli_close($con);
   }
?>
</div>
</div>
   </body>
</html>

