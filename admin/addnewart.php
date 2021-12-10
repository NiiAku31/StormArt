<!DOCTYPE html>
<html>
<head>
	<title>Add new Art Piece</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		.abc{
			border-radius: 50px;
			padding-bottom: 50px;
			margin-left: 50px;
			margin-right: 50px;
			background-color: #24262dd9;
		}
	</style>

</head>
<body>
	<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="../logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="admindashboard.php"><button style="float: left;" class="btn btn-success ml-3">PREVIOUS</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>


	<div class="text-light abc">
		<div class="text-center mt-5 pt-5" >
			<h1>ADD NEW ART PIECE</h1>
		</div>

		<table align="center" style="margin-top: 50px; margin-right: 400px;" cellpadding="3">
			<form action="addnewart.php" method="post" enctype="multipart/form-data">
				<tr>
					<td>Pic No.</td>
					<td>
						<input type="number" name="pic_no" required>
					</td>
				</tr>
				<tr>
					<td>Title</td>
					<td>
						<input type="text" name="title" required>
					</td>
				</tr>
				<tr>
					<td>Artist Name</td>
					<td>
						<input type="text" name="artistname" required>
					</td>
				</tr>
				<tr>
					<td>Year of Art Piece</td>
					<td>
						<input type="text" name="yearofartpiece" required>
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea cols="22" name="description" required=""></textarea>
					</td>
				</tr>
				<tr>
					<td>Price</td>
					<td>
						<input type="number" name="price" required>
					</td>
				</tr>
				<tr>
					<td>Gallery Name</td>
					<td>
						<input type="text" name="galleryname" required>
					</td>
				</tr>
				<tr>
					<td>Image</td>
					<td>
						<input type="file" name="simg" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<br><input type="submit" name="submit" value="ADD" class="btn btn-success" style="margin-right:	 75px; width: 150px;">
					</td>
				</tr>
			</form>
		</table>
	</div>


	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>

<?php

	include('../database_connection.php');

	if (isset($_POST['submit']))
	{
		$pic_no = $_POST['pic_no'];
		$title = $_POST['title'];
		$artistname = $_POST['artistname'];
		$yearofartpiece = $_POST['yearofartpiece'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$galleryname = $_POST['galleryname'];
		$imagename = $_FILES['simg'] ['name'];
		$tempname = $_FILES['simg'] ['tmp_name'];

		move_uploaded_file($tempname, "../images/$imagename");

		$query = "INSERT INTO art_pieces(pic_no,title,artistname,yearofartpiece,price,description,galleryname,image) VALUES ('$pic_no','$title','$artistname','$yearofartpiece','$price','$description','$galleryname','$imagename')";
		$run = mysqli_query($conn, $query);

		if ($run == true)
		{
			?>

			<script type="text/javascript">
				alert("Item Added Successfully!");
			</script>

			<?php
		}
	}

?>