<?php
$user = $_POST["user"];
$pass = $_POST["pass"];
$first = $_POST['first'];
$last = $_POST['last'];


$servername = "localhost";
$username = "phuc";
$password = "phuc";
$dbname = "ClassRoom_final";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO student_account(user, pass, name) VALUES ('$user', '$pass', '$first $last')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: login.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>