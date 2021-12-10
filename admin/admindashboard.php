<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


	<style type="text/css">
		.abc button{
			width: 350px;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="../logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="../index.php"><button style="float: left;" class="btn btn-success ml-3">HOME</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>

	<div align="center" class="mt-5 abc" style="padding-top: 50px;">
		<a href="addnewart.php"><button class="btn btn-lg btn-primary">ADD NEW ART PIECE</button></a><br><br>
		<a href="updateart.php"><button class="btn btn-lg btn-primary">UPDATE ART PIECE</button></a><br><br>
		<a href="deleteart.php"><button class="btn btn-lg btn-primary">DELETE ART PIECE</button></a><br><br>
		<a href="artpieces.php"><button class="btn btn-lg btn-primary">ART PIECE DETAIL</button></a><br><br>
		<a href="orderdetail.php"><button class="btn btn-lg btn-primary">ORDERS DETAIL</button></a><br><br>
		<a href="customerdb.php"><button class="btn btn-lg btn-primary">CUSTOMER DETAIL</button></a>		
	</div>
	



	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>

</body>
</html>