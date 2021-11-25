<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>join new class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>

<?php
$id_class = $_POST["id_class"];
$student_user = $_POST["student_user"];
//$id_class = '';
$id_teacher = $_POST['id_teacher'];

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

$sql = "SELECT * FROM student_account";

/*if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      //header("Location: Main.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

$result = $conn->query($sql) or die($conn->error);

while($row = $result->fetch_assoc()){
    if($row['user']==$student_user){
        $student_name = $row['name'];
        $id_student = $row['id_account'];
        $sql2 = "INSERT INTO nav(id_class, id_student_account, student_name, id_account_teacher, valid) VALUES ($id_class, $id_student, '$student_name', $id_teacher, 1)";
        if (mysqli_query($conn, $sql2)) {
              echo "New record created successfully";
              mysqli_close($conn);
              header("Location: student_list.php");
              break;
        } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
    }
    else{
        $check = 1;
        $error = 'Cant find classroom!'; 
        //echo '<script>alert("Cant find classroom!)</script>';
    }
}
if($check==1){
    echo "<h1>" . "Cant find this student!" . "</h1>";
}
//header("Location: Main_s.php");
?>

</body>
</html>