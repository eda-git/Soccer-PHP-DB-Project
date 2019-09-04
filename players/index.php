<html><head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="../css/default.css" rel="stylesheet"><link href="../css/queries.css" rel="stylesheet">

<link rel="shortcut icon" href="http://thecup.us/favicon.ico" type="image/x-icon">
<script src="../js/sorttable.js"></script>
<style>
table#displaystats {
    width: 100%;
}</style>

</head>
   <body >
   <header><div id="menu" onclick="$('#mobilemenu').toggle();"><div id="menubar">
   </div><div id="menubar">
   </div><div id="menubar">
   </div></div>
<div id="logo"></div>
<ul><script src="../js/menuitems.js"></script>
</ul>

</header>
     <script src="../js/mobiletable.js"></script>
      
	
      
	  <div id="main">
<div id="statportal">
   <div> <table id="leaders">
    <tbody>
           <tr><th>Goals</th><th></th><th>Total</th>
    </tr>

  <?php

      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = "Select Name, Team, sum(Goals) as 'Goals'
from 2017playerdetail
group by name, goals
order by sum(goals) desc
limit 5;
";
$result = mysqli_query($con,  $querytest);

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
$identity = mysqli_query($con,  "select Team, Image, Color from 2017teams where team like '" . $row['Team']. "'");


while($yes = mysqli_fetch_array($identity))
{
	$identityimage = $yes['Image'];
	$identitycolor = $yes['Color'];
}

 echo '<td id="logo" style="background: url(../img/' . $identityimage . '.png) ' . $identitycolor . ' no-repeat center; background-size: contain;"></td>';

 echo '<td id="name">' . $row['Name'] . '</td>';
 
 echo '<td id="total">' . $row['Goals'] . '</td>';
 echo "</tr>";
}


mysqli_close($con);
   
?>
</tbody>
    </table>
    </div>
    <div>
      <table id="leaders">
    <tbody>
           <tr><th>Assists</th><th></th><th>Total</th>
    </tr>

  <?php

          $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = "Select Name, Team,  sum(Assists) as 'Assists'
from 2017playerdetail
group by name, Assists
order by  sum(Assists) desc
limit 5;
";
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
$identity = mysqli_query($con,  "select Team, Image, Color from 2017teams where team like '" . $row['Team']. "'");


while($yes = mysqli_fetch_array($identity))
{
	$identityimage = $yes['Image'];
	$identitycolor = $yes['Color'];
}

 echo '<td id="logo" style="background: url(../img/' . $identityimage . '.png) ' . $identitycolor . ' no-repeat center; background-size: contain;"></td>';

 echo '<td id="name">' . $row['Name'] . '</td>';
 
 echo '<td id="total">' . $row['Assists'] . '</td>';
 echo "</tr>";
}


mysqli_close($con);
   
   
?>
</tbody>
    </table>
	</div>
</div>
  <div id="statportal">
   <div> <table id="leaders">
    <tbody>
           <tr><th>Yellow Cards</th><th></th><th>Total</th>
    </tr>

 
  <?php

               $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = "Select Name, Team, sum(Yellow_Card+Second_Yellow) as 'Total Yellows'
from 2017playerdetail
group by name, (Yellow_Card+Second_Yellow)
order by sum(Yellow_Card+Second_Yellow) desc
limit 5;
";
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
$identity = mysqli_query($con,  "select Team, Image, Color from 2017teams where team like '" . $row['Team']. "'");


while($yes = mysqli_fetch_array($identity))
{
	$identityimage = $yes['Image'];
	$identitycolor = $yes['Color'];
}

 echo '<td id="logo" style="background: url(../img/' . $identityimage . '.png) ' . $identitycolor . ' no-repeat center; background-size: contain;"></td>';

 echo '<td id="name">' . $row['Name'] . '</td>';
 
 echo '<td id="total">' . $row['Total Yellows'] . '</td>';
 echo "</tr>";
}


mysqli_close($con);
   
?>
</tbody>
    </table>
    </div>
    <div>
      <table id="leaders">
    <tbody>
           <tr><th>Red Card</th><th></th><th>Total</th>
    </tr>

  <?php

                   $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$querytest = "Select Name, Team, Red_Card as 'Red_Card'
from 2017playerdetail
group by name, Red_Card
order by sum(Red_Card) desc
limit 5;
";
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
$identity = mysqli_query($con,  "select Team, Image, Color from 2017teams where team like '" . $row['Team']. "'");


while($yes = mysqli_fetch_array($identity))
{
	$identityimage = $yes['Image'];
	$identitycolor = $yes['Color'];
}

 echo '<td id="logo" style="background: url(../img/' . $identityimage . '.png) ' . $identitycolor . ' no-repeat center; background-size: contain;"></td>';

 echo '<td id="name">' . $row['Name'] . '</td>';
 
 echo '<td id="total">' . $row['Red_Card'] . '</td>';
 echo "</tr>";
}


mysqli_close($con);
   
   
   
?>
</tbody>
    </table>
	</div>
</div>
   
     <?php

$con=mysqli_connect('server', 'username', 'password', 'db', 'port');// Check connection
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

echo "<table class='sortable' id='displaystats'>
<tr id='headerrow'>
<th onclick='sortTable(0)'>Name</th>
<th onclick='sortTable(1)'>Team</th>
<th onclick='sortTable(2)'>Goals</th>
<th onclick='sortTable(3)'>Assists</th>
<th onclick='sortTable(4)'>Total Yellows</th>

<th onclick='sortTable(5)'>Red Cards</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Team'] . "</td>";
echo "<td>" . $row['Goals'] . "</td>";
echo "<td>" . $row['Assists'] . "</td>";
echo "<td>" . $row['Total Yellows'] . "</td>";
echo "<td>" . $row['Total Reds'] . "</td>";

echo "</tr>";
}
echo "</table>";

mysqli_close($con);
   
?>

	
	  

</div>
   
</body></html>