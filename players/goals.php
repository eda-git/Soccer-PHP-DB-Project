
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


	  <?php

      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = "Select Name, Team, Goals, Assists,
 (sum(yellow_card)+sum(second_yellow)) as 'Total Yellows', sum(red_card) as 'Total Reds', count(*) as 'Matches Played'
from 2017players

group by name, goals, assists, yellow_card, second_yellow, red_card
order by Goals desc

";
$result = mysqli_query($con,  $querytest);

echo "<table id='displaystats'>
<tr id='headerrow'>
<th onclick='sortTable(0)'>Name</th>
<th onclick='sortTable(1)'>Team</th>
<th onclick='sortTable(2)'>Goals</th>
<th onclick='sortTable(3)'>Assists</th>
<th onclick='sortTable(4)'>Total Yellows</th>


</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Team'] . "</td>";
echo "<td>" . $row['Goals'] . "</td>";
echo "<td>" . $row['Assists'] . "</td>";
echo "<td>" . $row['Total Yellows'] . "</td>";

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