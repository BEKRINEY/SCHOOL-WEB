<?php
if (isset ( $_SESSION ['SID'] ))
	header ( "location: home.php" );
else {
	?>
<!DOCTYPE html>
<html lang="fr">
	<?php
	$title = "index";
	include 'includes/head.php';
	?>
  <body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Web Patform</a>
			</div>
		</nav>

		

		<div id="page-wrapper">
			
			
			
			
			<div class="row">
				<DIV class="well well-lg-3">
					<form  method="post" action="login.php">
						<div class="row">
							
								<DIV class="col-lg-2">
									<span class="text-primary">Code Confidentiel</span>
								</DIV>
								<DIV class="col-lg-4">
									<input name="user" type="text" class="form-control"
										placeholder="Code Confidentiel">
								</DIV>
						</div>
						
					<BR>
						
						<div class="row">
							
								<DIV class="col-lg-2">
									<span class="text-primary">Code D'accee</span>
								</DIV>
								<DIV class="col-lg-4">
									<input name="pass" type="password" placeholder="Code D'accee"
										class="form-control">
								</DIV>
							
						</div>
					
					<LABEL>  <?php if (isset ( $_GET ['EREUR'] )) echo "<p class=text-danger>$_GET[EREUR]</p>"; ?> </LABEL>
					<DIV class="row">
					<DIV class="col-lg-2">
						<span class="text-primary"></span>
					</DIV>
					<DIV class="col-lg-4">
						<button type="submit" class="btn btn-default">Connexion</button>
					</DIV>
					</DIV>
				</form>
				</DIV>
			
			
			
			</div>
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
	<?php
}
?>	
</body>
</html>