<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
<?php

include 'includes/head.php';
if (($_SESSION ['TYPE'] != 'GS')) {
	header ( 'location:home.php' );
}
?>
  <body>
	<div id="wrapper">
     <?php include 'includes/sidebar.php';?>
     
      <div id="page-wrapper">
   <?php
			try {
				if (isset ( $_POST ['filiere'] )) {
					$db->doNonQuery ( 'INSERT INTO t_filiere (c_name) VALUES (?)', array (
							's',
							&$_POST ['nom'] 
					) );
					$fil = true;
					?>
									 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Filiére Ajoutee </strong>
					<a href="#" class="alert-link"><?php echo $_POST ['nom'] ; ?></a>
				</div>
			</div>
				<?php
				}
				if (isset ( $_POST ['matieres'] )) {
					$db->doNonQuery ( 'INSERT INTO t_matiere (c_name) VALUES (?)', array (
							's',
							$_POST ['nom'] 
					) );
					$mat = true;
					?>
									 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Matiere Ajoutee </strong>
					<a href="#" class="alert-link"><?php echo $_POST ['nom'] ; ?></a>
				</div>
			</div>
									<?php
				}
				if (isset ( $_POST ['class'] )) {
					$db->doNonQuery ( 'INSERT INTO  t_class (c_filiere,c_niveau,c_class)  VALUES (?,?,(SELECT (CASE WHEN MAX(t.c_class)+1 IS NULL THEN 1 ELSE MAX(t.c_class)+1  END) FROM t_class t WHERE t.c_filiere= ? AND t.c_niveau=?))', array (
							'iiii',
							$_POST ['filieres'],
							$_POST ['niveau'],
							$_POST ['filieres'],
							$_POST ['niveau'] 
					) );
					$cla = true;
					?>
									 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Classe Ajoutee </strong>
					<a href="#" class="alert-link"><?php echo $_POST ['filieres'] ; ?></a>
				</div>
			</div>
									<?php
				}
				if (isset ( $_POST ['etudiant'] )) {
					$db->doNonQuery ( 'INSERT INTO t_student (c_first_name,c_last_name,c_cne,c_date,c_class,c_tel,c_adress) VALUES (?,?,?,?,?,?,?);', array (
							'sssssss',
							$_POST ['nom'],
							$_POST ['prenom'],
							$_POST ['Code_Confidentiel'],
							$_POST ['date'],
							$_POST ['classs'],
							$_POST ['tel'],
							$_POST ['adress'] 
					) );
					$db->doNonQuery ( 'INSERT INTO t_user (c_username,c_password,c_group)VALUES (?,?,?);', array (
							'sss',
							$_POST ['Code_Confidentiel'],
							$_POST ['date'],
							4 
					) );
					$etd = true;
					?>
				 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Etudiant Ajoutee </strong>
					<a href="#" class="alert-link"><?php echo $_POST ['nom'].' '.$_POST ['prenom'] ; ?></a>
				</div>
			</div>
				<?php
				}
				if (isset ( $_POST ['cadre'] )) {
					$db->doNonQuery ( 'INSERT INTO t_teacher (c_first_name,c_last_name,c_pptr,c_date,c_matiere,c_tel,c_adress) VALUES (?,?,?,?,?,?,?);', array (
							'sssssss',
							$_POST ['nom'],
							$_POST ['prenom'],
							$_POST ['Code_Confidentiel'],
							$_POST ['date'],
							$_POST ['matiere'],
							$_POST ['tel'],
							$_POST ['adress'] 
					) );
					$db->doNonQuery ( 'INSERT INTO t_user (c_username,c_password,c_group)VALUES (?,?,?);', array (
							'sss',
							$_POST ['Code_Confidentiel'],
							$_POST ['date'],
							3 
					) );
					$cad = true;
					?>
				 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Cadre Ajoutee </strong>
					<a href="#" class="alert-link"><?php echo $_POST ['nom'].' '.$_POST ['prenom'] ; ?></a>
				</div>
			</div>
				<?php
				}
				if (isset ( $_POST ['classaf'] )) {
					if (isset ( $_POST ['delete'] )) {
						$db->doNonQuery ( 'DELETE FROM t_affectation  WHERE c_teacher=? and c_class =? ', array (
								'ii',
								$_POST ['prof'],
								$_POST ['classaf'] 
						) );
						?>
				 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Spprimer </strong>
					<a href="#" class="alert-link"></a>
				</div>
			</div>
				<?php
					} elseif (isset ( $_POST ['add'] )) {
						$db->doNonQuery ( 'INSERT INTO t_affectation (c_teacher,c_class) VALUES(?,?);', array (
								'ii',
								$_POST ['prof'],
								$_POST ['classaf'] 
						) );
						?>
				 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Affecter </strong>
					<a href="#" class="alert-link"></a>
				</div>
			</div>
				<?php
					}
					$aff = true;
				}
			} catch ( Exception $e ) {
				?>
 <div class="col-lg-12">
				<div class="alert alert-dismissable alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Une erreur s'est produite</strong>
					<br>
					<strong>Message :<?php echo $e->getMessage() ; ?></strong>
					<br>
					<strong>Code    :<?php echo $e->getCode() ; ?></strong>
					<br>
				</div>
			</div>
<?php
			}
			?>
			

				
      <DIV class="row">
				<div class="col-lg-12">
					<div class="bs-example">
						<ul class="nav nav-tabs" style="margin-bottom: 15px;">
							<li <?php if(isset($cad)) echo 'class="active"' ;?>>
								<a href="#Cadre" data-toggle="tab">Cadre</a>
							</li>
							<li <?php if(isset($etd)) echo 'class="active"' ;?>>
								<a href="#Etudiant" data-toggle="tab">Etudiant</a>
							</li>
							<li <?php if(isset($cla)) echo 'class="active"' ;?>>
								<a href="#Class" data-toggle="tab">Class</a>
							</li>
							<li <?php if(isset($mat)) echo 'class="active"' ;?>>
								<a href="#Matiere" data-toggle="tab">Matiere</a>
							</li>
							<li <?php if(isset($fil)) echo 'class="active"' ;?>>
								<a href="#Filiere" data-toggle="tab">Filiere</a>
							</li>
							<li <?php if(isset($aff)) echo 'class="active"' ;?>>
								<a href="#afff" data-toggle="tab">Affectation</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div
								<?php if(isset($etd)) echo 'class="tab-pane fade active in"'; else echo 'class="tab-pane fade"';?>
								id="Etudiant">
								<DIV class="col-lg-12">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												Etudiant
											</h3>
										</div>
										<div class="panel-body">
											<FORM class="form-group" action="" method="post">
												<FIELDSET>
													<DIV class="col-lg-6">
														<LABEL>Nom</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="nom">
														<LABEL>Prenom</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="prenom">
														<LABEL>Code Confidentiel</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="Code_Confidentiel">
														<LABEL>Date</LABEL>
														<INPUT class="form-control" type="date"
															value="<?php echo date('Y-m-d'); ?>" required="required"
															name="date">
														<LABEL>Adress</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="adress">
														<LABEL>Telephone</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="tel">
														<LABEL>Class</LABEL>
														<SELECT name="classs" required="required"
															class="form-control">
      						<?php
												$rs = $db->doQuery ( 'SELECT concat(c_niveau, t_filiere.c_name,  c_class),t_class.c_id FROM t_class JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id' );
												foreach ( $rs as $line ) {
													?>
				
      						<OPTION value="<?php echo $line[1];?>"><?php echo $line[0];?></OPTION>
      						<?php }?>
      					</SELECT>
														<br>
														<INPUT type="submit" class="btn btn-primary"
															name="etudiant" value="Ajouter">
													</DIV>
												</FIELDSET>

											</FORM>
										</DIV>
									</DIV>
								</DIV>
							</div>
							<div
								<?php if(isset($cad)) echo 'class="tab-pane fade active in"'; else echo 'class="tab-pane fade"';?>
								id="Cadre">
								<DIV class="col-lg-12">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												Cadre
											</h3>
										</div>
										<div class="panel-body">
											<FORM class="form-group" action="" method="post">
												<FIELDSET>
													<DIV class="col-lg-6">

														<LABEL>Nom</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="nom">
														<LABEL>Prenom</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="prenom">
														<LABEL>Code Confidentiel</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="Code_Confidentiel">
														<LABEL>Date</LABEL>
														<INPUT class="form-control" type="date"
															value="<?php echo date('Y-m-d'); ?>" required="required"
															name="date">
														<LABEL>Adress</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="adress">
														<LABEL>Telephone</LABEL>
														<INPUT class="form-control" type="text"
															required="required" name="tel">
														<LABEL>Matiere</LABEL>
														<SELECT name="matiere" required="required"
															class="form-control">
															<OPTION></OPTION>
      							<?php
													$rs = $db->doQuery ( 'SELECT * FROM t_matiere' );
													foreach ( $rs as $line ) {
														?>
				
      						<OPTION value="<?php echo $line[0];?>"><?php echo $line[1];?></OPTION>
      						<?php }?>
      					</SELECT>
														<br>
														<INPUT type="submit" class="btn btn-primary" name="cadre"
															value="Ajouter">
													</DIV>
												</FIELDSET>

											</FORM>
										</DIV>
									</DIV>
								</div>
							</DIV>

							<div
								<?php if(isset($mat)) echo 'class="tab-pane fade active in"'; else echo 'class="tab-pane fade"';?>
								id="Matiere">
								<DIV class="col-lg-3">

									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
											</h3>
										</div>

										<div class="panel-body">


											<form class="table-responsive" method="post"
												action="classes.php" autocomplete="on">
												<table class="table table table-hover">
													<THEAD>

													</THEAD>
									<?php
									$rs = $db->doQuery ( 'SELECT * FROM t_matiere' );
									?>
								<?php
								foreach ( $rs as $line ) {
									?>
								<TR>
														<td>
															<a><?php echo $line[1]; ?></a>
														</td>
													</TR>
								<?php }?>
							</TABLE>

											</form>


										</DIV>
									</DIV>
								</div>

								<DIV class="col-lg-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												Matiere
											</h3>
										</div>
										<div class="panel-body">
											<FORM action="" method="post">
												<LABEL>Nom</LABEL>
												<INPUT class="form-control" required="required" type="text"
													name="nom">
												<br>
												<INPUT type="submit" class="btn btn-primary" name="matieres"
													value="Ajouter">
											</FORM>

										</DIV>
									</DIV>
								</div>
							</DIV>
							<div
								<?php if(isset($cla)) echo 'class="tab-pane fade active in"'; else echo 'class="tab-pane fade"';?>
								id="Class">
								<DIV class="col-lg-3">

									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
											</h3>
										</div>

										<div class="panel-body">


											<form class="table-responsive" method="post"
												action="classes.php" autocomplete="on">
												<table class="table table table-hover">
													<THEAD>

													</THEAD>
									<?php
									$rs = $db->doQuery ( 'SELECT concat(c_niveau, t_filiere.c_name,  c_class),t_class.c_id FROM t_class JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id' );
									?>
								<?php
								foreach ( $rs as $line ) {
									?>
								<TR>
														<td>
															<a><?php echo $line[0]; ?></a>
														</td>
													</TR>
								<?php }?>
							</TABLE>

											</form>


										</DIV>
									</DIV>
								</div>
								<DIV class="col-lg-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												Class
											</h3>
										</div>
										<div class="panel-body">
											<FORM action="" method="post">
												<LABEL>Filiere</LABEL>
												<SELECT name="filieres" class="form-control"
													required="required">
      					<?php
											$rs = $db->doQuery ( 'SELECT * FROM t_filiere' );
											foreach ( $rs as $line ) {
												?>
      					<OPTION value="<?php echo $line[0]?>"><?php echo $line[1]?></OPTION>
														<?php }?>
												
												</SELECT>
												<LABEL>Niveau</LABEL>
												<INPUT type="number" name="niveau" class="form-control"
													required="required">
												<br>
												<INPUT type="submit" class="btn btn-primary" name="class"
													value="Ajouter">
											</FORM>

										</DIV>
									</DIV>
								</DIV>
							</div>
							<div
								<?php if(isset($fil)) echo 'class="tab-pane fade active in"'; else echo 'class="tab-pane fade"';?>
								id="Filiere">
								<DIV class="col-lg-3">

									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
											</h3>
										</div>

										<div class="panel-body">


											<form class="table-responsive" method="post"
												action="classes.php" autocomplete="on">
												<table class="table table table-hover">
													<THEAD>

													</THEAD>
									<?php
									$rs = $db->doQuery ( 'SELECT * FROM t_filiere' );
									?>
								<?php
								foreach ( $rs as $line ) {
									?>
								<TR>
														<td>
															<a><?php echo $line[1]; ?></a>
														</td>
													</TR>
								<?php }?>
							</TABLE>

											</form>


										</DIV>
									</DIV>
								</div>
								<DIV class="col-lg-6">

									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												filiere
											</h3>
										</div>
										<div class="panel-body">
											<FORM action="" method="post">
												<LABEL>Nom</LABEL>
												<INPUT class="form-control" required="required" type="text"
													name="nom">
												<br>
												<INPUT type="submit" class="btn btn-primary" name="filiere"
													value="Ajouter">
											</FORM>
										</DIV>
									</DIV>
								</div>
							</div>
							<div id="afff"
								<?php if(isset($aff)) echo 'class="tab-pane fade active in"'; else echo 'class="tab-pane fade"';?>>
								<DIV class="col-lg-3">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												List des Class
											</h3>
										</div>
										<div class="panel-body">

											<table>
												
									<?php
									$rs = $db->doQuery ( 'SELECT concat(c_niveau, t_filiere.c_name,  c_class),t_class.c_id FROM t_class JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id' );
									?>
								<?php
								foreach ( $rs as $line ) {
									?>
								<TR>
													<td>
														<FORM class="col-lg-12" action="" method="post">
															<INPUT type="hidden" name="classaf"
																value="<?php echo $line[1];?>">
															<DIV class="row">
																<DIV class="col-lg-12">
																	<INPUT type="submit" value="<?php echo $line[0]; ?>"
																		class="btn btn-link">
																</DIV>
															</DIV>
														</FORM>
													</td>
												</TR>
								<?php }?>
							</TABLE>


										</DIV>
									</DIV>
								</div>
								<DIV class="col-lg-9">
								<?php if(isset($_POST['classaf'])){?>
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												<i class="fa fa-bar-chart-o"></i>
												Affectation
											</h3>
										</div>
										<div class="panel-body">
											<?php
									$rs = $db->doQuery ( 'SELECT concat(c_niveau, t_filiere.c_name,  c_class),t_class.c_id FROM t_class JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id WHERE t_class.c_id=?', array (
											'i',
											$_REQUEST ['classaf'] 
									) );
									foreach ( $rs as $line ) {
										?>
												<LABEL class=""><?php echo $line[0]?></LABEL>
											<?php
									}
									?>
												<table class="table table table-hover">
												<THEAD>

												</THEAD>
											<?php
									$rs = $db->doQuery ( 'SELECT t_affectation.*,CONCAT(c_first_name,\' \',c_last_name),c_name FROM t_affectation JOIN t_teacher ON t_affectation.c_teacher=t_teacher.c_id JOIN t_matiere ON t_matiere.c_id=t_teacher.c_matiere WHERE c_class=?', array (
											'i',
											$_POST ['classaf'] 
									) );
									foreach ( $rs as $line ) {
										?>
										<TR>
													<td><?php echo $line[2];?></td>
													<td><?php echo $line[3];?></td>
													<td>
														<form name="delete<?php echo $line[1]; ?>" method="post"
															action="">
															<INPUT type="hidden" name="prof"
																value="<?php echo $line[0];?>">
															<INPUT type="hidden" name="classaf"
																value="<?php echo $line[1];?>">
															<INPUT class="btn btn-danger" type="submit" name="delete"
																value="Supprimer">
														</form>
													</td>
												</TR>
								<?php }?>
							</TABLE>
							<?php
									if (! isset ( $_POST ['insert'] )) {
										?>
							<FORM action="" method="post">
												<INPUT type="submit" name="insert" class="btn btn-primary"
													value="ajouter">
												<INPUT type="hidden" name="classaf"
													value="<?php echo $_POST ['classaf'];?>">
											</FORM>
							<?php
									} else {
										$rs = $db->doQuery ( 'SELECT CONCAT(c_first_name,\' \',c_last_name),c_name ,t_teacher.c_id FROM  t_teacher JOIN t_matiere ON t_matiere.c_id=t_teacher.c_matiere WHERE t_matiere.c_id NOT IN(SELECT c_matiere FROM t_teacher WHERE	c_id IN (SELECT c_teacher FROM t_affectation WHERE c_class=?))', array (
												'i',
												$_POST ['classaf'] 
										) );
										?>
							<FORM action="" method="post">
							<?php if($rs!=null){?>
								<SELECT class="form-control" name="prof">
									<?php
											
											foreach ( $rs as $line ) {
												?>
										<OPTION title="<?php echo $line[1]; ?>"
														value="<?php echo $line[2];  ?>"><?php echo $line[0];?></OPTION>
									<?php }?>
								</SELECT>
												<br>
												<INPUT type="hidden" name="classaf"
													value="<?php echo $_POST ['classaf'];?>">
												<INPUT type="submit" class="btn btn-primary" name="add"
													value="ajouter">
								<?php }?>
							</FORM>
							<?php
								}	
							?>
										</DIV>
									</DIV>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /#row -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->

</body>
</html>
