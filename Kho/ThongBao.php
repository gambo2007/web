
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pending list</title>
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
    $id_teacher = $_POST['id_account_teacher'];
    if(isset($_POST['user'])=="teacher"){
        $logo = "https://previews.123rf.com/images/vectorgalaxy/vectorgalaxy1805/vectorgalaxy180500903/101157248-teacher-logo-isolated-on-white-background-for-your-web-and-mobile-app-design-colorful-vector-icon.jpg";
    }
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Teacher 
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="reset_password.php">Reset password</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="login.php">Home</a>
    </li>
  </ul>
</nav>

<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">
    <tr class="header">
        <td></td>
        <td>Class Name</td>
        <td>Student name</td>
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
    $sql = "SELECT * FROM nav WHERE valid=0 AND id_account_teacher=$id_teacher";
	$result = $conn->query($sql) or die($conn->error);
	while ($row = $result->fetch_assoc()) {
        $sql2 = "SELECT * FROM class WHERE id_class=" . $row["id_class"] . " AND id_account_teacher=1";
	    $result2 = $conn->query($sql2) or die($conn->error);
        $row2 = $result2->fetch_assoc();
	?>
    <tr class="item">
        <td>
            <form method="post" action="ok.php" class=" rounded w-100 mb-5 mx-auto px-3 pt-3">
                <div class="form-group">
                    <input id="id_class" name="id_class" type="hidden" value="<?= $row['id_class'] ?>" >
                </div>
                <div class="form-group">
                    <input id="id_student" name="id_student" type="hidden" value="<?= $row['id_student_account'] ?>" >
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">Respond</button>
                </div>
            </form>
        </td>
        <td><?php echo $row2["name"] ?></td>
        <td><?php echo $row["student_name"] ?></td>
    </tr>
	<?php
	}
    $conn->close();
	?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Total nofication: <?php echo $result->num_rows ?></p>
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