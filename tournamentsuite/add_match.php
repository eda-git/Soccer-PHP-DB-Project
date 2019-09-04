<?php 
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!doctype html>
<!--
 MDL
 Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>TheCup.us Tournament Suite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="http://thecup.us/favicon.ico"><link rel="shortcut icon" href="http://thecup.us/favicon.ico" type="image/x-icon">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="TheCup.us Tournament Suite">
    <link rel="apple-touch-icon-precomposed" href="http://thecup.us/favicon.ico">
<style>
form#addmatch {
    text-align: center;
}

div#addmatch {
    margin-top: 26px;
}</style>
    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="http://thecup.us/favicon.ico">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">

     <link rel="stylesheet" href="mdl.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">TheCup.us Tournament Suite</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search">
              <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
           <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
              <script src="../tournamentsuite/js/about.js"></script>

          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
<div id="logo"></div>
          <div class="demo-avatar-dropdown">
            <span><?php echo htmlspecialchars($_SESSION['username']); ?> <a href="logout.php" class="btn btn-danger">Log Out</a></span>
            <div class="mdl-layout-spacer"></div>

          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                       <script src="../tournamentsuite/js/menu.js"></script>

					   </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-card mdl-cell mdl-cell--12-col">

<form id="addmatch" action="post_match.php" method="post">

<table id='matchtitle'>
<tbody>
Round: <input type="text" name="ROUND">
<br>  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <p>Date: <input type="text" name="DATE" id="datepicker"></p> 
  <div id="addmatch" class="away">Away Team: <select name="AWAY">

	  <?php
  
$con=mysqli_connect('server', 'username', 'password', 'db', 'port');// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
echo $querytest;
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
  </select>
  
  Away League:  <select name="AWAY_LEAGUE">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>


  </select><BR>
  Away Score: <input type='text' name='AWAY_SCORE'>
<br>
Away Penalty Kick Goals (set to 0 if no PKs): <input type='text' value="0" name='AWAY_PK'>

  <br></div><div id="addmatch" class="home">
  Home Team:
  
<select name="HOME">
	  <?php
  
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$year = $_GET["year"];
$querytest = 'select * from 2017teams order by Team';
echo $querytest;
$query = 'select * from 2017teams order by Team';
$result = mysqli_query($con,  $querytest);


while($row = mysqli_fetch_array($result))
{
echo '<option value="'. $row['Team'] . '">' . $row['Team']  . '</option>';
}


mysqli_close($con);
  
?>
</select>
  Home League: <select name="HOME_LEAGUE">
    <option value="mls">MLS</option>
	    <option value="usl">USL</option>

    <option value="nasl">NASL</option>
	    <option value="pdl">PDL</option>
			    <option value="npsl">NPSL</option>
    <option value="usasa">USASA</option>
</select><br>
Home Score: <input type='text' name='HOME_SCORE'>

<br>
Home Penalty Kick Goals (set to 0 if no PKs): <input type='text' value="0" name='HOME_PK'>
<br></div>
<div id="addmatch" class="match_info">
Head Referee: <input type='text' name='REFEREE'>
<br>
Match went to Penalties?: <select name="PK">
<option value="FALSE">FALSE</option>
<option value="TRUE">TRUE</option>

</select>
<br>
Additional Extra Time?: <select name="AET">
<option value="FALSE">FALSE</option>

<option value="TRUE">TRUE</option>
</select>
<br>
Venue: <input type='text' name='VENUE'>
<br>
Attendance (DO NOT USE COMMAS): <input type='text' name='ATTENDANCE'>
<br> 
Weather Description: 
<select name="WEATHER_DESC">
    <option value="Clear">Clear</option>
	    <option value="Partly Cloudy">Partly Cloudy</option>
	    <option value="Cloudy">Cloudy</option>

    <option value="Rain">Rain</option>
	    

			    <option value="Windy">Windy</option>
    <option value="Overcast">Overcast</option>
	<option value="Snow">Snow</option>
			    <option value="Blizzard">Blizzard</option>
	    <option value="Indoors">Indoors</option>

</select>
<br>
Temperature (if Indoors, set to 68): <input type='text' name='TEMPERATURE'>
<br></div>
</tbody>
</table>
<input type='submit'>
</form>

            </div>
			</main>
    </div>
     
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
