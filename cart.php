<?php
	include('../database_connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
	<!-- CSS Styling -->
	<link rel="stylesheet" type="text/css" href="cart_styles.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">	
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
<br>
<table align ="center" border ="1" width="85%" style="margin-top: 20px;" >
		<tr style="background-color: black; color: white;" align ="center">
			<th width="100">OrderId</th>
			<th width="100">UserId</th>
			<th>Title of Art Piece</th>
			<th>Price</th>
			<th>Address</th>
			<th>Name</th>
			<th>Email</th>
			<th>Remove</th>
		</tr>
		  	}
			
			  <?php

			  include('database_connection.php');
  
			  $query = "SELECT * FROM order_to_purchase ";
			  $run = mysqli_query($conn, $query);
  
			  if (mysqli_num_rows($run) < 1) 
			  {
				  echo "<tr><td colspan='7' align='center'>No data found</td><tr>";
			  }
			  else
			  {
				  while ($data = mysqli_fetch_assoc($run))
				  {
					  ?>
					  <tr align="center">
						  <td> <?php echo $data['orderid']; ?> </td>
						  <td> <?php echo $data['userid']; ?> </td>
						  <td> <?php echo $data['title']; ?> </td>
						  <td> <?php echo $data['price']; ?> </td>
						  <td> <?php echo $data['address']; ?> </td>
						  <td> <?php echo $data['name']; ?> </td>
						  <td> <?php echo $data['email']; ?> </td>
						  <td><a href="deletecart.php?orderid=<?php echo $data['orderid']; ?>" onclick="return confirm('Are you sure you want to delete ?'); ">Remove</a></td>
					  </tr>
					  <?php
				  }
			  }
		  ?>
		  	<br><br>
</table>
<br><br><br>

<div class="col-md-12 text-center">
<a class="btn btn-dark btn-lg" href="checkout.php" role="button">Checkout</a>
</div>



	 <script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>