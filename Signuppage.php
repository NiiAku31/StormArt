<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Signup.css" type="text/css" rel="stylesheet" />
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
            </li>
            <li class="nav-item">
          <a class="nav-link" href="Contact.php">Contact</a>
            </li>
        </ul>
</div>
</nav>
<br><br>

<section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img
                  src="images/photo2.jpeg"
                  alt="photo"
                  class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Sign Up Form</h3>

            <form action =Signuppage.php method="post" >
             <div class="row">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control form-control-lg" required="required" name ="name" placeholder="name and whitespace only" />
                        <label class="form-label" >Customer Name</label>
                      </div>
                    
  
                  <div class="form-outline mb-4">
                    <input type="text" id="address" class="form-control form-control-lg" name = "address" required="required" />
                    <label class="form-label" >Address</label>
                  </div>
  
                 
                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" name= "password" required="required" pattern=".{8,}" placeholder="8 or more characters" />
                    <label class="form-label" >Password</label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="password" id="cpassword" class="form-control form-control-lg" name = "cpassword" required="required" pattern=".{8,}"/>
                    <label class="form-label" >Confirm Password</label>
                  </div>
  
  
  
                  <div class="form-outline mb-4">
                    <input type="text"  class="form-control form-control-lg" name = "mobile" required="required" pattern="[0-9]{10}" placeholder="not more than 10 digits" />
                    <label class="form-label" >Phone Number</label>
                  </div>
  
  
                  <div class="form-outline mb-4">
                    <input type="email" class="form-control form-control-lg" name="email" required="required"  />
                    <label class="form-label" >Email ID</label>
                  </div>
  
                  <div class="d-flex justify-content-end pt-3">
                    <input name="submit" id="submit" class="btn btn-dark btn-lg login-btn mb-4" type="submit" value="Submit">
                  </div> 

            </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php

  if (isset($_POST['submit']))
  {
    include('database_connection.php');

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if ($password != $cpassword)
    {
      ?>
      <script type="text/javascript">
        alert("Passwords do not match!");
      </script>
      <?php
      die();
    }


  
    $sql_1 = "SELECT 1 FROM customer WHERE email = '$email'";
    $erun = mysqli_query($conn, $sql_1);

    if (mysqli_num_rows($erun) > 0)
    {
      ?>
      <script type="text/javascript">
        alert("Email is already associated to another account");
      </script>
      <?php
      die();
    }



    $sql_2 = "INSERT INTO customer(name,mobile,address,email,password,cpassword) VALUES ('$name', '$mobile', '$address', '$email', '$password', '$cpassword')";
    $run = mysqli_query($conn, $sql_2);

    if ($run == true)
    {
      ?>

      <script>
        alert("User Registered Successfully !");
        window.open('LoginPage.php','_self')
      </script>

      <?php
    }
    else
    {
        echo "ERROR: $sql_2. " . mysqli_error($conn);
    }
  }
?>































    




















     	<!-- Footer -->
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i>
        </a>
  
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
  
      </section>
      <!-- Section: Social media -->
  
      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Sign up for our newsletter</strong>
              </p>
            </div>
            <!--Grid column-->
  
            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" />
                <label class="form-label" for="form5Example2">Email address</label>
              </div>
            </div>
            <!--Grid column-->
  
            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                Subscribe
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->
  
      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          Storm-Art is a Ghanaian company which supports art galleries and artist display
          their art on a greater platform to a wider-audience. No art piece is owned by the company,
          and as such would not take blame to the damage of artwork or valuable pieces.
        </p>
      </section>
      <!-- Section: Text -->
  
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
  
  
          <!--Grid column-->
          <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
  
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
  
          <!--Grid column-->
          <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
  
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
  
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">STORM ART</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->




















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>