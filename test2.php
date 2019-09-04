
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">

</head>
   <body>
   <header>
<div id="logo"></div>
<ul><script src="./js/menuitems.js"></script>
</ul>
</header>
     
      
	  <div id="main">
	   <form action = "<?php $_PHP_SELF ?>" method = "GET">
         MySQL Query: <input type = "text" name = "name" />
         <input type = "submit" />
      </form>
	  <?php
   if( $_GET["name"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,  $_GET['name']);

echo "<table id='displaystats' border='1'>
<tr>
<th onclick='sortTable(0)'>Round</th>
<th onclick='sortTable(1)'>YEAR</th>
<th onclick='sortTable(2)'>DATE</th>
<th onclick='sortTable(3)'>VENUE</th>
<th onclick='sortTable(4)'>GAMEID</th>
<th onclick='sortTable(5)'>AWAY</th>
<th onclick='sortTable(6)'>HOME</th>
<th onclick='sortTable(7)'>AWAY_LEAGUE</th>
<th onclick='sortTable(8)'>HOME_LEAGUE</th>
<th onclick='sortTable(9)'>AWAY_SCORE</th>
<th onclick='sortTable(10)'>HOME_SCORE</th>
<th onclick='sortTable(11)'>PK</th>
<th onclick='sortTable(12)'>AWAY_PK</th>
<th onclick='sortTable(13)'>HOME_PK</th>
<th onclick='sortTable(14)'>AET</th>
<th onclick='sortTable(15)'>REFEREE</th>
<th onclick='sortTable(16)'>ATTENDANCE</th>
<th onclick='sortTable(17)'>WEATHER_DESC</th>
<th onclick='sortTable(18)'>TEMP</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['ROUND'] . "</td>";
echo "<td>" . $row['YEAR'] . "</td>";
echo "<td>" . $row['DATE'] . "</td>";
echo "<td>" . $row['VENUE'] . "</td>";
echo "<td>" . $row['GAMEID'] . "</td>";
echo "<td>" . $row['AWAY'] . "</td>";
echo "<td>" . $row['HOME'] . "</td>";
echo "<td>" . $row['AWAY_LEAGUE'] . "</td>";
echo "<td>" . $row['HOME_LEAGUE'] . "</td>";
echo "<td>" . $row['AWAY_SCORE'] . "</td>";
echo "<td>" . $row['HOME_SCORE'] . "</td>";
echo "<td>" . $row['PK'] . "</td>";
echo "<td>" . $row['AWAY_PK'] . "</td>";
echo "<td>" . $row['HOME_PK'] . "</td>";
echo "<td>" . $row['AET'] . "</td>";
echo "<td>" . $row['REFEREE'] . "</td>";
echo "<td>" . $row['ATTENDANCE'] . "</td>";
echo "<td>" . $row['WEATHER_DESC'] . "</td>";
echo "<td>" . $row['TEMP'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
   }
?>
</div>
   </body>
</html>