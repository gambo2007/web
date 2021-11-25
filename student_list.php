<?php
    session_start();
    //session_destroy();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        //exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class work</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
</head>
<body>

<style>
    body{
        padding-top: 0px;
    }
    #class_name{
        text-align: center;
        padding: 10px;
        background-color: #d9edf7;
    }
    table{

        text-align: center;
    }
    td{
        padding: 10px;
    }
    tr.item{
        border-top: 1px solid #5e5e5e;
        border-bottom: 1px solid #5e5e5e;
    }

    tr.item:hover{
        background-color: #d9edf7;
    }

    tr.item td{
        min-width: 150px;
    }

    tr.header{
        font-weight: bold;
    }

    a{
        text-decoration: none;
    }
    a:hover{
        color: deeppink;
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"> Welcome <?= $_SESSION['name'] ?> </a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="login.php">Home</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Menu
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="reset_password.php">Reset password</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>

<?php 
      $name = '';
      if(isset($_POST['id_class']) && isset($_POST['id_teacher']))
      {
          $id_class = $_POST['id_class'];
          $name = $_POST['class_name'];
          //$name = $_POST['class_name'];
          $id_teacher = $_POST['id_teacher'];
          $_SESSION['id_class'] = $id_class;
          $_SESSION['id_teacher'] = $id_teacher;
      }
      else
      {
          $id_class = $_SESSION['id_class'];
          $id_teacher = $_SESSION['id_teacher'];
          //$_SESSION['id_class'] = '';
          //$_SESSION['id_teacher'] = '';
      }
      
 ?>

<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="4">
           
        </td>
        <td colspan="4">
            
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add new student to this classroom</button>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Add new student by username</h4>
                  </div>
                  <div class="modal-body">
                        <form method="post" action="join_new_class.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
                            <div class="form-group">
                                <input name="student_user" id="student_user" type="text" class="form-control" placeholder="Enter student user here">
                            </div>
                            <div class="form-group">
                                <input id="id_class" name="id_class" type="hidden" value=<?= $id_class ?>>
                            </div>
                            <div class="form-group">
                                <input id="id_teacher" name="id_teacher" type="hidden" value=<?= $id_teacher ?>>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success px-5">Add this student</button>
                            </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>
        
        </td>
    </tr>
    <tr class="header">
        <td></td>
        <td>Student name</td>
        <td>Action</td>
    </tr>
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

    if(isset($_POST['id_class']))
      {
          $id_class = $_POST['id_class'];
          $_SESSION['id_class'] = $id_class;
          
      }
      else
      {
          $id_class = $_SESSION['id_class'];
          //$_SESSION['id_class'] = '';
      }
    //$id_class = $_POST['id_class'];
	//require "connection.php";
	$sql = "SELECT * FROM nav WHERE id_class=$id_class AND valid=1";
	$result = $conn->query($sql) or die($conn->error);
	while ($row = $result->fetch_assoc()) {
        //$id_work = $row[];
	?>
    <tr class="item">
        <td>
            
        </td>
        <td><?php echo $row["student_name"] ?></td>
        <td> 
            <form method="post" action="delete_student.php" class="mx-auto">
                <div class="form-group">
                    <input id="id_class" name="id_class" type="hidden" value=<?= $id_class ?>>
                </div>
                <div class="form-group">
                    <input id="id_student" name="id_student" type="hidden" value=<?= $row['id_student_account'] ?>>
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-2">Delete this student</button>
                </div>
            </form>
        </td>
    </tr>
	<?php
    if(isset($_POST['class_name']))
    {
        $name = $_POST['class_name'];
        $_SESSION['class_name'] = $_POST['class_name'];
    }
    else
    {
        $name = $_SESSION['class_name'];
        //$_SESSION['class_name'] = '';
    }
	}
    $conn->close();
    ?>
    
    <h1 id="class_name"><?php echo $name?></h1>
	


<!-- Delete Confirm Modal -->
<div id="deletemyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>

        </div>

    </div>
</div>


</body>
</html>