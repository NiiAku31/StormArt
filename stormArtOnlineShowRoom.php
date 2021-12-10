<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta charset="utf-8">
	<title>Showroom</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Showroom.css" type="text/css" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/c3d20afb9f.js" crossorigin="anonymous"></script>	
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
 <?php
       if (!isset($_SESSION['uid'])){ //login ?>
        <a href="LoginPage.php" class="btn btn-primary"> Log In</a>
       <?php } else { //sign out ?>

        <a href="logout.php" class="btn btn-danger"> Sign out</a>
       <?php }
        ?>

<div style="float: right;" class="mt-3 mr-3">
    <a href="./cart.php"><button class="btn btn-primary">CART</button></a>
</div>

<?php
  include('database_connection.php');
  

  $connection = $conn;


  function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
  }


  if(isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['uid'])){
    header("LOCATION: LoginPage.php");
  }
    $orderId = rand(1000,100000);
    $uid = $_SESSION['uid'];
    $name;
    $address;
    $email;

    $userQuery = "SELECT * FROM customer WHERE id = $uid";
    $user = mysqli_query($connection, $userQuery);

    $piece_title = $_POST['title'];
    $piece_price = $_POST['price'];

    console_log(($piece_price));
    console_log(($piece_title));


    while($userData = mysqli_fetch_assoc($user)){
      $name = $userData['name'];
      $address = $userData['address'];
      $email = $userData['email'];
    }

    $addQuery = "INSERT INTO order_to_purchase VALUES (Id, $orderId, $uid, '$piece_title', '$piece_price', '$name', '$address', '$email')";
    $addRun = mysqli_query($connection, $addQuery);

    if($addRun){
      echo("<script>alert('Successfully added to cart');</script>");
    }else{
      echo("<script>alert('Error encountered');</script>");
    }
  }

  
?>

	<br><br>



<div class="container">
  <div class="row">

    <?php
    $query = "SELECT * FROM art_pieces";
    $run = mysqli_query($conn, $query);

    console_log($run);
    if(mysqli_num_rows($run)<1){
      echo "No data Found";
    }
    else{
      $qty = 0;

      while($data = mysqli_fetch_assoc($run)){
        $qty++;

        $image = $data['image'];
        $price = $data['price'];
        $title = $data['title'];
        $id = $data['id'];
        $desc = $data['description'];
       

        ?>
        
              <div class = "col-lg-6 col-sm-4">
                <form method="post">
                    <div class="content"> 
                        <div class="content-overlay"></div>
                            <img class="content-image" src = "images/<?php echo $image; ?>" style= "width:100%">
                              <div class="content-details fadeIn-bottom">
                                <h3 class="content-title"><?php echo $title;?></h3>
                                <p> $<?php echo $price;?></p>
                                <p><?php echo $desc;?></p>
                                <input type="hidden" name="art_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="title" value="<?php echo $title; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <button type="submit" class="btn btn-primary w-100 mt-4" id="cart" name="add_to_cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</button>
                              </div>
                      <br>
                      </div>
                  </form>
                </div>
        <?php
      }
    }
      ?>
  </div>
</div>





  <br><br>
  <br><br>
  


	
	<br>


 	<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/reg/" role="button"
        ><i class="fab fa-facebook-f"></i>
      </a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/home" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

    </section>
    <!-- Section: Social media -->


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
              <a href="index.php" class="text-white">Home</a>
            </li>
            <li>
              <a href="stormArtOnlineShowRoom.php" class="text-white">ShowRoom</a>
            </li>
            <li>
              <a href="Contact.php" class="text-white">Contact Us</a>
            </li>
            <li>
              <a href="stormArtEventsandAuctions.php" class="text-white">Events And Auctions</a>
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