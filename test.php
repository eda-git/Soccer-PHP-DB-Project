<?php
$mysqli_connection = new MySQLi('SERVER', 'USERNAME', 'PASSWORD', 'DB', 'PORT');
if($mysqli_connection->connect_error){
   echo "Not connected, error: ".$mysqli_connection->connect_error;
}
else{
   echo "Connected.";
}


$sql = "SELECT * FROM 2017teams";
$result = $mysqli_connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["Team"]. " - Name: " . $row["Color"]. " " . $row["League"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>