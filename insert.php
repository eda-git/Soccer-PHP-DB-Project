<html>

<body>

 

 

<?php

$con = mysql_connect("SERVER", "USERNAME", "PASSWORD", "DB", "PORT");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("cis_id", $con);

 

$sql="INSERT INTO example_table (ROUND, YEAR, DATE, VENUE, GAMEID, AWAY, HOME, AWAY_LEAGUE, HOME_LEAGUE, AWAY_PK, HOME_PK, REFEREE, ATTENDANCE, WEATHER_DESC, TEMP)

VALUES

('$_POST[ROUND]','$_POST[YEAR]','$_POST[DATE]','$_POST[VENUE]','$_POST[GAMEID]','$_POST[AWAY]','$_POST[HOME]','$_POST[AWAY_LEAGUE]','$_POST[HOME_LEAGUE]','$_POST[AWAY_PK]','$_POST[HOME_PK]','$_POST[REFEREE]','$_POST[ATTENDANCE]','$_POST[WEATHER_DESC]','$_POST[TEMP]'";

 

if (!mysql_query($sql,$con))

  {

  die('Error: ' . mysql_error());

  }

echo "1 record added";

 

mysql_close($con)

?>

</body>

</html>