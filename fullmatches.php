
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
<?php include 'wip.php';?>

	
	  <?php

      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = 'Select * from 2017teamdetail';
$query = 'Select * from 2017teamdetail';
$result = mysqli_query($con,  $query);

echo "<table id='displaystats'>
<tr id='headerrow'>
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
echo '<td><a href="boxscore.php?query=' . $row['GAMEID'] . '">'. $row['GAMEID']. '</a>';
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
  
?>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("displaystats");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</div>
   </body>
</html>