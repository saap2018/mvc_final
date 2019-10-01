<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO nivel(id_nivel, nivel, Estado) VALUES (NULL,'".$_POST['rol']."','".$_POST['estado']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>