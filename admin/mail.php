<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		$title = "Message Privé";
		include 'includes/head.php';
		?>

  <body>

	<div id="wrapper">

     <?php
					include 'includes/sidebar.php';
					?>
      <div id="page-wrapper">
<?php

if (isset ( $_POST ['submit'] )) {
try {
	$db->doNonQuery ( 'INSERT INTO t_private_mail(c_sender , c_suject , c_mail ) VALUES (?,?,?)', array (
		'ssss',
		$_SESSION ['FULLNAME'],
		$_POST ['subject'],
		$_POST ['editor1']
) );

?>
	<div class="alert alert-dismissable alert-success">
				<p class="text-success">Enviyee Avec Succse</p>
	</div>
<?php
	header ( "Refresh:5; url=http:home.php" );
} catch (Exception $e) {
?>
 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Une erreur s'est produite</strong><br>
					<strong>Message :<?php echo $e->getMessage() ; ?></strong><br>
					<strong>Code    :<?php echo $e->getCode() ; ?></strong><br>
				</div>
			</div>
<?php
}

} else {
	?>
			<div class="row">
				<div class="col-lg-12">
					<h1>
						Message Privé
						<small>par <?php echo $_SESSION['FULLNAME'];?></small>
					</h1>
				</div>
			</div>
			<!-- /.row -->
			<form  method="post" action="mail.php" autocomplete="on">
				<div class="form-group input-group">
					<span class="input-group-addon">Sujet</span>
					<input name="subject" type="text" class="form-control"
						placeholder="Sujet" required="required">
				</div>
				<TEXTAREA rows="" cols="" required="required" class="ckeditor"
					name="editor1"></TEXTAREA>
				<TABLE>
					<TR>
						<TD>
							<button type="submit" name="submit" class="btn btn-default">Ok</button>
						</TD>
						<TD>
							<button type="reset" class="btn btn-default">Annuller</button>
						</TD>
					</TR>
				</TABLE>
			</form>
			<?php }?>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
</body>
</html>