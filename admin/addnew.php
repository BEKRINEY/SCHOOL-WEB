<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		$title = "Nouvelle Annonce";
		include 'includes/head.php';
		if (($_SESSION ['TYPE'] == 'STUDENT')) {
			header ( 'location:home.php' );
		}
		?>
  <body>

	<div id="wrapper">
     <?php
					include 'includes/sidebar.php';
					?>
      <div id="page-wrapper">
<?php
if (isset ( $_POST ['submit'] )) {
	$chemin_destination1 = '/upload/';	
	$chemin_destination = '../upload/';
	if (isset ( $_FILES ['file'] )) {
		switch ($_FILES ['file'] ['error']) {
			case 1 : // UPLOAD_ERR_INI_SIZE
				?>
	<div class="well well-lg">
				<p class="text-danger">Le fichier dépasse la limite autorisée par le
					serveur</p>
				<form action="addnew.php">
					<input type="submit" value="Retour" class="btn btn-danger btn-lg">
				</form>
			</div>
	<?php
				break;
			case 2 : // UPLOAD_ERR_FORM_SIZE
				
				?>
				<div class="well well-lg">
				<p class="text-danger">Le fichier dépasse la limite autorisée dans
					le formulaire HTML !</p>
				<form action="addnew.php">
					<input type="submit" class="btn btn-danger btn-lg" value="Retour">
				</form>
			</div>
					<?php
				break;
			case 3 : // UPLOAD_ERR_PARTIAL
				?>
				<div class="well well-lg">
				<p class="text-danger">L`envoi du fichier a été interrompu pendant
					le transfert !</p>
				<form action="addnew.php">
					<input type="submit" class="btn btn-danger btn-lg" value="Retour">
				</form>
			</div>
									<?php
				break;
			case 4 : // UPLOAD_ERR_NO_FILE
				$db->doNonQuery ( 'INSERT INTO t_messages (c_sender,c_date,c_titre,c_body,c_body2,c_ressources)VALUES(?,?,?,?,?,?)', array (
						'ssssss',
						$_SESSION ['FULLNAME'],
						$_POST ['date'],
						$_POST ['titre'],
						$_POST ['editor1'],
						$_POST ['editor2'],
						
						$_POST ['ressources'] 
				) );
				?>
																	  <div class="well well-lg">
				<p class="text-success">annonce publiée avec succés</p>
				<form action="home.php">
					<input type="submit" class="btn btn-success btn-lg"
						value="Page D acceuill">
				</form>
			</div>
																	 
															<?php
				break;
			default :
				move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $chemin_destination . $_FILES ['file'] ['name'] );
				$db->doNonQuery ( 'INSERT INTO t_messages (c_sender,c_date,c_titre,c_body,c_body2,c_ressources,c_file)VALUES(?,?,?,?,?,?,?)', array (
						'sssssss',
						$_SESSION ['FULLNAME'],
						$_POST ['date'],
						$_POST ['titre'],
						$_POST ['editor1'],
						$_POST ['editor2'],
						
						$_POST ['ressources'],
						$chemin_destination1 . $_FILES ['file'] ['name'] 
				) );
				?>
														 <div class="well well-lg">
				<p class="text-success">annonce publiée avec succés</p>
				<form action="home.php">
					<input type="submit" class="btn btn-success btn-lg"
						value="Page D acceuill">
				</form>
			</div>
												<?php
				break;
		}
	}
} else {
	?>
		
      <DIV class="row">
				<div class="col-lg-12">
					<div class="bs-example">
						<ul class="nav nav-tabs" style="margin-bottom: 15px;">
							<li>
								<a href="#infos" data-toggle="modal">Ajouter</a>
							</li>
							<li>
								<a href="#S" data-toggle="tab">Supprimer</a>
							</li>

						</ul>
						<div id="myTabContent" class="tab-content">


							<div class="tab-pane fade" id="S">
								<DIV class="col-lg-12">

									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
											</h3>
										</div>

										<div class="panel-body">
											<?php
	if (isset ( $_POST ['do'] )) {
		$db->doNonQuery ( 'DELETE FROM t_messages  where c_id = ?', array (
				'i',
				$_POST ['c_id'] 
		) );
		?>
		<div class="well well-lg">
												<p class="text-danger">Annonce et bien Supprimer</p>
												<form action="" method="post">
													<input type="submit" value="Retour"
														class="btn btn-danger btn-lg">
												</form>
											</div>
	<?php
	} else {
		?>
			<div class="row">
												<div class="col-lg-12">
													<h1>
														Supprimer Annonce
														<small>par <?php echo $_SESSION['FULLNAME'];?></small>
													</h1>
												</div>
											</div>
											<!-- /.row -->
			<?php
		//$query = mysql_query ( "SET NAMES 'utf8'" );
		$rs = $db->doQuery ( 'SELECT * FROM t_messages  ORDER BY c_id desc' );
		
		// echo $line[2];
		?>
		
    
        
			 
			 <div class="col-lg-12">

												<h1></h1>
												<div class="panel panel-primary">
													<div class="panel-heading">

														<h3 class="panel-title">Supprimer Les annonces</h3>
													</div>
													<div class="panel-body">



														<table class="table table table-hover">
															<THEAD>

																<th></th>
															</THEAD>
																<?php
		foreach ( $rs as $line ) {
			?>
								<TR>

																<td>
																	<p class="post_meta">
																		<span class="cat"><?php  echo $line[3];//t1?>
																	
																	
																	
																	
																	
																	</p>

																</td>
																<td>
																	<form method="POST" action="">
																		<input type="hidden"
																			value="<?php   echo $line[0];// ?>" name="c_id" />
																		<input type="submit" name="do" value="supprime"
																			class="btn btn-danger" />

																	</form>
																</td>
															</TR>
								
						<?php }?>
						</TABLE>
														<div class="cleaner h10"></div>




													</div>
												</div>
											</div>
<?php }?>
										</DIV>
									</DIV>
								</div>

							</div>
							<div class="modal" id="infos">
								<div class="modal-dialog"
									style="height: 540px; max-height: 540px; width: 800px; max-width: 800x;">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">x</button>


											<h3>
												Nouvelle Annonce
												<small>par <?php echo $_SESSION['FULLNAME'];?></small>
											</h3>

										</div>
										<div class="modal-body">
											<div class="panel panel-primary">

												<div class="panel-body">

													<!-- /.row -->
													<form role="form" method="post" action="" autocomplete="on"
														enctype="multipart/form-data">
														<div class="form-group input-group">
															<span class="input-group-addon">Titre</span>
															<input required="required" name="titre" type="text"
																class="form-control" placeholder="Titre">
														</div>

														<div class="form-group input-group">
															<span class="input-group-addon">Date</span>
															<input required="required" name="date" type="date"
																class="form-control" value="<?php echo date('Y-m-d');?>">
														</div>
														<div class="form-group input-group">
															<span class="input-group-addon">PJ</span>
															<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
															<input name="file" type="file" class="" placeholder="">
														</div>
														<div class="form-group input-group">
															<span class="input-group-addon">PhotoUrl</span>
															<input required="required" name="editor1" type="text"
																class="form-control" placeholder="PhotoUrl">
														</div>


														<div class="form-group input-group">
															<span class="input-group-addon">ressources</span>
															<input required="required" name="ressources" type="text"
																class="form-control" placeholder="ressources">
														</div>
														<DIV class="row">
														<DIV class="col-lg-12">
															<textarea required="required" rows="" cols=""
																class="ckeditor" name="editor2"></textarea>

														</DIV>
														</DIV>
														
														
														<div class="modal-footer">
															<table>
																<tr>
																	<td>
																		<button type="submit" name="submit"
																			class="btn btn-default">Ok</button>
																	</td>
																	<td>
																		<button type="reset" data-dismiss="modal"
																			class="btn btn-default">Annuller</button>
																	</td>
																</tr>
															</table>
														</div>
													</form>
												</DIV>
											</DIV>
										</div>
										
									
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
</body>

</html>