<?php 
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$donor = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM donor 
	ORDER BY dname
	LIMIT {$start},{$perPage}
");
$donor->execute();

$donor = $donor->fetchAll(PDO::FETCH_ASSOC);

// Pages
$total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);
?>
<!--Start of Html-->
<!DOCTYPE html>
<html>
<head>

</head>
<body>

	<?php 
		include('header.php');
	?>
	<div class="container">
		<div class="col-lg-offset-1 col-lg-10">
			<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
				<div class="col-md-7">
					<h2>Donor List</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
	                <a href="donorcreate.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp; Add New Donor</a>
				</div>
			</div>
			<form  method="post" action="./php/dsearch.php?go"  id="searchform"> 
		      	<input  type="text" name="name"> 
	      		<button type="submit" class="btn btn-info btn-md" rel="tooltip" title="Search"><span class="glyphicon glyphicon-search"></span></button>
	      	</form> 
	      	<p><a  href="?by=A">A</a> | <a  href="?by=B">B</a> | <a  href="?by=K">K</a></p> 
	      	<br>
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr class="alert-info">
							<th>Donor ID</th>
							<th>Name</th>
							<th>Registration Date</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>	
					<tbody>					
						<?php								
							foreach ($donor as $row) {
								echo '<tr>';
									echo '<td>'. $row['did'] . '</td>';
									echo '<td>'.$row['dname'].'</td>';
									echo '<td>'.date('m/d/Y').'</td>';
									echo '<td class="text-center">
													<a class="btn btn-primary btn-md" href="viewdonor.php?id='.$row['did'].'" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-edit"></span></a>
									  		  </td>';
								echo '</tr>';
							}
							Database::disconnect();
						?>
					</tbody>
				</table>
			</div>
			<nav class="text-center">
				  <ul class="pagination">
					<?php if($page > 1){?>
						<li>
						  <a href="?page=<?php echo $page-1; ?>&per-page=<?php echo $perPage; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						  </a>
						</li>
					<?php }?>
					
					<?php for($x = 1; $x <= $pages; $x++) : ?>
						<li <?php if($page === $x){ echo 'class="active"'; }?> ><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"><?php echo $x; ?></a></li>
					<?php endfor; ?>
					
					<?php if($page < $pages){?>
						<li>
						  <a href="?page=<?php echo $page+1; ?>&per-page=<?php echo $perPage; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						  </a>
						</li>
					<?php }?>
					
				  </ul>
			</nav>
		</div>
    </div>
    <!--delete-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document" >
			<div class="modal-content" style="margin-top:40%;">
				<div class="modal-header btn-danger">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Delete Registration</h4>
				</div>
				<form class="form-horizontal" action="./php/donor_delete.php" method="post">
					<div class="modal-body content">
						<input type="text" name="delid" id="deleteTextField" value="<?php echo $id;?>"/>
						<div class="alert alert-danger" role="alert">Are you sure you want to remove this patient from the system?</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Delete</button>
					</div>
				</form>
			</div>
		</div>
  	</div>

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
   
</body>
</html>