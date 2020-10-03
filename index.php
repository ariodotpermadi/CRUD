<?php
include ('config.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mock</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<a class="navbar-brand" href="#"><strong>MOCK</strong></a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="index.php" class="nav-link">HOME</a>
			</li>
			<li class="nav-item">
				<a href="add.php" class="nav-link">ADD PARTICIPANT</a>
			</li>
		</ul>
	</nav>

	<div class="container mt-3">
		<h2>List Of Participants</h2>
		<input type="text" class="form-control mt-3" id="myInput" placeholder="Search participant...">
		<br>
		<table class="table table-bordered">
			<thead class="thead-dark">				
				<th>No.</th>				
				<th>Name</th>
				<th>Site ID</th>
				<th>Study ID</th>
				<th>Country ID</th>
				<th>Country</th>
				<th>Document</th>
				<th>Quiz Completion</th>
				<th>Action</th>
			</thead>
			<tbody id="myTable">
				<?php
				$sql=mysqli_query($connect, "SELECT * FROM mock_table") or die(mysqli_error($connect));

				if (mysqli_num_rows($sql) > 0) {
					$no=1;

					while ($data=mysqli_fetch_assoc($sql)) {
						echo'
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['participant_name'].'</td>
							<td>'.$data['site_id'].'</td>
							<td>'.$data['study_id'].'</td>
							<td>'.$data['country_id'].'</td>
							<td>'.$data['country'].'</td>
							<td>'.$data['document'].'</td>
							<td>'.$data['quiz_completion'].'</td>
							<td>
				 			<a href="edit.php?id='.$data['id'].'" class="btn btn-warning">Edit</a>
				 			<a href="delete.php?id='.$data['id'].'" class="btn btn-danger" onclick="return confirm (\'Are you sure you want to delete this data?\')">Delete</a>
				 			</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo'
						<tr>
							<td colspan=6>No data.</td>
						</tr>
					';
				}
				?>
			</tbody>
		</table>

		<script>
			$(document).ready(function(){
				$("#myInput").on("keyup", function(){
					var value=$(this).val().toLowerCase();
					$("#myTable tr").filter(function(){
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
	</div>
</body>
</html>