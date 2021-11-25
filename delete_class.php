<?php
$servername = "localhost";
$username = "phuc";
$password = "phuc";
$dbname = "ClassRoom_final";

$id = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM comment WHERE id_work=$id";

if ($conn->query($sql) === TRUE) {
	//header("Location: work_details.php");
}

$sql = "DELETE FROM class_work WHERE id_work=$id";
if ($conn->query($sql) === TRUE) {
	header("Location: class_details.php");
}

?>