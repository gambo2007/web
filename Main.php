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
    $id_teacher = $_SESSION['id_account'];
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
    <form method="get" action="Main.php" class="form-inline ml-auto">
      <div class="md-form my-0">
        <input class="form-control" id="seach_content" name="seach_content" type="text" placeholder="Search for class" aria-label="Search">
      </div>
      <button class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Search</button>
    </form>
</nav>

<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="4">
            <form method="post" action="add_new_class.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
                <div class="form-group">
                    <input id="id_account_teacher" name="id_account_teacher" type="hidden" value=<?= $id_teacher ?> >
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">Create new classroom</button>
                </div>
            </form>
        </td>
		<td>
            <form method="post" action="ThongBao.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
                <div class="form-group">
                    <input id="id_account_teacher" name="id_account_teacher" type="hidden" value=<?= $id_teacher ?> >
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">Pending student list</button>
                </div>
            </form>
        </td>
    </tr>
    <tr class="header">
        <td>Image</td>
        <td>Class Name</td>
        <td>Class code</td>
        <td>Description</td>
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

	//truy van csdl, phan seach hay ko
    if(isset($_GET['seach_content']))
	   $sql = "SELECT * FROM class WHERE class.id_account_teacher=$id_teacher AND class.name LIKE '%".$_GET['seach_content']."%'";
    else
        $sql = "SELECT * FROM class WHERE class.id_account_teacher=$id_teacher";
	
    $result = $conn->query($sql) or die($conn->error);
	while ($row = $result->fetch_assoc()) {
	?>
    <tr class="item">
        <td>
            <form method="post" action="class_details.php" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <input id="id_class" name="id_class" type="hidden" value=<?= $row['id_class'] ?>>
                </div>
                <div class="form-group">
                    <input id="class_name" name="class_name" type="hidden" value="<?= $row['name'] ?>">
                </div>
                <div class="form-group">
                    <input id="id_teacher" name="id_teacher" type="hidden" value=<?= $id_teacher ?>>
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">See details</button>
                </div>
            </form>
        </td>
        <td><?php echo $row["name"] ?></td>
        <td><?php echo $row["code"] ?></td>
        <td><?php echo $row["description"]?></td>
        <td> | <a href="delete_class_class.php?id=<?php echo $row["id_class"] ?>" class="delete">Delete</a></td>
    </tr>
	<?php
	}
    $conn->close();
	?>
    <tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
        <td colspan="5">
            <p>Total class: <?php echo $result->num_rows ?></p>
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