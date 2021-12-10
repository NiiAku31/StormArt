<!DOCTYPE html>
<html>
<head>
	<title>Art Database</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="../logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="admindashboard.php"><button style="float: left;" class="btn btn-success ml-3">PREVIOUS</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>

	<table align="center" style="margin-top: 20px">
		<form action="updateart.php" method="post">
			<tr>
				<th>Enter ArtPiece Name</th>
				<td>
					<input type="text" name="title" placeholder="Enter Item Name" required>
				</td>
				<td>
					<input type="Submit" name="submit" value="Search" class="btn btn-primary">
				</td>
			</tr>
		</form>	
	</table>

	<table align="center" border="1" width="85%" style="margin-top: 20px;" >
		<tr style="background-color: black; color: white;" align="center">
			<th width="100">Pic No.</th>
			<th width="250">Picture Title</th>
			<th>Artist Name</th>
			<th>Gallery Name</th>
			<th>Year of Art Piece</th>
			<th>Description</th>
			<th>Price</th>
			<th width="300">Image</th>
			<th>Update</th>
		</tr>
		<?php

			if (isset($_POST['submit'])) 
			{
				include('../database_connection.php');

				$title = $_POST['title'];
	
				$query = "SELECT * FROM art_pieces WHERE title LIKE '%$title%'";
				$run = mysqli_query($conn, $query);
	
				if(mysqli_num_rows($run) < 1)
				{
					echo "<tr><td colspan='6' align='center'>No data found</td><tr>";
				}
				else
				{
					$count = 0;
					while ($data = mysqli_fetch_assoc($run)) 
					{
						$count++;
						?>
						<tr align="center">
							<td><?php echo $count; ?></td>
							<td><?php echo $data['title']; ?></td>
							<td><?php echo $data['artistname']; ?></td>
							<td><?php echo $data['galleryname']; ?></td>
							<td><?php echo $data['yearofartpiece']; ?></td>
							<td><?php echo $data['description']; ?></td>
							<td><?php echo $data['price']; ?></td>
							<td><img src="../images/<?php echo $data['image']; ?>" style="max-width:100px;max-height: 100px;"></td>
							<td> <a href="updateart1.php?sid=<?php echo $data['id']; ?>">Update</a></td>
						</tr>
						<?php
					}
				}
			}
		?>
	</table>

	<script src="bootstrap/jss/jquery.min.js"></script>
	<script src="bootstrap/jss/popper.min.js"></script>
	<script src="bootstrap/jss/bootstrap.min.js"></script>
</body>
</html>