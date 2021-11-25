<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add new class room</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
   
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"> <img href="<?php echo $logo?>" > logo </a>

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

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://www.pngitem.com/pimgs/m/25-255694_classroom-icon-png-clipart-png-download-class-icon.png" alt="" width="72" height="72">
        <h2>Add new classroom</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="processformproduct.php" method="POST" enctype="multipart/form-data">
			<?php
			$id = "";
			$name = "";
			$code = "";
			$description = "";
            $id_account_teacher = $_POST['id_account_teacher'];
			
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
				$name = $row["name"];
				$code = $row["code"];
				$description = $row["description"];
			}
			?>
            <input type="hidden" name="id" value="<?php echo $id ?>">
			<div class="mb-3">
              <label for="name">Class Name</label>
              <div class="input-group">
                <input value="<?php echo $name ?>" type="text" class="form-control" id="name" name="name" required>
              </div>
            </div>
			

			<div class="mb-3">
              <label for="code">Class code</label>
              <div class="input-group">
                <input value="<?php echo $code ?>" type="text" class="form-control" id="code" name="code" required>
              </div>
            </div>
			
			<div class="mb-3">
              <label for="description">Description</label>
              <div class="input-group">
                <textarea class="form-control" id="description" name="description" required><?php echo $description ?></textarea>
              </div>
            </div>
			
			<div class="input-group">
                <input value="<?php echo $id_account_teacher ?>" type="hidden" class="form-control" id="id_account_teacher" name="id_account_teacher" required>
              </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020 Classroom</p>
      </footer>
    </div>

  </body>
</html>