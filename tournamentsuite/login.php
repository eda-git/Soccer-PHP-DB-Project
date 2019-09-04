<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 

<html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.getmdl.io/1.2.0/material.min.js"> </script> 
<link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:700" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"> 

 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 

 <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.deep_purple-pink.min.css">
<link rel="stylesheet" href="tabs.css">

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

<div id="season">TheCup.us</div>

</div> 



<div id="rightid">

<div id="teamlogo"></div> 

<div id="teamrightid" class="organization">


<hr id="rightidline"> </hr>

<div id="date">

</div>

</div>

</div>

</div>



<div id="nav">

<ul>



</ul>

</div>



<div id="normal">
<div>
 <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>




</div>



<div id="rightcard" style="display: none">



</div>

</div>



</div>



<div id="middle">

<div>

<div id="leftcard">

<div id ="topheadline">



</div>







</div>



</div>



</div>








</body>

</head>

</html>