<html>
<head>
<style>
input.numbers {
    width: 32px;
}

</style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<form action="sql.php" method="post">

<?php
$GLOBALS['gameid_info'] = $_POST['gameid_info'];
$GLOBALS['date_info'] = $_POST['date_info'];
echo $gameid_info;
$playerlist = array();
$counter = 0;
$started_total = array();
$date_total = array();
$gameid_total = array();
 $home_total = array();
 $team_total = array();
 $goalkeeper_total = array();
 $started_total = array();
 $timesubbed_total = array();
 $substitute_total = array();
 $substituteinaddedtime_total = array();
 $pkgoals_total = array();
 $pkattempts_total = array();
 $saves_total = array();
 $red_card_total = array();
 $second_yellow = array();
 $yellow_card_total = array();
 $goals_total = array();
 $assists_total = array();	
 $own_goals_total = array();
 $minutesplayed_total = array(); 
 $manager_total = array(); 
 $player_total = array();;



foreach($_POST['players'] as $players)
{
	
array_push($playerlist, $players);
}

foreach($_POST['playerdate'] as $date)
{
	
array_push($date_total, $date);
}
foreach($_POST['playergameid'] as $gameid)
{
	echo $gameid;
array_push($gameid_total, $gameid);
}
foreach($_POST['home'] as $home)
{
	
array_push($home_total, $home);
}

foreach($_POST['team'] as $team)
{
	
array_push($team_total, $team);
}

foreach($_POST['goalkeeper'] as $goalkeeper)
{
	
array_push($goalkeeper_total, $goalkeeper);
}
foreach($_POST['started'] as $started)
{
	
array_push($started_total, $started);
}
foreach($_POST['timesubbed'] as $timesubbed)
{
	
array_push($timesubbed_total, $timesubbed);
}
foreach($_POST['substitute'] as $substitute)
{
	
array_push($substitute_total, $substitute);
}


foreach($_POST['substituteinaddedtime'] as $substituteinaddedtime)
{
	
array_push($substituteinaddedtime_total, $substituteinaddedtime);
}


foreach($_POST['substituteinaddedtime_total'] as $substituteinaddedtime)
{
	
array_push($substituteinaddedtime_total, $substituteinaddedtime);
}


foreach($_POST['pkgoals'] as $pkgoals)
{
	
array_push($pkgoals_total, $pkgoals);
}

foreach($_POST['pkattempts'] as $pkattempts)
{
	
array_push($pkattempts_total, $pkattempts);
}
foreach($_POST['saves'] as $saves)
{
	
array_push($saves_total, $saves);
}

foreach($_POST['red_card'] as $red_card)
{
	
array_push($red_card_total, $red_card);
}
  
foreach($_POST['second_yellow'] as $second_yellow)
{
	
array_push($second_yellow_total, $second_yellow);
}
  
foreach($_POST['yellow_card'] as $yellow_card)
{
	
array_push($yellow_card_total, $yellow_card);
}
 foreach($_POST['goals'] as $goals)
{
	
array_push($goals_total, $goals);
}
 
 foreach($_POST['assists'] as $assists)
{
	
array_push($assists_total, $assists);
}
  
 foreach($_POST['own_goals'] as $own_goals)
{
	
array_push($own_goals_total, $own_goals);
}
	
 foreach($_POST['minutesplayed'] as $minutesplayed)
{
	
array_push($minutesplayed_total, $minutesplayed);
}
  foreach($_POST['manager'] as $manager)
{
	
array_push($manager_total, $manager);
}
 foreach($_POST['player'] as $player)
{
	
array_push($player_total, $player);
}

/*goals, assists, timesubbed, substitute, substituteinaddedtime, yellow_card, second_yellow, red_card, goalkeeper, manager */


$fakecounter = 0;
$length = sizeof($playerlist);
while($fakecounter < $length) {
	$line =  $playerlist[$counter] . "," . $date_info . "," . $gameid_info . "," . $home_total[$counter] 
	. "," . $team_total[$counter] . ", GK" . $goalkeeper_total[$counter] 
	. ", STARTED" . $started_total[$counter]. ", TIMESUBBED: " 
	. $timesubbed_total[$counter] . ", SUBSTITUTE" . $substitute_total[$counter] 
	. ", S AET" . $substituteinaddedtime_total[$counter] . ", PKG" . $pkgoals_total[$counter] . ", PKA" 
	. $pkattempts_total[$counter] . ", SAVES " . $saves_total[$counter] . ", REDCARDS " . $red_card_total[$counter]
	. ", 2nd YELLOW " . $second_yellow[$counter] . ", YELLOW CARD" . $yellow_card_total[$counter]
	. ", GOALS: " . $goals_total[$counter] . ", ASSISTS: " . $assists_total[$counter]	. ", OWN GOALS " . $own_goals_total[$counter] 
	. ",MINPLAYED " . $minutesplayed_total[$counter] . ", MANAGERS " . $manager_total[$counter] . ", PLAYERS " . $player_total[$counter];; 
		$fakecounter++;
	
$line = trim($line, ",");
 
	
	$line = "(" . $line  . ")" ;
	echo $line;
if  ($fakecounter == ($length)) { 
}else {  echo ","; }
}
$length = sizeof($playerlist);
echo  '<input type="hidden" name="sql" value="INSERT INTO 2017teamdetail VALUES ';

while($counter < $length) {
	/*
	NAME, DATE, GAMEID, HOME, TEAM, GK, STARTED, Minute Subbed, Subbed, Subbed in Added Time, Penalty Kick Goals, 
Penalty Kick Attempts, Saves, Red_Card, Second_Yellow, Yellow_Card, Goals, Assists, Own Goals, Minutes Played, Manager, Player
	*/
	$line =  "'" . $playerlist[$counter] . "'" . ", '" . $date_info . "'," . $gameid_info . "," . $home_total[$counter] 
	. "," . $team_total[$counter] . "," . $goalkeeper_total[$counter] 
	. "," . $started_total[$counter]. "," 
	. $timesubbed_total[$counter] . "," . $substitute_total[$counter] 
	. "," . $substituteinaddedtime_total[$counter] . "," . $pkgoals_total[$counter] . "," 
	. $pkattempts_total[$counter] . "," . $saves_total[$counter] . "," . $red_card_total[$counter]
	. "," . $second_yellow[$counter] . "," . $yellow_card_total[$counter]
	. "," . $goals_total[$counter] . "," . $assists_total[$counter]	. "," . $own_goals_total[$counter] 
	. "," . $minutesplayed_total[$counter] . "," . $manager_total[$counter] . "," . $player_total[$counter];; 
	
	$counter++;
	
$line = trim($line, ",");
 $line = trim($line, ",");

	
	$line = "(" . $line  . ")" ;
	echo $line;
if  ($counter == ($length)) {  
}else { echo ",";}

}
echo '">';
?>
<?php
$insertinfo = $_POST[team_info];
echo    '<input type="hidden" name="teamdata" value="' . $insertinfo . '">';
/* TEAM, GAMEID, SHOTS, SAVES, CORNERS, FOULS, OFFSIDE, HOME*/
$awaystats = "'" . $_POST['awayteam_teamstats'] . "'" . "," . $gameid_info . "," . $_POST['awayshots'] . "," . $_POST['awaysaves'] . "," . $_POST['awaycorners'] . "," . $_POST['awayfouls'] . "," . $_POST['awayoffside'] . "," .  "'" . strtoupper($_POST['awayhome']) . "'";
$homestats =  "'" . $_POST['hometeam_teamstats'] . "'" . "," . $gameid_info . "," . $_POST['homeshots'] . "," . $_POST['homesaves'] . "," . $_POST['homecorners'] . "," . $_POST['homefouls'] . "," . $_POST['homeoffside'] . "," .  "'" . strtoupper($_POST['homehome']) . "'";
echo    '<input type="hidden" name="awaystat" value="(' . $awaystats . ')">';
echo    '<input type="hidden" name="homestat" value="(' . $homestats . ')">';



?>

<input type="submit" value="Are you sure?">

</form>
</body>
</html>