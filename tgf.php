
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="./css/default.css" rel="stylesheet">
<link rel="shortcut icon" href="http://thecup.us/favicon.ico" type="image/x-icon">

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
<form action="tgf.php">
    <div id="columns"><div>
        <input type="radio" name="match" value="single" style="visibility: visible;" checked=""> Single Game
<br>
<input type="radio" name="match" value="cumulative" style="visibility: visible;"> Combined Games
    </div>
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
    <input type="radio" name="playervalue" value="goalkeeper">Goalkeeper <br>
  <input type="radio" name="playervalue" value="outfield" checked=""> Outfield players <br>
        </div></div><div id="columns">
<div id="selector" class="year">
    <div>Player's Team  <br><select id="team" name="team" class="no_chosen">
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
    <br><input type="radio" name="location" value="home">Home
    <br><input type="radio" name="location" value="away">Away<br>
  <input type="radio" name="location" value="" checked="">Either<br>
        </div></div><div id="columns">
<div id="selector" class="year">
    <div>Opponent  <br><select id="opponent" name="opponent" class="no_chosen">
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
    <br><input type="radio" name="result" value="Win">Wins
    <br><input type="radio" name="result" value="Loss">Loss<br>
  <input type="radio" name="result" checked value="">Either<br>
        </div></div>
<div id="columns">


<div><div>
	<select name="c1stat" id="c1stat">
		<option value="">Choose</option>
		
		
		<option value="goals">Goals</option>
		
		<option value="assists">Assists</option>
		
		<option value="minutes played">Minutes Played</option>
<option value="yellow card">Yellow Card</option>
<option value="red card">Red Card</option>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</select>
		
        <select name="c1comp" id="c1comp" class="criteria-comp">
              
              <option value="greaterthan">&gt;=</option>
	      
              <option value="lessthan">&lt;=</option>
	      
              <option value="equal">=</option>
	      
	</select>

 	<input type="text" name="c1val" id="c1val" value="" size="4" class="criteria-val">
</div><div>Sort by<br><select id="orderby" name="orderby" class="no_chosen">
	
	<option value="goals">Goals</option>
    	<option value="assists">Assists</option>

    	<option value="minutes played">Minutes Played</option>

    	<option value="red card">Red Card</option>
        	<option value="yellow card">Yellow Card</option>


</select>
</div>
  <input type="submit" value="Submit">

</div></div></form>

 
</div>
</div>
</div>
<?php
   if( $_GET["DATE_MIN"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//c1stat=&c1comp=greaterthan&c1val=
/*
DATE_MIN=2017&DATE_MAX=2017
&round_min=&round_max=8
&playervalue=outfield
&team=AFC+Cleveland
&location=
&opponent=Atlanta+United&result=&c1stat=goals&
c1comp=greaterthan&c1val=2&orderby=goals
*/
$minimumdate = $_GET["DATE_MIN"];
$maximumdate = $_GET["DATE_MAX"];
$c1comp = $_GET["c1comp"];
if(strpos($c1comp, 'greaterthan') !== false){
	$comparison = ">=";
}elseif(strpos($c1comp, 'lessthan') !== false){
	$comparison = "<=";
}else{
	$comparison = "=";
}
$round_min = strlen($_GET['round_min']);
if(strpos($round_min, '0') !== false){
	$minimumround = "1";
}else{
	$minimumround =  $_GET['round_min'];
}
/*echo $clcomp;
echo $minimumround;
*/
$datebetween = "between " . $minimumdate . " and " . $maximumdate;
$c1val = $_GET["c1val"];
$c1stat = $_GET["c1stat"];
$false = "'False'";
echo "SELECT * from 2017teamdetail where "  . $c1stat . $comparison . $c1val . $datebetween;
echo '<br>select Round, home, away, year, date, away_score, home_score from 2017teamdetail 
where Round >= ' . $minimumround . ' and (home_score ' .  $comparison . ' ' . $c1val . ' or away_score ' .  $comparison . ' ' . $c1val . ') and PK = ' . $false . ' and AET = ' . $false . ' ' . $datebetween;
mysqli_close($con);
   }
?>
   </body>
</html>