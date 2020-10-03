<?php
include('config.php');

if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$cek=mysqli_query($connect, "SELECT * FROM mock_table WHERE id='$id'")or die(mysqli_error($connect));

	if (mysqli_num_rows($cek) > 0) {
		$del=mysqli_query($connect, "DELETE FROM mock_table WHERE id='$id'") or die(mysqli_error($connect));

		if ($del) {
			echo'<script>alert("Data has been successfully deleted"); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Failed to delete data."); document.location="index.php";</script>';
		}
	}
}
?>