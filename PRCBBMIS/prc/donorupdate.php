<?php 
	include('login_success.php');
?>
<?php 
	require 'dbconnect.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: donorlist.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM donor where did = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<body>
<?php include('header.php'); ?>
	<div class="container">
		<div class="row col-lg-offset-3">
			<div class="col-md-4">
				<h2>
					&nbsp;&nbsp; Donor's Profile
				</h2>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="list-group side_bar">
				<a href="viewdonor.php?id=<?php echo $_GET['id'] ?>" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Donor's Profile</a>
				<a href="#" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Examination</a>
				<a href="#" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Screening</a>
				<a href="#" class="list-group-item bg"><span aria-hidden="true"></span>&nbsp;&nbsp; Collection</a>
			</div>
		</div>
		<div class="col-lg-8">
				
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Donors' Profile</h4>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" action="./php/update_donor.php" method="post">

						<div class="control-group">
							<label class="control-label">Donor ID</label>
							<div class="controls"><input class="form-control" value="<?php echo $data['did']?>" disabled>
							</div>
						</div>
						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dname">Name</label>
						  <div class="controls">
						    <input class="form-control" id="dname" name="dname" type="Text" value="<?php echo $data['dname']?>" required="" placeholder="Name">						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="daddress">Address</label>
						  <div class="controls">
						    <input class="form-control" id="daddress" name="daddress" type="Text" value="<?php echo $data['daddress']?>" required="" placeholder="Address">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dbirthdate">Birth Date</label>
						  <div class="controls">
						    <input class="form-control" name="dbirthdate" id="dbirthdate" type="date" value="<?php echo $data['dbirthdate']?>" required="">
						    <script src="js/jquery-1.9.1.min.js"></script>
										<script src="js/bootstrap-datepicker.js"></script>
										<script type="text/javascript">
											// When the document is ready
											$(document).ready(function () {
												
												$('#dbirthdate').datepicker({
													format: "yyyy-mm-dd"
												});  
											
											});
							</script>
						    
						  </div>
						</div>

						<!-- Multiple Radios -->
						<div class="control-group">
						  <label class="control-label" for="gender">Gender</label>
						  	<input name="dgender" value="male" id="dgender" type="radio" <?php if($data['dgender'] == 'male')echo 'checked="checked"'; ?> required=""> Male
							<input type="radio" name="dgender" value="female" id="dgender" <?php if($data['dgender'] == 'female')echo 'checked="checked"'; ?> required=""> Female
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dreligion">Religion</label>
						  <div class="controls">
						    <input class="form-control" id="dreligion" name="dreligion" type="text" value="<?php echo $data['dreligion'] ?>" required="" placeholder="Religion">
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dcard">Donor Card</label>
						  <div class="controls">
						    <input class="form-control" id="dcard" name="dcard" type="text" value="<?php echo $data['dcard'] ?>" required="" placeholder="Donor Card"> 
						    	
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dcontact">Contact Number</label>
						  <div class="controls">
						    <input class="form-control" id="dcontact" name="dcontact" type="Number" value="<?php echo $data['dcontact'] ?>" required="" placeholder="Contact Number">
						    
						  </div>
						</div>

						<!-- Select Basic -->
						<div class="control-group">
						  <label class="control-label" for="dtype">Donor Type</label>
						  <div class="controls">
						    <select id="dtype" name="dtype" class="form-control" required="">
						      <option <?php if($data['dtype'] == 'walk-in')echo 'selected="selected"'; ?>>Walk-in</option>
						      <option <?php if($data['dgender'] == 'replacement')echo 'selected="selected"'; ?>>Replacement</option>
						      <option <?php if($data['dgender'] == 'patient directed')echo 'selected="selected"'; ?>>Patient Directed</option>
						    </select>
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dnationality">Nationality</label>
						  <div class="controls">
						    <input class="form-control" id="dnationality" name="dnationality" value="<?php echo $data['dnationality'] ?>" required="" placeholder="Nationality">
					    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="demail">Email Address</label>
						  <div class="controls">
						    <input class="form-control" id="demail" name="demail" type="text" value="<?php echo $data['demail'] ?>" required="" placeholder="Email Address">
						  </div>
						</div>
					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-warning">Update</button>
									<a class="btn" href="donorlist.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>

</body>
</html>