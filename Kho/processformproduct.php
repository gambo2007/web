<?php
$name = $_POST["name"];
$code = $_POST["code"];
$description = $_POST["description"];
$id_teacher = $_POST['id_account_teacher'];

//require "connection.php";

/*if (empty($_POST["id"])) {
	$stmt = $conn->prepare("INSERT INTO class(name, code, description) VALUES (?, ?, ?, ?)");
} else {
	$id = $_POST["id"];
	$stmt = $conn->prepare("UPDATE class SET name=?, code=?, description=? WHERE id=$id");
}

$stmt->bind_param("ssiss", $name, $code, $description);

if ($stmt->execute() === TRUE) {
  header("Location: list.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} */

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

$sql = "INSERT INTO class(name, code, description, id_account_teacher) VALUES ('$name', '$code', '$description', $id_teacher)";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: Main.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>