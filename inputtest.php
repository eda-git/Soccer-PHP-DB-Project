
<html>
<head>
</head>
<body>
<?php
$stringyear = $_POST[DATE];
$dateline = explode("/",$_POST[DATE]);
$year = $dateline[2];
echo $_POST[ROUND] . '<br>';

echo $year. '<br>';
echo $_POST[DATE]. '<br>';
echo $_POST[VENUE]. '<br>';
echo $_POST[GAMEID]. '<br>';
echo $_POST[AWAY]. '<br>';
echo $_POST[HOME]. '<br>';
echo $_POST[AWAY_LEAGUE]. '<br>';
echo $_POST[HOME_LEAGUE]. '<br>';
echo $_POST[AWAY_PK]. '<br>';
echo $_POST[HOME_PK]. '<br>';
echo $_POST[REFEREE]. '<br>';
echo $_POST[ATTENDANCE]. '<br>';
echo $_POST[WEATHER_DESC]. '<br>';
echo $_POST[TEMP]. '<br>';
?>
</body>
</html>