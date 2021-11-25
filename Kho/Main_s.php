<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
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

<?php 
    $logo = '';
    $code = '';
    if(isset($_POST['user'])=="teacher"){
        $logo = "https://previews.123rf.com/images/vectorgalaxy/vectorgalaxy1805/vectorgalaxy180500903/101157248-teacher-logo-isolated-on-white-background-for-your-web-and-mobile-app-design-colorful-vector-icon.jpg";
    }
?>

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
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search for class </button>
  </form>
</nav>


<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="4">
            
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Join new class</button>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Join new class with code</h4>
                  </div>
                  <div class="modal-body">
                        <form method="post" action="join_new_class.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
                            <div class="form-group">
                                <input name="code" id="code" type="text" class="form-control" placeholder="Enter class code">
                            </div>
                            <div class="form-group">
                                <input id="id_student" name="id_student" type="hidden" value=4>
                            </div>
                            <div class="form-group">
                                <input id="student_name" name="student_name" type="hidden" value="Student 4">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success px-5">Join to new classroom</button>
                            </div>
                        </form>
                  </div>
                </div>
              </div>
             </div>
            
        </td>
		<td>
            <a href="logout.php">Logout</a>
        </td>
    </tr>
    <tr class="header">
        <td></td>
        <td>Class Name</td>
        <td>Class code</td>
        <td>Description</td>
        <td></td>
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
	$sql = "SELECT * FROM class WHERE id_class IN (SELECT id_class FROM nav WHERE id_student_account=4 AND valid=1)";
	$result = $conn->query($sql) or die($conn->error);
	while ($row = $result->fetch_assoc()) {
	?>
    <tr class="item">
        <td>
            <form method="post" action="class_details.php" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <input id="id_class" name="id_class" type="hidden" value="<?= $row['id_class'] ?>">
                </div>
                <div class="form-group">
                    <input id="class_name" name="class_name" type="hidden" value="<?= $row['name'] ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">See details</button>
                </div>
            </form>
        </td>
        <td><?php echo $row["name"] ?></td>
        <td><?php echo $row["code"] ?></td>
        <td><?php echo $row["description"]?></td>
    </tr>
	<?php
	}
    $conn->close();
	?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Total classes: <?php echo $result->num_rows ?></p>
        </td>
    </tr>
</table>


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