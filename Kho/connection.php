<?php
$servername = "localhost";
$username = "phuc";
$password = "phuc";
$dbname = "classroomBD";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
 die('Kh?ng th? k?t n?i: ' . mysqli_error($conn));
 exit();
}
echo 'K?t n?i th?nh c?ng';
mysqli_close($conn);

?>