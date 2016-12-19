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
	<title></title>
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
			<div class="col-md-6 text-right" style="padding-top:20px;">
	                <a href="donorupdate.php?id=<?php echo $_GET['id'] ?>" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit</a>
	                <button type="button" class="btn btn-danger btn-md deleteB" rel="tooltip" title="Delete Patient" data-toggle="modal" data-target="#myModal" value="<?php echo $_GET['id'] ?>"><span class="glyphicon glyphicon-trash"></span></button>
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
					<form class="form-horizontal" action="./php/updatedonor.php" method="post">

						<div class="control-group">
							<label class="control-label">Donor ID</label>
							<div class="controls"><input class="form-control" value="<?php echo $data['did']?>" disabled>
							</div>
						</div>
						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Name</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['dname']?>" disabled>
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Address</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['daddress']?>" disabled>
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label" for="dbirthdate">Birth Date</label>
						  <div class="controls">
						    <input class="form-control" id="dbirthdate" name="dbirthdate" type="dat" value="<?php echo $data['dbirthdate'] ?>" disabled >
						    
						  </div>
						</div>

						<!-- Multiple Radios -->
						<div class="control-group">
						  <label class="control-label">Gender</label>
						  	<input type="radio" <?php if($data['dgender'] == 'male')echo 'checked="checked"'; ?> disabled> Male
								<input type="radio" <?php if($data['dgender'] == 'female')echo 'checked="checked"'; ?> disabled> Female
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Religion</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['dreligion'] ?>" disabled>
						    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Donor Card</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['dcard'] ?>" disabled> 
						    	
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Contact Number</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['dcontact'] ?>" disabled>
						    
						  </div>
						</div>

						<!-- Select Basic -->
						<div class="control-group">
						  <label class="control-label" for="dtype">Donor Type</label>
						  <div class="controls">
						    <select class="form-control" disabled="">
						      <option <?php if($data['dtype'] == 'walk-in')echo 'selected="selected"'; ?>>Walk-in</option>
						      <option <?php if($data['dgender'] == 'replacement')echo 'selected="selected"'; ?>>Replacement</option>
						      <option <?php if($data['dgender'] == 'patient directed')echo 'selected="selected"'; ?>>Patient Directed</option>
						    </select>
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Nationality</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['dnationality'] ?>" disabled>
					    
						  </div>
						</div>

						<!-- Text input-->
						<div class="control-group">
						  <label class="control-label">Email Address</label>
						  <div class="controls">
						    <input class="form-control" value="<?php echo $data['demail'] ?>" disabled>
						  </div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:40%;">
				<div class="modal-header btn-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Patient</h4>
				</div>
				<form class="form-horizontal" action="./php/donor_delete.php" method="post">
					<div class="modal-body content">
						<input type="text" name="delid" id="deleteTextField" value="<?php echo $_GET['id'] ?>"/>
						<div class="alert alert-danger" role="alert">Are you sure you want to delete this donor?</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
  	</div>
<?php include('footer.php'); ?>

</body>
</html>