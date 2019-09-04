<?php
// Initialize the session Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!doctype html>
<!--
 MDL
 Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>TheCup.us Tournament Suite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="http://thecup.us/favicon.ico"><link rel="shortcut icon" href="http://thecup.us/favicon.ico" type="image/x-icon">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="TheCup.us Tournament Suite">
    <link rel="apple-touch-icon-precomposed" href="http://thecup.us/favicon.ico">
<style>
form#addmatch {
    text-align: center;
}

div#addmatch {
    margin-top: 26px;
}</style>
   
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="http://thecup.us/favicon.ico">

  

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">

     <link rel="stylesheet" href="mdl.css">

  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">TheCup.us Tournament Suite</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
              <script src="../tournamentsuite/js/about.js"></script>

          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
<div id="logo"></div>
          <div class="demo-avatar-dropdown">
            <span><?php echo htmlspecialchars($_SESSION['username']); ?> <a href="logout.php" class="btn btn-danger">Log Out</a></span>
            <div class="mdl-layout-spacer"></div>

          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                       <script src="../tournamentsuite/js/menu.js"></script>

          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-card mdl-cell mdl-cell--12-col">
<form action="sql.php" target="_blank" method="post">

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
	echo "<br> Year: " . $POST['year_info'];
if  ($fakecounter == ($length)) { 
}else {  echo ","; }
}
$length = sizeof($playerlist);
echo  '<input type="hidden" name="sql[]" value="INSERT INTO 2017playerdetail VALUES ';

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
echo    '<input type="hidden" name="sql[]" value="INSERT INTO 2017teamdetail VALUES ' . $insertinfo . '">';
/* TEAM, GAMEID, SHOTS, SAVES, CORNERS, FOULS, OFFSIDE, HOME*/
$awaystats = "'" . $_POST['awayteam_teamstats'] . "'" . ",'" . $gameid_info . "','" . $_POST['awayshots'] . "','" . $_POST['awaysaves'] . "','" . $_POST['awaycorners'] . "','" . $_POST['awayfouls'] . "','" . $_POST['awayoffside'] . "'," .  "'" . strtoupper($_POST['awayhome']) . "','" . $_POST['year_info'].  "'";
$homestats =  "'" . $_POST['hometeam_teamstats'] . "'" . ",'" . $gameid_info . "','" . $_POST['homeshots'] . "','" . $_POST['homesaves'] . "','" . $_POST['homecorners'] . "','" . $_POST['homefouls'] . "','" . $_POST['homeoffside'] . "'," .  "'" . strtoupper($_POST['homehome']) . "','" . $_POST['year_info'].  "'";
echo    '<input type="hidden" name="sql[]" value="INSERT INTO teamstats VALUES (' . $awaystats . ')">';
echo    '<input type="hidden" name="sql[]" value="INSERT INTO teamstats VALUES (' . $homestats . ')">';



?>

<input type="submit" value="Are you sure?">

</form>

            </div>
			</main>
    </div>
     
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
