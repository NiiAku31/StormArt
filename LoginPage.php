<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link href="login.css" type="text/css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/c3d20afb9f.js" crossorigin="anonymous"></script>	
</head>
</head>
<body>
<nav class = "navbar navbar-light bg-transparent">
    <div class="container-fluid">
      <div class="navbar-header">
          <a class="navbar-brand" href="javascript:void(0)">
                <img src="images/logo.jpg" alt="" width="120" height="80">
          </a>
      </div>
  <ul class="nav justify-content-end">
        <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="stormArtClientpage.php">Clients</a>
        </li>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown">Website</a>
      <ul class="dropdown-menu">
           <li><a class="dropdown-item" href="stormArtEventsandAuctions.php"> Events and Auctions</a></li>
           <li><a class="dropdown-item" href="stormArtOnlineShowRoom.php"> Online Show Room </a></li>
      </ul>
        <li class="nav-item">
      <a class="nav-link" href="Contact.php">Contact</a>
        </li>
    </ul>
</div>
</nav>
<div style="float: right;" class="mt-3 mr-3">
    <a href="admin/adminlogin.php"><button class="btn btn-primary">ADMIN</button></a>
  </div>
  
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container">
    <div class="card login-card">
      <div class="row no-gutters">
        <div class="col-md-5">
          <img src="images/photo.jpg" alt="login" class="login-card-img" width="450" height="550">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <div class="brand-wrapper">
              <img src="images/logo.jpg" alt="logo" class="logo" width="100" height="80">
            </div>
            <p class="login-card-description">Sign into your account</p>
            <form action="LoginPage.php" method="post">
              <div class="form-group">
                 <label for="email" >Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                 <label for="password" >Password</label> 
                  <input type="password" name="password" class="form-control" required >

                 
                </div>
               <input name="submit" id="submit" class="btn btn-dark btn-lg login-btn mb-4" type="submit" value="Login">
              </form>
              <p class="login-card-footer-text">Don't have an account? <a href="Signuppage.php" class="text-reset">Register here</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php

  if (isset($_POST['submit']))
  {
    include('database_connection.php');

    $uname = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM customer WHERE email = '$uname' AND password = '$password'";
    $run = mysqli_query($conn, $query);

    $row = mysqli_num_rows($run);

    if ($row < 1)
    {
      ?>

      <script>
        alert("Email & Password do not match!");
        window.open('LoginPage.php','_self');
      </script>

      <?php
    }
    else
    {
      session_start();
      $data = mysqli_fetch_assoc($run);
      $id = $data['id'];

      $_SESSION['uid'] = $id;

      ?>
        <script>
          window.open('stormArtOnlineShowRoom.php?uid=<?php echo $id ?>','_self');
        </script>
      <?php

    }
  }

?>





                














<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>