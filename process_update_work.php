<?php
$title = $_POST["title"];
$description = $_POST["description"];
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

if( (file_exists($_FILES['fileToUpload']['tmp_name']) && !is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) || (!file_exists($_FILES['fileToUpload']['tmp_name']) && !is_uploaded_file($_FILES['myfile']['tmp_name'])) )
{
    $sql = "UPDATE class_work SET title='$title', description='$description' WHERE id_work=$id_work";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
          //header("Location: work_details.php");
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if(is_uploaded_file($_FILES['fileToUpload']['tmp_name']))
{
    $target_file = "uploads/" . $_FILES["fileToUpload"]["name"];
    $File_name = $_FILES["fileToUpload"]["name"];
    
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        die("Sorry, there was an error uploading your file.");
    }
    $sql = "UPDATE class_work SET title='$title', description='$description', files='$File_name' WHERE id_work=$id_work";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
          //header("Location: work_details.php");
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>