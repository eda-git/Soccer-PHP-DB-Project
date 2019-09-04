
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link rel="shortcut icon" href="http://thecup.us/favicon.ico" type="image/x-icon">
<script src="./js/sorttable.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link href="./css/queries.css" rel="stylesheet">
<link href="./css/teams.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=0.50, maximum-scale=1.0, user-scalable=no" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script> $( function() { $( "#datepicker" ).datepicker(); } ); 
$( function() { $( "#datepicker2" ).datepicker(); } );</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="./js/table.js"></script>
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

 <div id="pgf">
<form action="boxscorefinder.php">
    <div id="columns">
<div id="selector" class="year">
    Date:<br>
    <div><select id="DATE_MIN" name="DATE_MIN">
	<option value="2017" selected="">2017</option>
	</select>
</div>
<div>
    to
</div>
    <div>
   
<select id="DATE_MAX" name="DATE_MAX">
	<option value="2017" selected="">2017</option>
	</select>   

    </div></div><div id="selector" class="year">
	Round:<br>
    <div><select id="round_min" name="round_min">
	<option value="" selected="">1</option>
	<option value="2">2</option><option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option><option value="7">7</option>
<option value="8">8</option>

</select>
</div>
<div>
    to
</div>
    <div><br>
    <select id="round_max" name="round_max" class="no_chosen">
			

			<option value="1">1</option>
	<option value="2">2</option><option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option><option value="7">7</option>
<option value="8" selected="">8</option>

</select>
    </div>
</div><div><br>
   
        </div></div><div id="columns">
<div id="selector" class="year">
    <div>Away  <br><select id="away" name="away" class="no_chosen">
	<option value="" selected="">All Teams</option>
	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
	  </select>

	</div>

    </div><div><br>
    <br>Score: <select name="awayc1comp" id="c1comp" class="criteria-comp">
              
              <option value="greaterthan">&gt;=</option>
	      
              <option value="lessthan">&lt;=</option>
	      
              <option value="equal">=</option>
	      
	</select> <input type="text" name="awayscore">

        </div></div><div id="columns">
<div id="selector" class="year">
    <div>Home  <br><select id="home" name="home" class="no_chosen">
	<option value="" selected="">All Teams</option>
	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
	  </select>

	</div>

    </div><div><br>
    <br>Score: <select name="homec1comp" id="c1comp" class="criteria-comp">
              
              <option value="greaterthan">&gt;=</option>
	      
              <option value="lessthan">&lt;=</option>
	      
              <option value="equal">=</option>
	      
	</select><input type="text" name="homescore">

        </div></div>
<div id="columns">


<div>
Penalties:
<select id="penalties" name="penalties">
    	<option value="False">False</option>

	<option value="True">True</option>
	</select>
<br>
AET:
<select id="aet" name="aet">
    	<option value="False">False</option>

	<option value="True">True</option>
	</select><br>
  <input type="submit" value="Submit">

</div></div></form>
</div>

 

<?php
   if( $_GET["DATE_MIN"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$minimumdate = $_GET["DATE_MIN"];
$maximumdate = $_GET["DATE_MAX"];
$minimumround = $_GET["round_min"];
$maximumround = $_GET["round_max"];
$penalties = $_GET["penalties"];
$aet = $_GET["aet"];

$away = $_GET["away"];
$home = $_GET["home"];
if(empty($home)){
	$home = "";
	} else {  
	$home = "and Home = '".$home."'"; 
	}
	if(empty($away)){
	$away = "";
	} else {  
	$away = "and Away = '".$away."'"; 
	}
$awayc1comp = $_GET["awayc1comp"];
$homec1comp = $_GET["homec1comp"];
$homescore = $_GET["homescore"];
$awayscore = $_GET["awayscore"];
if(empty($minimumround)){
	$minimumround = "1";
}else {$minimumround = $minimumround;}


$roundbetween = " and (Round BETWEEN " . $minimumround . " and " . $maximumround ." )";
if(strpos($awayc1comp, 'greaterthan') !== false){
	$awaycomparison = ">=";
}elseif(strpos($awayc1comp, 'lessthan') !== false){
	$awaycomparison = "<=";
}else{
	$awaycomparison = "=";
}
if(strpos($homec1comp, 'greaterthan') !== false){
	$homecomparison = ">=";
}elseif(strpos($homec1comp, 'lessthan') !== false){
	$homecomparison = "<=";
}else{
	$homecomparison = "=";
}
$awayscore = $_GET["awayscore"];
$homescore = $_GET["homescore"];
if(empty($awayscore)){
	$awayscore = 0;
}if(empty($homescore)){
	$homescore = 0;
}
$querystring = "select * from 2017teamdetail
where year between '" . $minimumdate . "' and '" . $maximumdate . "'
" . $away . " " . $home . "
and AWAY_SCORE " . $awaycomparison . " " . $awayscore . " and HOME_SCORE " . $homecomparison . " " . $homescore .  $roundbetween ."  and PK = '" . $penalties . "' and AET = '" . $aet . "'";

$result = $con->query($querystring);

echo " <table class='sortable' id='results'> 
<tbody>
   <tr id='headerrow'>
<th onclick='sortTable(0)'>GAMEID</th>
<th onclick='sortTable(1)'>AWAY</th>
<th onclick='sortTable(2)'>AWAY SCORE</th>

<th onclick='sortTable(3)'>HOME</th>
<th onclick='sortTable(4)'>HOME SCORE</th>


</tr> ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
echo '<td><a href="boxscore.php?query=' . $row['GAMEID'] . '&year='.$row['YEAR']. '">'. $row['GAMEID']. '</a>';
echo "<td>" . $row['AWAY'] . "</td>";
echo "<td>" . $row['AWAY_SCORE'] . "</td>";

echo "<td>" . $row['HOME'] . "</td>";
echo "<td>" . $row['HOME_SCORE'] . "</td>";

echo "</tr>";
	}
} else {
    echo "0 results";


echo "</tbody>
</table>";
}
mysqli_close($con);
   }
?>
</div>
</div>
   </body>
</html>

