<?php
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:700" rel="stylesheet">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
 <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.deep_purple-pink.min.css">
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  
  <script type="text/javascript" src="http://www.google.com/jsapi"> 
<script async="" src="//www.google-analytics.com/analytics.js">
</script>
<link rel="stylesheet" type="text/css" href="style.css"> 
<link rel="stylesheet" type="text/css" href="zoomfixes.css">


<script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.js">
</script> 
<script type="text/javascript" src="http://fiddle.jshell.net/js/lib/yui-min-3.3.0.js">
</script> 

<script src="//code.jquery.com/jquery-1.10.2.js">
</script> 
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js">
</script> 

<script type="text/javascript" src="http://absoluterad.com/sports/rssdisplayer.js">
</script> 
<script type="text/javascript">$(document).ready(function(){$("#loading_wrap").remove()});
</script>

</head>
<body>
<div id="top">
<div id="leftid">
<div id ="suiteid"> Tournament Suite </div> 
<div id="season">Season 2017-18</div>
</div> 

<div id="rightid">
<div id="teamlogo"></div> 
<div id="teamrightid">
<div id="loginname"><?php echo htmlspecialchars($_SESSION['username']); ?> <a href="logout.php" class="btn btn-danger">Log Out</a></div>
<hr id="rightidline"> </hr>
<div id="date">
</div>
</div>
</div>

<div id="nav">
<ul>

</ul>
</div>

<div class="add_matches" id="middle">
  


</div>

<div id="rightcard" style="display: none">

</div>
</div>

</div>



</body>
</head>
</html>