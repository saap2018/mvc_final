<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saap";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT cantidad FROM parametros";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["cantidad"]."<br>";
		$limite = $row["cantidad"];
    }
} else {
    echo "0 results";
}
//$limite = $row["cantidad"];
			echo $limite;
			for($i = 1; $i <= $limite;$i++)
			{
				$cambiar = "UPDATE disponibilidad SET Disponibilidad ='Activo' where IdLugar ='$i'";
				$update= mysqli_query($conn, $cambiar);	
				//echo $cambiar;
				echo "</br>".$i."</br>";
				
			}
			header("Location: admin.php");
mysqli_close($conn);
?>
