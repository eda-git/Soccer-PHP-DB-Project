
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
         MySQL Query: <input type = "text" name = "query" />
         <input type = "submit" />
      </form>
	  <?php
   if( $_GET["query"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_GET['query'];

$result = mysqli_query($con,  "select * from 2017teamdetail where gameid ='" . $user . "'");


while($row = mysqli_fetch_array($result))
{
$penalties = $row['PK'];
$aet = $row['AET'];
if ($penalties == 'TRUE') {
    $status = 'Final/PK: ' . $row['AWAY_PK'] . '-' . $row['HOME_PK'];
} elseif ($aet == "TRUE") {
    $status = 'AET';
} else {
    $status = 'Final';
}
echo "<div id='tournament'><div id='year'>" . $row['YEAR'] . " US Open Cup</div>";
echo "<table id='scoreline'><tbody><tr>";

echo "<td id='team' class='away'>" . $row['AWAY'] . "</td>";
echo "<td id='scorebox' class='away'>" . $row['AWAY_SCORE'] . "</td>";
echo "<td id='scorebox' class='home'>" . $row['HOME_SCORE'] . "</td>";

echo "<td id='team' class='home'>" . $row['HOME'] . "</td>";
echo "</tbody></table>";
echo "<div id='final'>" . $status . "</div>";
echo '<div>Referee: ' . $row['REFEREE'] . '<br>Attendance: ' . $row['ATTENDANCE'];
echo "</div>";


}


mysqli_close($con);
   }
?>

<?php
   if( $_GET["query"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = $_GET['query'];

$away = mysqli_query($con,  "select Name, Goals, Assists, Team from 2017playerdetail where HOME = 'FALSE' and GK = 'FALSE' and gameid ='" . $user . "'");
$home = mysqli_query($con,  "select Name, Goals, Assists, Team from 2017playerdetail where HOME = 'TRUE' and GK = 'FALSE' and gameid ='" . $user . "'");
$awaygk = mysqli_query($con,  "select Name, Goals, Assists, Saves, Team from 2017playerdetail where HOME = 'FALSE' and GK = 'TRUE' and gameid ='" . $user . "'");
$homegk = mysqli_query($con,  "select Name, Goals, Assists, Saves, Team from 2017playerdetail where HOME = 'TRUE' and GK = 'TRUE' and gameid ='" . $user . "'");

$outfield = "
<tr id='headerrow'>
<th onclick='sortTable(0)'>Name</th>
<th onclick='sortTable(1)'>Goals</th>
<th onclick='sortTable(2)'>Assists</th>
</tr>
";

$goalkeepers = "
<tr id='headerrow'>
<th onclick='sortTable(0)'>Team</th>
<th onclick='sortTable(1)'>Name</th>
<th onclick='sortTable(2)'>Saves</th>
</tr>
";

echo "<div id='boxscore'>";
echo "<div id='outfieldplayers'>";
echo "<div id='playerstats'><div id='team'>" . mysqli_fetch_array($away)['Team'] . "</div>";
echo "<table id='playerstatstable'><tbody>"; 
echo $outfield;
while($row = mysqli_fetch_array($away))
{

echo "<tr>";

echo "<td id='playernames' class='away'>" . $row['Name'] . "</td>";
echo "<td id='playernumbers' class='away'>" . $row['Goals'] . "</td>";
echo "<td  id='playernumbers' class='away'>" . $row['Assists'] . "</td>";
echo "</tr>";


}

echo "</table>";
echo "</div>";

echo "<div id='playerstats'><div id='team'>" . mysqli_fetch_array($home)['Team'] . "</div>";
echo "<table id='playerstatstable'><tbody>"; 
echo $outfield;
while($row = mysqli_fetch_array($home))
{

echo "<tr>";

echo "<td id='playernames' class='home'>" . $row['Name'] . "</td>";
echo "<td id='playernumbers' class='home'>" . $row['Goals'] . "</td>";
echo "<td  id='playernumbers' class='home'>" . $row['Assists'] . "</td>";
echo "</tr>";


}

echo "</table>";
echo "</div>";
echo "</div>";

echo "<div id='goalkeepers'>Goalkeeper Stats</div>";
echo "<table id='playerstatstable'><tbody>"; 
echo $goalkeepers;
while($row = mysqli_fetch_array($awaygk))
{

echo "<tr>";
echo "<td id='playernames' class='away'>" . $row['Team'] . "</td>";
echo "<td id='playernames' class='away'>" . $row['Name'] . "</td>";
echo "<td id='playernumbers' class='away'>" . $row['Saves'] . "</td>";
echo "</tr>";


}
echo "</div>";


while($row = mysqli_fetch_array($homegk))
{

echo "<tr>";
echo "<td id='playernames' class='home'>" . $row['Team'] . "</td>";

echo "<td id='playernames' class='home'>" . $row['Name'] . "</td>";
echo "<td id='playernumbers' class='home'>" . $row['Saves'] . "</td>";
echo "</tr>";


}

echo "</table>";
echo "</div>";
mysqli_close($con);
   }
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