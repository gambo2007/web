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
    <title>Work details</title>
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
    if(isset($_POST['id_work']))
    {
        $id_work = $_POST['id_work'];
        $_SESSION['id_work'] = $id_work;
    }
    else
    {
        $id_work = $_SESSION['id_work'];
        //$_POST['id_work'] = $id_work;
    }
    
    $user_name = $_SESSION['name'];
 ?>

<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="4">
           
        </td>
        <td colspan="4">
            
        </td>
    </tr>
    <tr class="header">
        <td>Name</td>
        <td>Comment</td>
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

	//require "connection.php";
	$sql = "SELECT * FROM comment WHERE id_work=$id_work";
	$result = $conn->query($sql) or die($conn->error);
	while ($row = $result->fetch_assoc()) {
	?>
    <tr class="item">
        <td>
            <?php echo $row["name"] ?>
        </td>
        <td><?php echo $row["comment"] ?></td>
    </tr>
	<?php
    //$name = $_POST["class_name"];
	}
    //$conn->close();
    ?>
    <h1 id="class_name">
        <?php 
            if(isset($_POST['work_name']))
            {
                echo $_POST['work_name'];
                $_SESSION['work_name'] = $_POST['work_name'];
            }
            else
            {
                echo $_SESSION['work_name'];
                $_POST['work_name'] = $_SESSION['work_name'];
                //$_SESSION['work_name'] = '';
            }
        ?>
    </h1>
    <p>
        <?php 
            if(isset($_POST['description']))
            {
                echo $_POST['description'];
                $_SESSION['description'] = $_POST['description'];
            }
            else
            {
                echo $_SESSION['description'];
                $_POST['description'] = $_SESSION['description'];
                //$_SESSION['description'] = '';
            }
        ?>
    <p>
    <p> Thoi gian dang: 
        <?php 
            if(isset($_POST['date']))
            {
                echo $_POST['date'];
                $_SESSION['date'] = $_POST['date'];
            }
            else
            {
                echo $_SESSION['date'];
                $_POST['date'] = $_SESSION['date'];
                //$_SESSION['date'] = '';
            }
        ?>
    <p>
    <p>  File for this classwork: 
        <?php 
            $sql = "SELECT * FROM class_work WHERE id_work=$id_work";
	       $result = $conn->query($sql) or die($conn->error);
	       while ($row = $result->fetch_assoc()) {
                echo "<a href=download_file.php?nama=" .$row['files']. ">" .$row['files']. "</a>";
            }
           $conn->close();
        ?>
    <p>
</table>


<form method="post" action="proc_add_comment.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
    <div class="mb-3">
      <label for="name">New comment</label>
      <div class="input-group">
        <input type="text" class="form-control" id="comment" name="comment" required>
      </div>
    </div>
    <div class="form-group">
        <input id="id_work" name="id_work" type="hidden" value=<?= $id_work ?>>
    </div>
    <div class="form-group">
        <input id="user_name" name="user_name" type="hidden" value="<?= $user_name ?>">
    </div>
    <div class="form-group">
        <button class="btn btn-success px-5">Add comment</button>
    </div>
</form>

<!-- Delete Confirm Modal -->
<div id="myModal" class="modal fade" role="dialog">
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