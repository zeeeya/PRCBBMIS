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
					<h2 style="text-align: center;">Blood Collection</h2>
					<br />
				</div>
						
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 style="color: #333">Blood Collection</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./php/addcollection.php" method="post">

<div class="control-group">
<label for="name">Name</label>
<input type="text" class="form-control" required id="name" name="name" placeholder="Name">
</div>


<div class="control-group">
<label for="donorno">Donor No.</label>
<input type="text" class="form-control" required id="donorno" name="donorno" placeholder="Donor No.">
</div>

<div class="control-group">
<label for="bloodbagused">Blood Bag Used</label>
<input type="text" class="form-control" required id="bloodbagused" name="bloodbagused" placeholder="Blood Bag Used">
</div>

<div class="control-group">
<label for="bloodamount">Amount Blood Taken</label>
<input type="text" class="form-control" required id="bloodamount" name="bloodamount" placeholder="Amount Blood Taken">
</div>

<div class="control-group">
<label for="unitserialno">Unit Serial Number</label>
<input type="text" class="form-control" required id="unitserialno" name="unitserialno" placeholder="Unit Serial Number">
</div>
<div class="control-group">
<label class="control-label" for="collectiondate">Date</label>
<div class="controls">
<input id="collectiondate" name="collectiondate" type="date" class="form-control" >
</div>

<div class="control-group">
                            <label class="control-label" for="bloodtype">Blood Type</label>
                            <select class="form-control" required="required" id="bloodtype" name="bloodtype">
                                <option></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                                <option value="-A">-A</option>
                                <option value="-B">-B</option>
                                <option value="-O">-O</option>
                                <option value="-AB">-AB</option>
                                </select>
                        </div>
                        <div class="text-center">
                        <br>
<button type="submit" class="btn btn-primary">Save</button>
<button type="submit" class="btn btn-primary">Search</button>
</div>
</table>

        <br><br><br><br>		</div>
						  	</div>		
						</form>
					</div>
				</div>		
			</div>
		</div>
	</form>
<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
</body>
</html>
