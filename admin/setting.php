<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		$title = "Paramétres";
		include 'includes/head.php';
		?>

  <body>

	<div id="wrapper">
    <?php
				include 'includes/sidebar.php';
				?>
      <div id="page-wrapper">
			<div class="row">
			<?php
			if (isset ( $_POST ['submit'] )) {
				if ($_REQUEST ['newpass'] == $_REQUEST ['confimpass'] && $_REQUEST ['pass'] == $_SESSION ['pass']) {
					$db->doQuery ( 'UPDATE t_user SET c_password =?  WHERE  c_username=? and c_password=?', array (
							'sss',
							$_REQUEST ['newpass'],
							$_SESSION ['user'],
							$_SESSION ['pass'] 
					) );
					?>
						<div class="well well-lg">
				<p class="text-success">Mot De Pass Mise A Jouur Avec Success</p>
				<form action="home.php">
					<input type="submit" value="Retour" class="btn btn-success btn-lg">
				</form>
			</div>
					<?php
				}else 
					{
						?>
						<div class="well well-lg">
				<p class="text-danger">information incorrect</p>
				<form action="home.php">
					<input type="submit" value="Retour" class="btn btn-danger btn-lg">
				</form>
			</div>
					<?php
					}
					}else{
			
				?>
				<div class="col-lg-12">
					<h1>
						Paramétres de sécurité
						<small><?php echo $_SESSION['FULLNAME'];?></small>
					</h1>
					<form  method="post" action="setting.php">

						<fieldset>

							<div class="form-group">
								<label for="disabledSelect">ancien mot de passe</label>
								<input name='pass' class="form-control" type="password">
							</div>
							<div class="form-group">
								<label for="disabledSelect">nouveau mot de passe</label>
								<input name='newpass' class="form-control" type="password">
							</div>
							<div class="form-group">
								<label for="disabledSelect">nouveau mot de passe</label>
								<input name='confimpass' class="form-control" type="password">
							</div>
							<button type="submit" name="submit" class="btn btn-primary">mettre
								a jour</button>
						</fieldset>
					</form>

				</div>
			<?php }?>
			</div>
			<!-- /.row -->

		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
</body>
</html>