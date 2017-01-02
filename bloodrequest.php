<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="/xampp/htdocs/pr1/css/custom_style.css">
	<link rel="stylesheet" type="text/css" href="/xampp/htdocs/pr1/css/bootstrap.theme.mis.css">
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
					<h2 style="text-align: center;">Blood Request</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 style="color: #333">Request</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addrequest.php" method="post">

<div class="control-group">
<label for="name">Name</label>
<input type="text" class="form-control" required id="name" name="name" placeholder="Name">
</div>
<div class="control-group">
                            <label class="control-label" for="bloodtype">Blood Type</label>
                            <select class="form-control" required="bloodtype" id="bloodtype" name="bloodtype">
                                <option></option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">O</option>
                                <option value="">AB</option>
                                <option value="">-A</option>
                                <option value="">-B</option>
                                <option value="">-O</option>
                                <option value="">-AB</option>
                                </select>
                        </div>


<div class="control-group ">
<label for="requestno">Request No.</label>
<input type="text" class="form-control" required id="requestno" name="requestno" placeholder="Request No.">
</div>

<div class="control-group">
<label for="hospital">Hospital</label>
<input type="text" class="form-control" required id="hospital" name="hospital" placeholder="Hospital">
</div>

<div class="control-group">
<label for="component">Component</label>
<input type="text" class="form-control" required id="component" name="component" placeholder="Component">
</div>

<div class="control-group">
							  <label class="control-label" for="transfusion">Transfusion</label>
							  	<input type="radio" name="transfusion" value="male" id="transfusion" checked> Yes
			  					<input type="radio" name="transfusion" value="female" id="transfusion"> No
							  </div>

<div class="control-group">
<label for="quantity">Quantity</label>
<input type="text" class="form-control" required id="quantity" name="quantity" placeholder="Quantity">
</div>

<div class="control-group">
<label for="diagnosis">Diagnosis</label>
<input type="text" class="form-control" required id="diagnosis" name="diagnosis" placeholder="Diagnosis">
</div>
<br>

 <div class="text-center">
<button type="submit" class="btn btn-primary">Save</button>
<button type="submit" class="btn btn-primary">Search</button>
</div>	
</table>
        <br><br><br><br>			</div>
        						</form>		
					</div>
				
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
