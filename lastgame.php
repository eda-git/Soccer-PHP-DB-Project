	 <?php
$con=mysqli_connect('server', 'username', 'password', 'db', 'port');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$script = "select * 
from 2017teamdetail
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
       
</div></div>

	
     <div id="lastgamefinal"><a href="../boxscore.php?query='. $lastgame .'&year='. $year. '" target="_blank"> ' . $status .  '</a></div>
    
    
</div>'; 	



 echo "<style>div#lastgameteam.home { background: url(./img/" . $HOMEIMAGE . ".png) " . $HOMECOLOR . " no-repeat center; background-size: contain; }</style>";
 echo "<style>div#lastgameteam.away { background: url(./img/" . $AWAYIMAGE . ".png) " . $AWAYCOLOR . " no-repeat center; background-size: contain; }</style>";

?>
