<?php
$servername = "localhost";
$username = "phuc";
$password = "phuc";
$dbname = "ClassRoom_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$id_comment = $_POST['id_comment'];
$sql = "DELETE FROM comment WHERE id_comment=$id_comment";

if ($conn->query($sql) === TRUE) {
	header("Location: work_details.php");
}
?>