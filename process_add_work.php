<?php
$title = $_POST["title"];
$description = $_POST["description"];
$id_class = $_POST['id_class'];


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


if(is_uploaded_file($_FILES['fileToUpload']['tmp_name']))
{
    $target_file = "uploads/" . $_FILES["fileToUpload"]["name"];
    $File_name = $_FILES["fileToUpload"]["name"];
    
    if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        die("Sorry, there was an error uploading your file.");
    }
        $sql = "INSERT INTO class_work(title, description, id_class, files) VALUES ('$title', '$description', $id_class, '$File_name')";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
          header("Location: class_details.php");
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

else
{
    $sql = "INSERT INTO class_work(title, description, id_class) VALUES ('$title', '$description', $id_class)";
    if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
          header("Location: class_details.php");
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>