<?php
    session_start();
    //session_destroy();
    if (isset($_SESSION['iden'])) {
        if($_SESSION['iden'] == 1)
            header('Location: Main.php');
        if($_SESSION['iden'] == 2)
            header('Location: Main_s.php');
        if($_SESSION['iden'] == 0)
            header('Location: login.php');
        //exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login to classroom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php

    
    $error = '';
    $user = '';
    $pass = '';
    $name = '';
    $id_account = '';
    $action = '';


       function check()
       {
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
            $sql = "SELECT * FROM teacher_account";
	       $result = $conn->query($sql) or die($conn->error);
       if (isset($_POST['user']) && isset($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
    
            if (empty($user)) {
                $error = 'Please enter your username';
            }
            else if (empty($pass)) {
                $error = 'Please enter your password';
            }
            else if (strlen($pass) < 6) {
                $error = 'Password must have at least 6 characters';
            }
            else{
                while($row = $result->fetch_assoc()){
                    if($row['user']==$user && $row['pass']==$pass){
                        $_SESSION['user'] = $user;
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id_account'] = $row['id_account'];
                        $_SESSION['iden'] = 1;
                        $name = $row['name'];
                        $id_account = $row['id_account'];
                        //header('Location: Main.php');
                        //session_destroy();
                        return 1;
                        exit();
                    }
                }
                
                $sql = "SELECT * FROM student_account";
	            $result = $conn->query($sql) or die($conn->error);
                while($row = $result->fetch_assoc()){
                    if($row['user']==$user && $row['pass']==$pass){
                        $_SESSION['user'] = $user;
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id_account'] = $row['id_account'];
                        $_SESSION['iden'] = 2;
                        $name = $row['name'];
                        $id_account = $row['id_account'];
                        //header('Location: Main.php');
                        //session_destroy();
                        return 2;
                        exit();
                    }
                }
            $error = 'Invalid username or password';
            return 0;
            }
         }
      }
                

                     /*
                        else if ($user == 'admin' && $pass == '123456') {
                        // success
    
                        $_SESSION['user'] = 'admin';
                        $_SESSION['name'] = 'Nguyen Huu Tai';
    
                        header('Location: index.php');
                        exit();
                    }else {
                        $error = 'Invalid username or password';
                    }
                 
                    #$result = login($user,$pass);
            if($result['code'] == 0){
                $data = $result['data'];
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $data['firstname'].''.$data['lastname'];
                if($user =="nhtai"){
                    header('Location: admin.php');
                    exit();
                }
                else{
                    header('Location: index.php');
                    exit();
                }


            }
            else {
                $error = $result['error'];
            }
        }
    }*/
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Welcome to Classroom</h3>
            
            <form method="post" action="<?= $action ?>" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">User account</label>
                    <input  name="user" id="user" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="pass" id="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input <?= isset($_POST['remember']) ? 'checked' : '' ?> name="remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Remember login</label>
                </div>
                <div class="form-group">
                    <p>Don't have an account yet? <a href="register.php">Register now</a>.</p>
                    <p>Forgot your password? <a href="forgot.php">Reset your password</a>.</p>
                </div>
                <div class="form-group">
                    <input id="name" name="name" type="hidden" value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <input id="id_account" name="id_account" type="hidden" value="<?= $id_account ?>" >
                </div>
                <div class="form-group">
                    <?php
                        /*if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }*/
                        if (check()==1) {
                            $action="Main.php";
                            //session_start();
                            header('Location: Main.php');
                            exit();
                        }
                        if (check()==2) {
                            $action="Main_s.php";
                            //session_start();
                            header('Location: Main_s.php');
                            exit();
                        }
                        if (check()==0)
                        {
                            $action="login.php";
                        }
                    ?>
                    <button class="btn btn-success px-5">Login</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>