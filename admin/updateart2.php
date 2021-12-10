<?php
	if(isset($_POST['submit'])){
	include('../database_connection.php');

	$pic_no = $_POST['pic_no'];
	$title = $_POST['title'];
	$artistname = $_POST['artistname'];
	$galleryname = $_POST['galleryname'];
	$yearofartpiece = $_POST['yearofartpiece'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$sid = $_POST['sid'];
 	$imagename = $_FILES['simg'] ['name'];
	$tempname = $_FILES['simg'] ['tmp_name'];

	move_uploaded_file($tempname, "../images/$imagename");

	$query = "UPDATE art_pieces SET pic_no='$pic_no',title='$title',artistname='$artistname',galleryname='$galleryname',yearofartpiece='$yearofartpiece',description = '$description',price='$price',image='$imagename' WHERE id = '$sid'";

	$run = mysqli_query($conn, $query);

	if($run == true)
	{
		?>
		<script type="text/javascript">
			alert("Data updated Successfully!");
			window.open('artpieces.php?sid=<?php echo $sid ?>','_self');
		</script>
		<?php
	}
}
?>