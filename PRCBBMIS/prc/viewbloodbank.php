<?php 
	require 'dbconnect.php';

// User Input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

// Positioning
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query
$pdo = Database::connect();
$bloodbank = $pdo->prepare("
	SELECT SQL_CALC_FOUND_ROWS * 
	FROM bloodbank 
	ORDER BY bankname
	LIMIT {$start},{$perPage}
");
$bloodbank->execute();

$bloodbank = $bloodbank->fetchAll(PDO::FETCH_ASSOC);

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
					<h2>Blood Bank List</h2>
				</div>
				<div class="col-md-5 text-right" style="padding-top:20px;">
                                    <a href="bloodbankcreate.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus-sign"></span>Add Blood Bank</a>
				</div>
			</div>
		<div class="table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr class="alert-info">
						<th class="text-center">Name</th>
						<th class="text-center">Address</th>
						<th class="text-center">Contact No.</th>
						<th class="text-center">Country</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>					
					<?php								
						foreach ($bloodbank as $row) {
							echo '<tr>';
								echo '<td>'. $row['bankname'] . '</td>';
								echo '<td>'.$row['bankaddress'].'</td>';
								echo '<td>'.$row['contactdetails'].'</td>';
								echo '<td>'.$row['country'].'</td>';
								echo '<td class="text-center">
									<button type="button" class="btn btn-warning btn-md updateB" rel="tooltip" title="Update Item" data-toggle="modal" data-target="#updateModal" value="'.$row['bankid'].'"><span class="glyphicon glyphicon-pencil"></span></button>
									<button type="button" class="btn btn-danger btn-md deleteB" rel="tooltip" title="Delete Item" data-toggle="modal" data-target="#myModal" value="'.$row['bankid'].'"><span class="glyphicon glyphicon-trash"></span></button>
							  		  </td>';
							echo '</tr>';
						}
						Database::disconnect();
					?>
                                    <script>
								$(document).ready(function(){
									$('[data-toggle="tooltip"]').tooltip();
									$('.btn').tooltip();
								});
							</script>
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