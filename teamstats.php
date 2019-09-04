
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link href="./css/queries.css" rel="stylesheet">
<link href="./css/teams.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=0.50, maximum-scale=1.0, user-scalable=no" />
<script src="./js/sorttable.js"></script>

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

	  	  <?php
      $con= new MySQLi('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$query = 'select * from 2017teamdetail group by year';
$result = mysqli_query($con,  $query);

echo '<form action="teamstats.php" action="get">


';

while($row = mysqli_fetch_array($result))
{
echo "<select name='year'><option name='year' value='". $row['YEAR'] ."'>" . $row['YEAR'];

echo "</option>";
echo "</select>";
}
echo "<input type='submit'>";
echo "</form>";
mysqli_close($con);
   
?>

	  <?php
   if( $_GET["year"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$year = "'" . $year . "'";
$querytest = "select Team, (Shots * 1) as Shots, (Saves * 1) as Saves, (Corners * 1) as Corners, (Fouls * 1) as Fouls, (Offside * 1) as Offside, year from teamstats where SHOTS != '?' group by shots having year = ". $year . " order by shots desc";

$query = 'Select * from 2017teamdetail';
$result = mysqli_query($con,  $querytest);

echo "<table class='sortable' id='displaystats' style='width:100%'>
<tbody><tr><th onclick='sortTable(0)'>Team</th><th onclick='sortTable(1)'>Year</th>
<th onclick='sortTable(2)'>Shots</th>
<th onclick='sortTable(3)'>Saves</th>
<th onclick='sortTable(4)'>Corners</th>
<th onclick='sortTable(5)'>Fouls</th>
<th onclick='sortTable(6)'>Offside</th></tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Team'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
echo "<td>" . $row['Shots'] . "</td>";
echo "<td>" . $row['Saves'] . "</td>";
echo "<td>" . $row['Corners'] . "</td>";
echo "<td>" . $row['Fouls'] . "</td>";
echo "<td>" . $row['Offside'] . "</td>";


echo "</tr>";
}
echo "</table>";

mysqli_close($con);
   }
?>

</div>
   </body>
</html>