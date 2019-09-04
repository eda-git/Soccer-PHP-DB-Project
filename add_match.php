<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add a Match</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <style>
  div#playerlist {
       display: inline-flex;
    width: 100%;
}
div#playerlist div {
    width: 50%;
}

div#away {
    float: left;
}

</style>

</head>
<body>
 
<form action="inputtest.php" method="post" id='matchform'>
Round: <input type="text" name="ROUND">
<br>
  <p>Date: <input type="text" name="DATE" id="datepicker"></p>
  Away Team: <select name="AWAY">

	  <?php
   if( $_GET["year"] ) {
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
echo $querytest;
$query = 'Select * from 2017teamdetail';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
   }
?>
  </select>
  Away League:  <select name="AWAY_LEAGUE">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>


  </select>
  <br>
  Home Team: <input type='text' name='HOME' class='hometeaminput'>  Home League: <select name="HOME_LEAGUE">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>

<input type="submit">

  </select>
 

  </form>
 
 <script>
$('.awayteaminput').keyup(function(event) {
  newText = event.target.value;
  $('.awayteam').text(newText);
});  

$('.hometeaminput').keyup(function(event) {
  newText = event.target.value;
  $('.hometeam').text(newText);
});  
</script>
</body>
</html>