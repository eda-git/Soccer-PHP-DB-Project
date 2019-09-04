<form  action="test.php" method="post">

<table id='matchtitle'>
<tbody>
Round: <input type="text" name="ROUND">
<br>
  <p>Date: <input type="text" name="DATE" id="datepicker"></p> 
  Away Team: <select name="AWAY">

	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
echo $querytest;
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
  </select>
  
  Away League:  <select name="AWAY_LEAGUE">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>


  </select><BR>
  Away Score: <input type='text' name='AWAY_SCORE'>
<br>
Away Penalty Kick Goals (set to 0 if no PKs): <input type='text' value="0" name='AWAY_PK'>

  <br>
  Home Team:
<select name="HOME">
	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
echo $querytest;
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
</select>
  Home League: <select name="HOME_LEAGUE">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>
</select><br>
Home Score: <input type='text' name='HOME_SCORE'>

<br>
Home Penalty Kick Goals (set to 0 if no PKs): <input type='text' value="0" name='HOME_PK'>
<br>
Head Referee: <input type='text' name='REFEREE'>
<br>
Match went to Penalties?: <select name="PK">
<option value="FALSE">FALSE</option>
<option value="TRUE">TRUE</option>

</select>
<br>
Additional Extra Time?: <select name="AET">
<option value="FALSE">FALSE</option>

<option value="TRUE">TRUE</option>
</select>
<br>
Venue: <input type='text' name='VENUE'>
<br>
Attendance (DO NOT USE COMMAS): <input type='text' name='ATTENDANCE'>
<br> 
Weather Description: 
<select name="WEATHER_DESC">
    <option value="Clear">Clear</option>
	    <option value="Partly Cloudy">Partly Cloudy</option>
	    <option value="Cloudy">Cloudy</option>

    <option value="Rain">Rain</option>
	    

			    <option value="Windy">Windy</option>
    <option value="Overcast">Overcast</option>
	<option value="Snow">Snow</option>
			    <option value="Blizzard">Blizzard</option>
	    <option value="Indoors">Indoors</option>

</select>
<br>
Temperature (if Indoors, set to 68): <input type='text' name='TEMPERATURE'>
<br>
</tbody>
</table>
<input type='submit'>
</form>
