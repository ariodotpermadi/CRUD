<?php
$connect=mysqli_connect("localhost", "root", "", "mock");

if (mysqli_connect_errno()) {
	echo "Failed to connect to the database.". mysqli_connect_error();
}



?>