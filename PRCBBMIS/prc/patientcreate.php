<!DOCTYPE html>
<html lang="en">
<head>
		<!-- CSS import Files -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="./jquery-timepicker-1.3.2/jquery.timepicker.min.css">
        <link rel="stylesheet" href="./css/custom_style.css">

      
        <!-- JQuery and Javascript File -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./jquery-timepicker-1.3.2/jquery.timepicker.min.css"></script>
</head>
<body>
	<!--Header edit @ header.php-->
	<?php 
		include('header.php')  
	?>

	<!-- MAIN PAGE -->
			<!--Form Starts Here-->
		<div class="container">
			<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				<div class="row">
					<h2 style="text-align: center;">Register New Patient</h2>
					<br />
				</div>

						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4>Patient Profile</h4>
					</div>
					
					<div class="panel-body">
						<form class="form-horizontal" action="./php/regpatient.php" method="post">

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pname">Name</label>
							  <div class="controls">
							    <input id="pname" name="pname" type="text" placeholder="Name" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="paddress">Address</label>
							  <div class="controls">
							    <input id="paddress" name="paddress" type="text" placeholder="Address" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="pbirthdate">Birth Date</label>
							  <div class="controls">
							    <input id="pbirthdate" name="pbirthdate" type="date" class="form-control" required="">
							    
							  </div>
							</div>

							<!-- Multiple Radios -->
							<div class="control-group">
							  <label class="control-label" for="pgender">Gender</label>
							  	<input type="radio" name="pgender" value="male" id="pgender" checked> Male
			  					<input type="radio" name="pgender" value="female" id="pgender"> Female
							  </div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label" for="pcontact">Contact Number</label>
							    <div class="controls">
							    	<input id="pcontact" name="pcontact" type="text" placeholder="Contact Number" class="form-control">
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

	<?php 
		include('footer.php');
	?>

</body>
</html>