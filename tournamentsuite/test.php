<html>
<head>
<style>
input.numbers {
    width: 32px;
}
div#type1 {
    font-size: 13px;
}

</style>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



</head>
<body>

<?php
$con=mysqli_connect('server', 'username', 'password', 'db', 'port');
$GLOBALS['awayteam'] = $_POST[AWAY];
$GLOBALS['hometeam'] = $_POST[HOME];
$GLOBALS['date'] = $_POST[DATE]; 
$dateline = explode("/",$_POST[DATE]);
$year = $dateline[2];
echo $year;
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
<form  action="testpost.php" method="post">
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
<input id='addplayer' type='button' value='+'>

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
<?php
$stringyear = $_POST[DATE];
$dateline = explode("/",$_POST[DATE]);
$year = $dateline[2];
$round = $_POST[ROUND];
$date = $_POST[DATE]; 
$awayteam = $_POST[AWAY];
$venue = $_POST[VENUE];
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
$GLOBALS['insertinfo'] = "(" . $round . "," . $year . "," . $date . "," . $venue . "," . $GAMEID . "," .
$awayteam . "," . $hometeam . "," . strtoupper($awayleague) . "," . strtoupper($homeleague) . "," . $away_pk . "," . $home_pk
. "," . $aet . "," . $referee . "," . $attendance . "," . $weather_desc . "," . $temperature . ")";

/*$GLOBALS['insertinfo'] = '(' . $round . ','  . $date . ' '. $year . ' ' .  $awayteam
. ' '. strtoupper($awayscore) . ' '. strtoupper($awayleague) . ' '. $hometeam
. ' '. strtoupper($homescore) . ' '. strtoupper($homeleague) . ' ' .  strtoupper($temperature) ;*/
echo '<table class="stats" id="playerstatstable"><tbody> <tr id="headerrow"> <th onclick="sortTable(0)">&nbsp;</th> <th onclick="sortTable(1)">Shots</th> <th onclick="sortTable(2)">Saves</th> <th onclick="sortTable(3)">Corners</th> <th onclick="sortTable(4)">Fouls</th> <th onclick="sortTable(5)">Offside</th> </tr> 

<tr><td id="teamstats" class="awayteam">' .$awayteam . '<input type="hidden" name="awayteam_teamstats" value="' .  $awayteam .  '">' .  '</td><td id="numbers"><input type="text" name="awayshots"><input type="hidden" name="awayhome" value="false"></td><td id="numbers"> <input type="text" name="awaysaves"></td><td id="numbers"><input type="text" name="awaycorners"> </td><td id="numbers"><input type="text" name="awayfouls"></td><td id="numbers"> <input type="text" name="awayoffside"></td></tr>
<tr><td id="teamstats" class="hometeam">' .$hometeam . '<input type="hidden" name="hometeam_teamstats" value="' .  $hometeam .  '">' . '</td><td id="numbers"><input type="text" name="homeshots"><input type="hidden" name="homehome" value="true"></td><td id="numbers"> <input type="text" name="homesaves"></td><td id="numbers"><input type="text" name="homecorners"> </td><td id="numbers"><input type="text" name="homefouls"></td><td id="numbers"> <input type="text" name="homeoffside"></td></tr></tbody></table>';

echo '<input type="hidden" name="team_info" value="' .  $insertinfo .  '">';
echo '<input type="hidden" name="gameid_info" value="' .  $GAMEID .  '">';
echo '<input type="hidden" name="date_info" value="' .  $date .  '">';

echo '<input type="hidden" name="date" value="' .  $date .  '">';
echo "<input type='submit'>";


?>



</form>
</body>
</html>