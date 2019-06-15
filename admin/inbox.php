<?php
include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <?php
		include 'includes/head.php';
		
		if (isset ( $_POST ['delete'] )) {
			$db->doNonQuery ( 'DELETE FROM t_private_mail WHERE c_id=' . $_POST ['id'] );
		}
		?>
  <body>
	<div id="wrapper">

     <?php
					include 'includes/sidebar.php';
					?>
      <div id="page-wrapper">

			<div class="row">

				<h1>
					<small></small>
				</h1>
				
				<?php
				if (isset ( $_POST ['page'] ) && $_POST ['page'] != 1)
					$of = $_POST ['page'] * 10 - 10;
				else
					$of = 0;
				$rs = $db->doQuery ( 'select * from t_private_mail order by c_date desc limit 10 offset ' . $of );
				?>
           
           
          
           <div class="col-lg-12">
           <?php if(!isset($_POST['mail'])){?>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table draggable="auto" class="table table-hover table-striped">
									<thead>
										<tr>
											<th>
												Emeteur
												<i class="fa"></i>
											</th>
											<th>
												Sujet
												<i class="fa"></i>
											</th>
											<th>
												Date
												<i class="fa"></i>
											</th>
										</tr>
									</thead>
									<tbody>
								<?php foreach ($rs as $line){?>
									<tr>
											<td>
												<FORM action="" method="post">
													<INPUT type="hidden" name="mail"
														value="<?php echo $line[0];?>">
													<INPUT type="submit" value="<?php echo $line[1];?>"
														class="btn btn-link">
												</FORM>
											</td>
											<td><?php echo $line[2];?></td>
											<td><?php echo $line[3];?></td>
											<td>
												<FORM action="" method="post">
													<INPUT type="hidden" name="id"
														value="<?php echo $line[0];?>">
													<INPUT type="submit" name="delete" value="Supprimer"
														class="btn btn-danger">
												</FORM>
											</td>
										</tr>
								<?php }?>
								</tbody>

								</table>
								<ul class="pagination pagination-sm">
									
              <?php
												$rs = $db->doQuery ( 'select ceil(count(*) / 10 ) from t_private_mail' );
												$n = 0;
												foreach ( $rs as $line )
													$n = $line [0];
												for($i = 1; $i < $n + 1; $i ++) {
													?>
              	<li class="">
										<a onclick="document.page<?php echo $i;?>.submit();"><?php echo $i;?></a>
              	<FORM name="page<?php echo $i;?>" action="" method="post">
												<INPUT type="hidden" name="page" value="<?php echo $i;?>">

											</FORM>
										

									</li>
              <?php } ?>
               
								</ul>
							</div>

						</div>
					</div>

<?php }else{?>
				
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
						</div>
              <?php
												
												if (isset ( $_POST ['mail'] )) {
													$rs = $db->doQuery ( 'select * from t_private_mail WHERE c_id=' . $_POST ['mail'] );
													$html = "";
													$line = $rs [0];
													$html .= 'Expediteur :' . $line [1];
													$html .= 'Sujet      :' . $line [2];
													$html .= 'Date       :' . $line [3];
													$html .= '<br>' . $line [4];
													
													?>
              <div class="panel-body">
							<div class="table-responsive">

								<FORM action="inbox.php" method="post">
									<DIV class="row">
										<DIV class="col-lg-3">
											<INPUT type="text" readonly="readonly"
												value="Expediteur : <?php echo $line [1];?>"
												class="form-control">
										</DIV>
										<DIV class="col-lg-3">
											<INPUT type="text" readonly="readonly"
												value="Sujet : <?php echo $line [2];?>" class="form-control">
										</DIV>
										<DIV class="col-lg-3">
											<INPUT type="text" readonly="readonly"
												value="Date : <?php echo $line [3];?>" class="form-control">
										</DIV>
										<DIV class="col-lg-3">
											<INPUT type="submit" value="Supprimer" class="btn btn-danger"
												name="delete">
										</DIV>
									</div>
							<INPUT type="hidden" name="id" value="<?php echo $line [0];?>">
							</FORM>
							</DIV>
							
							<BR>
							<TEXTAREA contenteditable="false" wrap="soft" 
								rows="20" id="myeditor" class="myeditor" name="editor"
								disabled="disabled"><?php echo $line [4];?></TEXTAREA>
						</div>
						<SCRIPT type="text/javascript">
 CKEDITOR.replace( 'myeditor');
 CKEDITOR.config.toolbar=[ ['Image','Table','HorizontalRule','SpecialChar'], '/', ['Format','Templates','Bold','Italic','Underline','-','Superscript','-',['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],'-','NumberedList','BulletedList','-','Outdent','Indent'] ];
 
  </SCRIPT>
					</div>
			<?php } }?>
            </div>

			</div>
<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	

</body>
</html>