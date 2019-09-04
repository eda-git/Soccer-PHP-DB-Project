<html>
<head>
</head>
<body>
<?php
  
// Create connection
$conn = mysqli_connect('SERVER', 'USERNAME', 'PASSWORD', 'DB', 'PORT');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$queries = array();
foreach($_POST['sql'] as $sql)
{
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

/*
$sql = $_POST['sql'] . "; 

" . $_POST['teamdata'] . "; 

" . $_POST['awaystat'] . "; 

" . $_POST['homestat'] . ";";
echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
$conn->close();
?>


</body>
</html>