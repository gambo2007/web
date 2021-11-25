<?php
$servername = "localhost";
$username = "phuc";
$password = "phuc";
$dbname = "ClassRoom_final";

$id_student = $_POST['id_student'];
$id_class = $_POST['id_class'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE nav SET valid=1 WHERE id_class=" . $id_class . " AND id_student_account=" . $id_student;
$result = $conn->query($sql) or die($conn->error);
$conn->close();
header("Location: ThongBao.php");
exit();

?>