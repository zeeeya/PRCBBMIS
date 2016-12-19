<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.mis.css">
	<link rel="stylesheet" href="css/datepicker.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
</head>
<!--body starts here-->
<body>
	<!--edit @ header.php-->
	<?php
	include('header.php');
	?>

		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				<div class="row">
					<h2 style="text-align: center;">Register New Donor</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Donors' Profile</h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/regdonor.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dname">Name</label>
							  <div class="controls">
							    <input id="dname" name="dname" type="text" placeholder="Name" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="daddress">Address</label>
							  <div class="controls">
							    <input id="daddress" name="daddress" type="text" placeholder="Address" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dbirthdate">Birth Date</label>
							  <div class="controls">
							    <input id="dbirthdate" name="dbirthdate" type="date" class="form-control" required="">
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
							  <label class="control-label" for="dgender">Gender</label>
							  	<input type="radio" name="dgender" value="male" id="dgender" required=""> Male
			  					<input type="radio" name="dgender" value="female" id="dgender" required=""> Female
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dreligion">Religion</label>
							  <div class="controls">
							    <input id="dreligion" name="dreligion" type="text" placeholder="Religion" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dcard">Donor Card</label>
							  <div class="controls">
							    <input id="dcard" name="dcard" type="text" placeholder="Donor Card" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dcontact">Contact Number</label>
							  <div class="controls">
							    <input id="dcontact" name="dcontact" type="number" placeholder="Contact Number" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="control-group">
							  <label class="control-label" for="dtype">Donor Type</label>
							  <div class="controls">
							    <select id="dtype" name="dtype" class="form-control" required="">
							      <option></option>
							      <option>Walk-in</option>
							      <option>Replacement</option>
							      <option>Patient Directed</option>
							    </select>
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="dnationality">Nationality</label>
							  <div class="controls">
							    <input id="dnationality" name="dnationality" type="text" placeholder="Nationality" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="demail">Email Address</label>
							  <div class="controls">
							    <input id="demail" name="demail" type="text" placeholder="Email Address" class="form-control" required="">
							  </div>
							</div>

					</div>
							<!--Buttons-->
							<div class="panel-footer">	
								<div class="form-actions text-center forms">
									<button type="submit" class="btn btn-success">Submit</button>
									<a class="btn" href="home.php">Back</a>
								</div>		
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>
	
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
