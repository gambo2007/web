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
$id_class = 0;
$id_teacher = 0;
$code = $_POST['code'];
$student_name = $_POST['student_name'];
$id_student = $_POST['id_student'];

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

$sql = "SELECT * FROM class";

/*if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      //header("Location: Main.php");
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

$result = $conn->query($sql) or die($conn->error);

while($row = $result->fetch_assoc()){
    if($row['code']==$code){
        $id_class = $row['id_class'];
        $id_teacher = $row['id_account_teacher'];
        $sql2 = "INSERT INTO nav(id_class, id_student_account, student_name, id_account_teacher, valid) VALUES ($id_class, $id_student, '$student_name', $id_teacher, 0)";
        if (mysqli_query($conn, $sql2)) {
              echo "New record created successfully";
              mysqli_close($conn);
              header("Location: Main_s.php");
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
    echo "<h1>" . "Cant find this class" . "</h1>";
}
//header("Location: Main_s.php");
?>

</body>
</html>