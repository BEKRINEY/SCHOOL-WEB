<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		include 'includes/head.php';
		?>

  <body>

	<div id="wrapper">
    <?php
				include 'includes/sidebar.php';
				?>
      <div id="page-wrapper">

			<div class="alert alert-dismissable alert-success">
			<div class="row">
			
				<div class="col-lg-12">
					<h1>
						Profile
						<small></small>
					</h1>
					<form >
<?php 
switch ($_SESSION ['TYPE']) {
	case "STUDENT" :
		$rs = $db->doQuery ( 'SELECT c_first_name, c_last_name,  c_cne,  c_date ,  concat(c_niveau ,t_filiere.c_name ,t_class.c_class) FROM  t_student join  t_class on t_student.c_class=t_class.c_id join  t_filiere on t_filiere.c_id=t_class.c_filiere and t_student.c_id=' . $_SESSION ['SID'] );
		break;
	default :
		$rs = $db->doQuery ( 'SELECT c_first_name, c_last_name,  c_pptr,  c_date ,  t_matiere.c_name FROM  t_teacher left join  t_matiere on t_teacher.c_matiere=t_matiere.c_id WHERE t_teacher.c_id=' . $_SESSION ['SID'] );
		break;
}
?>
						<fieldset>

							<div class="form-group">
								<label for="disabledSelect">Nom</label>
								<input class="form-control" type="text"
									value="<?php echo $rs[0][0];?>" readonly="readonly">
							</div>
							<div class="form-group">
								<label for="disabledSelect">Prenom</label>
								<input class="form-control" type="text"
									value="<?php echo $rs[0][1];?>" readonly="readonly">
							</div>
							<div class="form-group">
								<label for="disabledSelect">Code Confidentiel</label>
								<input class="form-control" type="text"
									value="<?php echo $rs[0][2];?>" readonly="readonly">
							</div>
							<div class="form-group">
								<label for="disabledSelect"></label>
								<input class="form-control" type="text"
									value="<?php echo $rs[0][4];?>" readonly="readonly">
							</div>
						</fieldset>

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