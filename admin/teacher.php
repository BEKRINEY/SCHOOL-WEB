<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		$title = 'Cadres';
		include 'includes/head.php';
		?>

  <body>

	<div id="wrapper">

     <?php
					include 'includes/sidebar.php';
					?>
      <div id="page-wrapper">

			<div class="row">
				<div class="col-lg-3">

					<h1></h1>
					<div class="panel panel-primary">
						<div class="panel-heading">
						<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
							<h3 class="panel-title">Cadres</h3>
						</div>
						<div class="panel-body">

							

							<form class="table-responsive"  method="post"
								action="classes.php" autocomplete="on">
								<table class="table table table-hover">
									<THEAD>
										
									</THEAD>
								<?php
								$rs = $db->doQuery ( 'SELECT c_name, c_id FROM t_matiere' );
								 foreach ($rs as $line){?>
								<TR>
										<td>
											<a href=<?php echo "teacher.php?c_id=$line[1]"; ?>><?php echo $line[0]; ?></a>
										</td>
									</TR>
								<?php }?>
							</TABLE>

							</form>

						</div>
					</div>
				</div>
 <?php
	if (isset ( $_GET ['c_id'] )) {
		$rs = $db->doQuery ( 'SELECT * FROM t_teacher WHERE c_matiere=' . $_GET ['c_id'] );
		?>
				<div class="col-lg-9">

					<h1></h1>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">&times;</button>

						<form class="table-responsive" role="form" method="get"
							action="classes.php" autocomplete="on">
							<table class="table table table-hover">
								<THEAD>
									<th>
										Nom
										<i class="fa fa-sort"></i>
									</th>
									<th>
										Prenom
										<i class="fa fa-sort"></i>
									</th>
									<th>
										Code Confidentiel
										<i class="fa fa-sort"></i>
									</th>
								</THEAD>
								<?php foreach ($rs as $line){?>
								<TR>
									<td>
										<i class="form-control"><?php echo $line[1]; ?></i>
									</td>
									<td>
										<i class="form-control"><?php echo $line[2]; ?></i>
									</td>
									<td>
										<i class="form-control"><?php echo $line[3]; ?></i>
									</td>
								</TR>
								<?php
		
}
	}
	?>
							</TABLE>

						</form>

					</div>

				</div>

			</div>

			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
</body>
</html>