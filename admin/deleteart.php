<!DOCTYPE html>
<html>
<head>
	<title>Art Piece Database</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div align="center" class="bg-dark text-light pt-4 pb-4">
		<a href="../logout.php"><button style="float: right;" class="btn btn-danger mr-3">LOGOUT</button></a>
		<a href="admindashboard.php"><button style="float: left;" class="btn btn-success ml-3">PREVIOUS</button></a>
		<h1>WELCOME TO ADMIN DASHBOARD</h1>	
	</div>

	<table align="center" style="margin-top: 20px">
		<form action="deleteart.php" method="post">
			<tr>
				<th>Enter Art Piece Name</th>
				<td>
					<input type="text" name="title" placeholder="Enter Item Name" required>
				</td>
				<td>
					</tfoot><input type="Submit" name="submit" value="Search" class="btn btn-primary">
				</td>
			</tr>
		</form>	
	</table>

	<table align="center" border="1" width="85%" style="margin-top: 20px;" >
		<tr style="background-color: black; color: white;" align="center">
			<th width="100">No.</th>
			<th width="250">Title</th>
			<th>Artist Name</th>
			<th>Price</th>
			<th width="300">Image</th>
			<th>Delete</th>
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
							<td><?php echo $data['price']; ?></td>
							<td><img src="../images/<?php echo $data['image']; ?>" style="max-width:100px;max-height: 100px;"></td>
							<td> <a href="deleteart1.php?sid=<?php echo $data['id'];  ?>" onclick="return confirm('Are you sure you want to delete ?');">DELETE</a></td>
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