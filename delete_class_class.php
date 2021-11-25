<?php
$servername = "localhost";
$username = "phuc";
$password = "phuc";
$dbname = "ClassRoom_final";

$id_class = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

/*$sql = "DELETE FROM comment WHERE comment.id_work IN (SELECT class_work.id_work FROM class_work WHERE class_work.id_class=$id_class)";

if ($conn->query($sql) === TRUE) {
	//header("Location: work_details.php");
}

$sql = "DELETE FROM class_work WHERE class_work.id_class=$id_class";
if ($conn->query($sql) === TRUE) {
	//header("Location: class_details.php");
}*/

$sql = "DELETE FROM class WHERE id_class=$id_class";
if ($conn->query($sql) === TRUE) {
	header("Location: Main.php");
}

echo("Error description: " . $conn -> error);


?>