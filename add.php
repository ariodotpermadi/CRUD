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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><strong>MOCK</strong></a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="index.php" class="nav-link">HOME</a>
			</li>
			<li class="nav-item">
				<a href="tambah.php" class="nav-link">ADD PARTICIPANT</a>
			</li>
		</ul>
	</nav>

	<div class="container mt-3">
		<h2 class="text-center">ADD PARTICIPANT</h2>
		<hr>

		<?php
		if (isset($_POST['submit'])) {
			$id 				=$_POST['id'];
			$participant_name 	=$_POST['participant_name'];
			$site_id 			=$_POST['site_id'];
			$study_id			=$_POST['study_id'];
			$country_id 		=$_POST['country_id'];
			$country 			=$_POST['country'];
			$document 			=$_POST['document'];
			$quiz_completion 	=$_POST['quiz_completion'];
		
		$cek=mysqli_query($connect, "SELECT *FROM mock_table WHERE id='$id'") or die(mysqli_error($connect));

		if (mysqli_num_rows($cek) == 0) {
			$sql=mysqli_query($connect, "INSERT INTO mock_table(id, participant_name, site_id, study_id, country_id, country, document, quiz_completion) VALUES('$id', '$participant_name', '$site_id', '$study_id', '$country_id', '$country', '$document', '$quiz_completion')") or die(mysqli_error($connect));

			if ($sql) {
				echo'
				<script>alert("Success in adding data."); document.location="add.php";</script>';
			}else{
				echo'
				<div class="alert alert-warning">Failed to add data.</div>';
			}
		}else{
			echo'<div class="alert alert-warning">ID already registered.</div>';
		}
		}
		?>

		<form action="add.php" method="post">
			<div class="form-group-row">
				<label class="col-sm-2 col-form-label">NAME</label>
				<div class="col-sm-10">
					<input type="text" name="participant_name" class="form-control" required>
				</div>
			</div>
			<div class="form-group-row">
				<label class="col-sm-2 col-form-label">SITE ID</label>
				<div class="col-sm-10">
					<input type="text" name="site_id" class="form-control" required>
				</div>
			</div>
			<div class="form-group-row">
				<label class="col-sm-2 col-form-label">STUDY ID</label>
				<div class="col-sm-10">
					<select name="study_id" class="form-control" required>
						<option>Choose Study ID</option>
						<option value="study1">Study 1</option>
						<option value="study2">Study 2</option>
						<option value="study3">Study 3</option>
						<option value="study4">Study 4</option>
						<option value="study5">Study 5</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-2 col-form-label">COUNTRY ID</label>
				<div class="col-sm-10">
					<select name="country_id" class="form-control" required>
						<option>Choose Country ID</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-2 col-form-label">COUNTRY</label>
				<div class="col-sm-10">
					<select name="country" class="form-control" required>
						<option>Choose Country</option>
						<option value="poland">Poland</option>
						<option value="russia">Russia</option>
						<option value="german">German</option>
						<option value="uk">UK</option>
						<option value="usa">USA</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-2 col-form-label">DOCUMENT</label>
				<div class="col-sm-10">
					<select name="document" class="form-control" required>
						<option>Choose Document</option>
						<option value="uploaded">Uploaded</option>
						<option value="eConsent">eConsent</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-10 col-form-label">QUIZ COMPLETION</label>
				<div class="col-sm-10">
					<select name="quiz_completion" class="form-control" required>
						<option>Choose...</option>
						<option value="complete">Complete</option>
						<option value="incomplete">Incomplete</option>						
					</select>
				</div>	
				<br>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary">
				</div>		
		</form>
	</div>
</body>
</html>