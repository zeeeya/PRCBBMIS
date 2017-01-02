<?php 
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$dispensing = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM dispensing
	ORDER BY dispensingid
	LIMIT {$start},{$perPage}
");
$dispensing->execute();

$dispensing = $dispensing->fetchAll(PDO::FETCH_ASSOC);

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
	<div class="col-lg-12">
		<div class="row" style="border-bottom:solid 1px;margin-bottom:15px;">
				<div class="col-md-7">
					<h2>Dispensing List</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
                                    <a href="dispensing.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Add New Dispensing</a>
				</div>
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th class="text-center">Blood Bag Serial No.</th>
						<th class="text-center">Dispensing Date</th>
						<th class="text-center">Request ID</th>
						<th class="text-center">patient</th>
                        <th class="text-center">Blood Type</th>
						<th class="text-center">Received by</th>
						<th class="text-center">Contact</th>
						
					</tr>
				</thead>
				<tbody>					
					<?php								
						foreach ($dispensing as $row) {
							echo '<tr>';
								echo '<td>'. $row['bloodbagserialno'] . '</td>';
								echo '<td>'.$row['dispensingdate'].'</td>';
								echo '<td>'.$row['requestid'].'</td>';
								echo '<td>'.$row['patient'].'</td>';
                                                                echo '<td>'.$row['bloodtype'].'</td>';
                                                                echo '<td>'.$row['rname'].'</td>';
                                                                echo '<td>'.$row['rcontact'].'</td>';
                                                                
								echo '<td class="text-center">
											<a class="btn btn-warning btn-md" href="#" data-toggle="tooltip" title="Update"><span class="glyphicon glyphicon-pencil"></span></a>
											<a class="btn btn-danger btn-md" href="#" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
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

<!--edit @ footer.php-->
<?php
	include('footer.php');
?>
   
</body>
</html>