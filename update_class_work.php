<?php
    session_start();
    //session_destroy();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        //exit();
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php 
        //$class_name = $_POST['class_name']; 
        $id_work = $_POST['id_work'];
        $title = $_POST['title'];
        $description = $_POST['description'];
    ?>
    <title>Update class work</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class="bg-light">

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

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://www.pngitem.com/pimgs/m/25-255694_classroom-icon-png-clipart-png-download-class-icon.png" alt="" width="72" height="72">
        <h2>Update Classwork </h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="process_update_work.php" method="POST" enctype="multipart/form-data">
			<?php
			$id = "";
            $file = "";
			
			if (isset($_GET["id"])) {
				$id = $_GET["id"];
				//require "connection.php";
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
				$sql = "SELECT * FROM class_work WHERE id=$id";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$title_work = $row["title"];
				$description = $row["description"];
			}
			?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
			<div class="mb-3">
              <label for="name">Title</label>
              <div class="input-group">
                <input value="<?php echo $title ?>" type="text" class="form-control" id="title" name="title" required>
              </div>
            </div>
			
			
			<div class="mb-3">
              <label for="description">Description</label>
              <div class="input-group">
                <textarea class="form-control" id="description" name="description" required><?php echo $description ?></textarea>
              </div>
            </div>

            <div class="mb-3">
              <label for="fileToUpload">Upload file</label>
              <div class="input-group">
                <input type="file" id="fileToUpload" name="fileToUpload">
              </div>
            </div> 
         
			<div class="form-group">
                <input id="id_work" name="id_work" type="hidden" value=<?= $id_work ?>>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
          </form>
        
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020 Classroom</p>
      </footer>
    </div>

  </body>
</html>