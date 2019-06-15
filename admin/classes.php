<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		$title = 'classes';
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
							<h3 class="panel-title">Classes</h3>
						</div>
						<div class="panel-body">
							<form class="table-responsive"  method="post"
								action="" >
								<table class="table table table-hover">
									<THEAD>
										
									</THEAD>
								<?php
								$rs = $db->doQuery ( 'SELECT concat(c_niveau, t_filiere.c_name,  c_class),t_class.c_id FROM t_class JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id' );
								 foreach ($rs as $line){?>
								<TR>
										<td>
										<FORM   action="" method="post">
															<INPUT type="hidden" name="c_id" value="<?php echo $line[1];?>">
															<DIV class="row">
																<DIV class="col-lg-12">
															<INPUT type="submit" value="<?php echo $line[0];?>" class="btn btn-link" >
											
															</DIV>
															</DIV>	
										</FORM>	
										</td>
									</TR>
								<?php }?>
							</TABLE>

							</form>

						</div>
					</div>
				</div>
 <?php
	if (isset ( $_POST ['c_id'] )) {
		$rs = $db->doQuery ( 'SELECT t_student.*,sum(c_total) FROM t_student JOIN t_absence ON t_student.c_id= t_absence.c_student WHERE c_class=' . $_POST ['c_id'] . ' GROUP BY t_student.c_id' );
		?>
				<div class="col-lg-9">
					<h1></h1>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">&times;</button>

						<form class="table-responsive"  method="get"
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
									<th>
										Total
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
									<td>
										<i class="form-control"><?php echo $line[8]; ?></i>
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