<?php
session_start();
    
$comment = $_POST['comment'];
$user_name = $_POST['user_name'];
$id_work = $_POST['id_work'];


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

$sql = "INSERT INTO comment(id_work, comment, name) VALUES ($id_work, '$comment', '$user_name')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
        if($_SESSION['iden'] == 1)
            header('Location: work_details.php');
        if($_SESSION['iden'] == 2)
            header('Location: work_details_s.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>