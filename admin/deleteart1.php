<?php
	
	include('../database_connection.php');

	$sid = $_GET['sid'];
	$query = "DELETE FROM art_pieces WHERE id = '$sid'";

	$run = mysqli_query($conn, $query);

	if($run == true)
	{
		?>

		<script type="text/javascript">
			alert("Item Deleted Successfully!");
			window.open('admindashboard.php?sid=<?php echo $sid ?>','_self');
		</script>

		<?php
	}

?>