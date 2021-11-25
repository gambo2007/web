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

$id_class = $_POST['id_class'];
$id_student = $_POST['id_student'];
$sql = "DELETE FROM nav WHERE id_class=$id_class AND id_student_account=$id_student";

if ($conn->query($sql) === TRUE) {
	header("Location: student_list.php");
}
?>