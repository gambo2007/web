
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
  <a class="navbar-brand" href="#"></a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
  </ul>
</nav>

<?php $id_class = $_POST['id_class'];
      $name = $_POST['class_name'];
      $id_teacher = $_POST['id_teacher'];
 ?>

<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

    <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
        <td colspan="4">
           <form method="post" action="student_list.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
                <div class="form-group">
                    <input id="id_class" name="id_class" type="hidden" value=<?= $id_class ?>>
                </div>
                <div class="form-group">
                    <input id="class_name" name="class_name" type="hidden" value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <input id="id_teacher" name="id_teacher" type="hidden" value=<?= $id_teacher ?>>
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">List of students in this class</button>
                </div>
            </form>
        </td>
        <td colspan="4">
            <form method="post" action="add_class_work.php" class="rounded w-100 mb-5 mx-auto px-3 pt-3">
                <div class="form-group">
                    <input id="id_class" name="id_class" type="hidden" value="<?= $id_class ?>">
                </div>
                <div class="form-group">
                    <input id="class_name" name="class_name" type="hidden" value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">Add new classwork</button>
                </div>
            </form>
        </td>
    </tr>
    <tr class="header">
        <td></td>
        <td>Work title</td>
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

$id_class = $_POST['id_class'];
	//require "connection.php";
	$sql = "SELECT * FROM class_work WHERE id_class=$id_class";
	$result = $conn->query($sql) or die($conn->error);
	while ($row = $result->fetch_assoc()) {
        //$id_work = $row[];
        $work_name = $row['title'];
        $description = $row["description"];
        $date = $row['date_create'];
	?>
    <tr class="item">
        <td>
            <form method="post" action="work_details.php" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <input id="id_work" name="id_work" type="hidden" value=<?= $row['id_work'] ?>>
                </div>
                <div class="form-group">
                    <input id="work_name" name="work_name" type="hidden" value="<?= $row['title'] ?>">
                </div>
                <div class="form-group">
                    <input id="description" name="description" type="hidden" value="<?= $row['description'] ?>">
                </div>
                <div class="form-group">
                    <input id="date" name="date" type="hidden" value="<?= $row['date_create'] ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success px-5">View details</button>
                </div>
            </form>
        </td>
        <td><?php echo $row["title"] ?></td>
        <td><?php echo $row["description"]?></td>
        <td><a href="formproduct.php?id=<?php echo $row["id"] ?>">Edit</a> | <a href="delete.php?id=<?php echo $row["id"] ?>" class="delete">Delete</a></td>
    </tr>
	<?php
    $name = $_POST["class_name"];
	}
    $conn->close();
    ?>
    <h1 id="class_name"><?php echo $name?></h1>
	


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