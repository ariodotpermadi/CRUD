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
		<h2 class="text-center">EDIT PARTICIPANT</h2>
		<hr>

		<?php
		if (isset($_GET['id'])) {
			$id=$_GET['id'];

			$select=mysqli_query($connect, "SELECT *FROM mock_table WHERE id='$id'") or die(mysqli_error($connect));

			if (mysqli_num_rows($select) == 0) {
				echo '<div class="alert alert-warning">ID does not exist in the database.</div>';
				exit();
			}else{
				$data=mysqli_fetch_assoc($select);
			}
		}
		?>
		<?php
		if (isset($_POST['submit'])) {
			$participant_name 	=$_POST['participant_name'];
			$site_id 			=$_POST['site_id'];
			$study_id			=$_POST['study_id'];
			$country_id 		=$_POST['country_id'];
			$country 			=$_POST['country'];
			$document 			=$_POST['document'];
			$quiz_completion 	=$_POST['quiz_completion'];

			$sql=mysqli_query($connect, "UPDATE mock_table SET participant_name='$participant_name', site_id='$site_id', study_id='$study_id', country_id='$country_id', country='$country', document='$document', quiz_completion='$quiz_completion'  WHERE id='$id'") or die(mysqli_error($connect));

			if ($sql) {
				echo'<script>alert("Data update is successful"); document.location="edit.php?id='.$id.'";</script>';
			}else{
				echo'<div class="alert alert-warning">Failed to edit.</div>';
			}
		}
		?>
		<form action="edit.php?id=<?php echo $id;?>" method="post">
			<div class="form-group-row">
				<label class="col-sm-2 col-form-label">NAME</label>
				<div class="col-sm-10">
					<input type="text" name="participant_name" class="form-control" value="<?php echo $data['participant_name'];?>" required>
				</div>
			</div>
			<div class="form-group-row">
				<label class="col-sm-2 col-form-label">SITE ID</label>
				<div class="col-sm-10">
					<input type="text" name="site_id" class="form-control" value="<?php echo $data['site_id'];?>" required>
				</div>
			</div>
			<div class="form-group-row">
				<label class="col-sm-2 col-form-label">STUDY ID</label>
				<div class="col-sm-10">
					<select name="study_id" class="form-control" required>
						<option>Choose Study ID</option>
						<option value="study1" <?php if($data['study_id']=='study1'){echo 'selected';}?>>Study 1</option>
						<option value="study2" <?php if($data['study_id']=='study2'){echo 'selected';}?>>Study 2</option>
						<option value="study3" <?php if($data['study_id']=='study3'){echo 'selected';}?>>Study 3</option>
						<option value="study4" <?php if($data['study_id']=='study4'){echo 'selected';}?>>Study 4</option>
						<option value="study5" <?php if($data['study_id']=='study5'){echo 'selected';}?>>Study 5</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-2 col-form-label">COUNTRY ID</label>
				<div class="col-sm-10">
					<select name="country_id" class="form-control" required>
						<option>Choose Country ID</option>
						<option value="1" <?php if($data['country_id']=='1'){echo 'selected';}?>>1</option>
						<option value="2" <?php if($data['country_id']=='2'){echo 'selected';}?>>2</option>
						<option value="3" <?php if($data['country_id']=='3'){echo 'selected';}?>>3</option>
						<option value="4" <?php if($data['country_id']=='4'){echo 'selected';}?>>4</option>
						<option value="5" <?php if($data['country_id']=='5'){echo 'selected';}?>>5</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-2 col-form-label">COUNTRY</label>
				<div class="col-sm-10">
					<select name="country" class="form-control" required>
						<option>Choose Country</option>
						<option value="poland" <?php if($data['country']=='poland'){echo 'selected';}?>>Poland</option>
						<option value="russia" <?php if($data['country']=='russia'){echo 'selected';}?>>Russia</option>
						<option value="german" <?php if($data['country']=='german'){echo 'selected';}?>>German</option>
						<option value="uk" <?php if($data['country']=='uk'){echo 'selected';}?>>UK</option>
						<option value="usa" <?php if($data['country']=='usa'){echo 'selected';}?>>USA</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-2 col-form-label">DOCUMENT</label>
				<div class="col-sm-10">
					<select name="document" class="form-control" required>
						<option>Choose Document</option>
						<option value="uploaded" <?php if($data['document']=='uploaded'){echo 'selected';}?>>Uploaded</option>
						<option value="eConsent" <?php if($data['document']=='eConsent'){echo 'selected';}?>>eConsent</option>
					</select>
				</div>
				<div class="form-group-row">
				<label class="col-sm-10 col-form-label">QUIZ COMPLETION</label>
				<div class="col-sm-10">
					<select name="quiz_completion" class="form-control" required>
						<option>Choose...</option>
						<option value="complete" <?php if($data['quiz_completion']=='complete'){echo 'selected';}?>>Complete</option>
						<option value="incomplete" <?php if($data['quiz_completion']=='incomplete'){echo 'selected';}?>>Incomplete</option>				
					</select>
				</div>	
				<br>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="Send">
					<a href="index.php" class="btn btn-warning">Back</a>
				</div>		
		</form>

	</div>
</body>
</html>