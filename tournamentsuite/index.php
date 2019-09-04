<?php // Initialize the session
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

          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
<div class="mdl-card mdl-cell mdl-cell--12-col">

<?php 
      $con=mysqli_connect('server', 'username', 'password', 'db', 'port');$query = 'Select * from 2017teamdetail';
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
            </div>
			</main>
    </div>
     
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
