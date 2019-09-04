<?php 
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
error_reporting(0);
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
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>

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
    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="http://thecup.us/favicon.ico">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">

     <link rel="stylesheet" href="mdl.css">
<style>
.card {
    background: #FFF;
    height: 600px;
    overflow: auto;
}
form {
    overflow: scroll;
}
div#note {
    font-size: 27px;
    padding-top: 64px;
}

#note div {
    font-size: 20px;
}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<div class="card">


<?php
$con=mysqli_connect('server', 'username', 'password', 'db', 'port');;
$GLOBALS['awayteam'] = $_POST[AWAY];
$GLOBALS['hometeam'] = $_POST[HOME];
$GLOBALS['date'] = $_POST[DATE]; 
$GLOBALS['year'] = substr($date, 0, 4);

$query = "select Date, GAMEID
from 2017teamdetail
where year = '" . $year . "'
order by GAMEID desc limit 1";
echo $query;

$result = mysqli_query($con,  $query);


while($row = mysqli_fetch_array($result))
{

$GLOBALS['GAMEID'] = $row['GAMEID'];
}

$GLOBALS[GAMEID] = (1 + $GAMEID);
mysqli_close($con);

?>
<form  action="submit_match.php" method="post">
<script>
/*NAME, DATE, GAMEID, HOME, TEAM, GK, STARTED, Minute Subbed, Subbed, Subbed in Added Time, Penalty Kick Goals, 
Penalty Kick Attempts, Saves, Red_Card, Second_Yellow, Yellow_Card, Goals, Assists, Own Goals, Minutes Played, Manager, Player */
</script>
  <table id='matchform'>
  <tbody>
<th>NAME</th><th> TEAM</th><th> HOME</th><th> STARTED</th><th> GOALS</th><th> ASSISTS</th><th> PK GOALS</th><th> PK ATTEMPTS</th><th> TIME SUBBED</th>
<th> SUBSTITUTED</th> <th> SUBBED IN ADDED TIME</th>
<th> YELLOW CARD</th><th> SECOND YELLOW</th><th> RED CARD</th><th> 
 GOALKEEPER</th><th> SAVES</th><th> OWN GOALS</th><th> MINUTES PLAYED</th><th> PLAYER</th><th> MANAGER</th>

<tr class="player"><td><input type="text" name="players[]" /><input type="hidden" value="'<?php echo $date;?>'" name="playerdate" />
<input type="hidden" value="'<?php echo $GAMEID;?>'" name="playergameid" /></td>

 <td><select name="team[]">
 
  <option value="'<?php echo $awayteam;?>'"><?php  echo $awayteam;?></option>
    <option value="'<?php echo $hometeam;?>'"><?php  echo $hometeam;?></option>

</select>
</td>
 <td><select name="home[]">
 
  <option value="'TRUE'">TRUE</option>
  <option value="'FALSE'">FALSE</option>
</select>
</td>
 <td><select name="started[]">
  <option value="'TRUE'">Started</option>
  <option value="'FALSE'">Not Started</option>
</select>
</td>


 <td> <input type="text" value="0" class="numbers" name="goals[]" /></td>
  <td> <input type="text" value="0" class="numbers" name="assists[]" /></td>
    <td> <input type="text" value="0" class="numbers" name="pkgoals[]" /></td>
    <td> <input type="text" value="0" class="numbers" name="pkattempts[]" /></td>

 <td> <input type="text" class="numbers" value="0" name="timesubbed[]" /></td>
 <td> <select name="substitute[]">
  <option value="'FALSE'">False</option>
  <option value="'TRUE'">True</option>
</select></td>
 <td> 
 

 <select name="substituteinaddedtime[]">
<option value="'FALSE'">False</option>
  <option value="'FALSE'">True</option>
</select></td>

 <td><select name="yellow_card[]">
  <option value="0">False</option>
  <option value="1">True</option>
</select></td>
 <td> <select name="second_yellow[]">
<option value="0">False</option>
  <option value="1">True</option>
</select></td>
 <td> <select name="red_card[]">
<option value="0">False</option>
  <option value="1">True</option>
</select></td>
 <td> <select name="goalkeeper[]">
<option value="'FALSE'">False</option>
  <option value="'TRUE'">True</option>
</select></td>
 <td> <input type="text" class="numbers" value="0" name="saves[]" /></td>
 <td> <input type="text" class="numbers" value="0" name="own_goals[]" /></td>
 <td> <input type="text" class="numbers" value="0" name="minutesplayed[]" /></td>

 <td> <select name="player[]">
<option value="'FALSE'">False</option>
  <option value="'TRUE'">True</option>
</select></td>
 <td> <select name="manager[]">
<option value="'FALSE'">False</option>
  <option value="'TRUE'">True</option>
</select></td>

</tr>

    
     <script>
  /* PLAYER, DATE, GAMEID, HOME, TEAM, GK, STARTED, MINUTE SUBBED, SUBBED, 
  SUBBED IN ADDED TIME, PENALTY KICK GOALS, PENALTY KICK ATTEMPTS, SAVES, RED CARDS, 
  SECOND YELLOW CARD, GOALS, ASSISTS, OWN GOALS, MINUTES PLAYED, MANAGER, PLAYER
  */

  
  jQuery(function($) {
  
  
  $('#addplayer').click(addAnotherTextBox);
  
  function addAnotherTextBox() {
	var $value = "'value'";
    $("#matchform").append('<tr class="player"><td><input type="text" name="players[]" /><input type="hidden" value="<?php echo $date;?>" name="playerdate" /> <input type="hidden" value="<?php echo $GAMEID;?>" name="playergameid" /></td> <td><select name="team[]"> <option value="<?php echo $hometeam;?>"><?php echo $hometeam;?></option> <option value="<?php echo $awayteam;?>"><?php echo $awayteam;?></option> </select> </td> <td><select name="home[]"> <option value="TRUE">TRUE</option> <option value="FALSE">FALSE</option> </select> </td> <td><select name="started[]"> <option value="0">Started</option> <option value="1">Not Started</option> </select> </td> <td> <input type="text" value="0" class="numbers" name="goals[]" /></td> <td> <input type="text" value="0" class="numbers" name="assists[]" /></td> <td> <input type="text" value="0" class="numbers" name="pkgoals[]" /></td> <td> <input type="text" value="0" class="numbers" name="pkattempts[]" /></td> <td> <input type="text" class="numbers" value="0" name="timesubbed[]" /></td> <td> <select name="substitute[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td> <select name="substituteinaddedtime[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td><select name="yellow_card[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td> <select name="second_yellow[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td> <select name="red_card[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td> <select name="goalkeeper[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td> <input type="text" class="numbers" value="0" name="saves[]" /></td> <td> <input type="text" class="numbers" value="0" name="own_goals[]" /></td> <td> <input type="text" class="numbers" value="0" name="minutesplayed[]" /></td> <td> <select name="player[]"> <option value="0">False</option> <option value="1">True</option> </select></td> <td> <select name="manager[]"> <option value="0">False</option> <option value="1">True</option> </select></td> </tr>') }
  

});
</script>
<script type="text/javascript">
function ayylmao(){

$('#startedtrue').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
});

};




</script>
</tbody>
</table>
<input id='addplayer' type='button' value='+'>

<?php

$round = $_POST[ROUND];
$awayteam = $_POST[AWAY];
$venue =  $_POST[VENUE];
echo $gameid;
$awayscore = $_POST[AWAY_SCORE];
$awayleague = $_POST[AWAY_LEAGUE];
$hometeam = $_POST[HOME];
$homescore = $_POST[HOME_SCORE];
$pk = $_POST[PK];
$homeleague = $_POST[HOME_LEAGUE];
/*ROUND, YEAR, DATE, VENUE, GAMEID, AWAY, HOME, AWAY_LEAGUE, 
HOME_LEAGUE, AWAY_SCORE, HOME_SCORE, PK, 
AWAY_PK, HOME_PK, AET, REFEREE, 
ATTENDANCE, WEATHER_DESC, TEMP */
$temperature = $_POST[TEMPERATURE];
$away_pk = $_POST[AWAY_PK];
$home_pk = $_POST[HOME_PK];
$aet = $_POST[AET];
$referee = $_POST[REFEREE];
$attendance = $_POST[ATTENDANCE];
$weather_desc = $_POST[WEATHER_DESC];
$GLOBALS['insertinfo'] = "(" . $round . "," . $year . ", '" . $date . "' , '" . $venue . "'," . $GAMEID . ", '" .
$awayteam . "' , '" . $hometeam . "','" . strtoupper($awayleague) . "','" . strtoupper($homeleague) . "'," . $awayscore ."," . $homescore . ",'" . $pk . "'," . $away_pk . "," . $home_pk
. ",'" . $aet . "','" . $referee . "'," . $attendance . ",'" . $weather_desc . "'," . $temperature . ")";

/*$GLOBALS['insertinfo'] = '(' . $round . ','  . $date . ' '. $year . ' ' .  $awayteam
. ' '. strtoupper($awayscore) . ' '. strtoupper($awayleague) . ' '. $hometeam
. ' '. strtoupper($homescore) . ' '. strtoupper($homeleague) . ' ' .  strtoupper($temperature) ;*/
echo '<div id="note">Team Stats<div>Use a question mark if information is not known</div></div><table class="stats" id="playerstatstable"><tbody> <tr id="headerrow"> <th onclick="sortTable(0)">&nbsp;</th> <th onclick="sortTable(1)">Shots</th> <th onclick="sortTable(2)">Saves</th> <th onclick="sortTable(3)">Corners</th> <th onclick="sortTable(4)">Fouls</th> <th onclick="sortTable(5)">Offside</th> </tr> 

<tr><td id="teamstats" class="awayteam">' .$awayteam . '<input type="hidden" name="awayteam_teamstats" value="' .  $awayteam .  '">' .  '</td><td id="numbers"><input type="text" name="awayshots"><input type="hidden" name="awayhome" value="false"></td><td id="numbers"> <input type="text" name="awaysaves"></td><td id="numbers"><input type="text" name="awaycorners"> </td><td id="numbers"><input type="text" name="awayfouls"></td><td id="numbers"> <input type="text" name="awayoffside"></td></tr>
<tr><td id="teamstats" class="hometeam">' .$hometeam . '<input type="hidden" name="hometeam_teamstats" value="' .  $hometeam .  '">' . '</td><td id="numbers"><input type="text" name="homeshots"><input type="hidden" name="homehome" value="true"></td><td id="numbers"> <input type="text" name="homesaves"></td><td id="numbers"><input type="text" name="homecorners"> </td><td id="numbers"><input type="text" name="homefouls"></td><td id="numbers"> <input type="text" name="homeoffside"></td></tr></tbody></table>';

echo '<input type="hidden" name="team_info" value="' .  $insertinfo .  '">';
echo '<input type="hidden" name="gameid_info" value="' .  $GAMEID .  '">';
echo '<input type="hidden" name="date_info" value="' .  $date .  '">';
echo '<input type="hidden" name="year_info" value="' .  $year .  '">';

echo '<input type="hidden" name="date" value="' .  $date .  '">';
echo "<input type='submit'>";


?>



</form>
            </div>
			</main>
    </div>
     
  </body>
</html>
