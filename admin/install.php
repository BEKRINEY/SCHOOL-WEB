<?php session_start();
$db='';
$dbuser='';
$dbpass='';
$nom='';
$prenom='';
$adress='';
$tel='';
$host='';
$date='';
$port='';
$user='';
if(isset($_SESSION['code'])){
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$adress=$_SESSION['adress'];
	$tel=$_SESSION['tel'];
	$date=$_SESSION['date'];
	$user=$_SESSION['code'];
}
if(isset($_SESSION['host'])){
$host=$_SESSION['host'];
$dbuser=$_SESSION['dbuser'];
$dbpass=$_SESSION['dbpass'];
$db=$_SESSION['db'];
$port=$_SESSION['port'];

}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
    <?php header('Content-type: text/html; charset=iso-8859-1');?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <SCRIPT type="text/javascript" src="ckeditor/ckeditor.js"></SCRIPT>
  </head>
  <body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">Instalation</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li <?php if (empty($_POST) or isset($_GET['step1'])) echo 'class="active"'; ?>><a href="install.php?step1"> <i class="fa fa-dashboard"></i>Debut
					</a></li>
					<li <?php if (isset($_POST['init'])or isset($_GET['step2'])) echo 'class="active"'; ?>><a href="install.php?step2"> <i class="fa fa-bar-chart-o"></i> Administrateur
					</a></li>
					<li <?php if (isset($_POST['admin']) or isset($_GET['step3'])) echo 'class="active"'; ?>><a href="install.php?step3"> <i class="fa fa-table"></i> Base de donnee
					</a></li>
					<li <?php if (isset($_POST['finish'])or isset($_GET['step4'])) echo 'class="active"'; ?>><a href="install.php?step4"> <i class="fa fa-table"></i> Fin
					</a></li>
				</ul>

			</div>
			<!-- /.navbar-collapse -->
		</nav>
		<div id="page-wrapper">
			<div class="row">
				<DIV class="col-lg-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-bar-chart-o"></i>
							</h3>
						</div>
						<div class="panel-body">
							<?php if(isset($_POST['finish']) or isset($_GET['step4'])){
								if(isset($_POST['finish'])){
							$_SESSION['dbuser']=$_POST['dbuser'];
								$_SESSION['dbpass']=$_POST['dbpass'];
								$_SESSION['port']=$_POST['port'];
								$_SESSION['db']=$_POST['db'];
								$_SESSION['host']=$_POST['host'];
								}
								$config = file_get_contents('lib/Database.Pdo.php');
								$config=preg_replace('/{host}/', $_SESSION['host'], $config) ;
								$config=preg_replace('/{port}/', $_SESSION['port'], $config) ;
								$config=preg_replace('/{db}/', $_SESSION['db'], $config) ;
								$config=preg_replace('/{user}/', $_SESSION['dbuser'], $config) ;
								file_put_contents('lib/Database.Pdo.class.php',preg_replace('/{pass}/', $_SESSION['dbpass'], $config) );
								$config1 = file_get_contents('lib/Config.txt');
								$config1=preg_replace('/{host}/', $_SESSION['host'], $config1) ;
								$config1=preg_replace('/{port}/', $_SESSION['port'], $config1) ;
								$config1=preg_replace('/{db}/', $_SESSION['db'], $config1) ;
								$config1=preg_replace('/{user}/', $_SESSION['dbuser'], $config1) ;
								file_put_contents('Config.txt',preg_replace('/{pass}/', $_SESSION['dbpass'], $config1) );
								?>
								<?php 
	include 'lib/Database.Pdo.class.php';
	include 'lib/db.php';
	try {
		$db=new database();
		//$db->doNonQuery('CREATE DATABASE IF NOT EXISTS '.$_SESSION['db'].' DEFAULT CHARACTER SET utf8');
		foreach ($schema as $alias=>$table){
	$db->doNonQuery($table);
	?>
			<p>Table <?php echo $alias;?><i class="text-success">&emsp; Cree Avec Success</i></p>
			<?php 
}
$db->doNonQuery ('DELETE FROM t_group');
$db->doNonQuery ( 'INSERT INTO t_group(c_id,c_group)VALUES(1,\'ADMIN\')');
$db->doNonQuery ( 'INSERT INTO t_group(c_id,c_group)VALUES(2,\'GS\')');
$db->doNonQuery ( 'INSERT INTO t_group(c_id,c_group)VALUES(3,\'TEACHER\')');
$db->doNonQuery ( 'INSERT INTO t_group(c_id,c_group)VALUES(4,\'STUDENT\')');
$db->doNonQuery ( 'INSERT INTO t_teacher (c_first_name,c_last_name,c_pptr,c_date,c_tel,c_adress) VALUES (?,?,?,?,?,?);', array (
		'sssssss',
		$_SESSION ['nom'],
		$_SESSION ['prenom'],
		$_SESSION ['code'],
		$_SESSION ['date'],
		$_SESSION ['tel'],
		$_SESSION ['adress']
) );
$db->doNonQuery ( 'INSERT INTO t_user(c_username,c_password,c_group) VALUES (?,?,?);', array (
		'sssssss',
		$_SESSION ['code'],
		$_SESSION['pass'],
		2
) );
?>
				<div class="well well-lg-6">
						<p class="text-success"></p>
						<form action="index.php" method="get">
							<input type="submit" name="step3" value="Demarer" class="btn btn-success btn-lg">
						</form>
					</div>
				<?php 
	} catch (Exception $e) {
		?>
		<div class="well well-lg-6">
				<p class="text-danger"><?php echo $e->getMessage();?></p>
				<form action="install.php" method="get">
					<input type="submit" name="step3" value="Retour" class="btn btn-danger btn-lg">
				</form>
			</div>
		<?php 
	}
	
	$rs=null;
?>
								<form action="" method="post">
								<div class="row">
									<div class="col-lg-12">
									<div class="progress progress-striped active">
								<div class="progress-bar" style="width: 100%"></div>
							</div>
									</div>	
								</div>
							</form>
							<?php }elseif(isset($_POST['init']) or isset($_GET['step2'])){
								
							?>
							<form action="" method="post">
								<fieldset>
									<legend>Administrateur</legend>
									<div class="row">
										<div class="col-lg-6">

											<label>Nom :</label> <input type="text" name="nom" value="<?php echo $nom;?>"
												required="required" class="form-control"><br> 
											<label>Adress :</label>
											<input type="text" value="<?php echo $adress;?>" name="adress" required="required"
												class="form-control"><br> 
											<label>Telephone</label> <input
												type="tel" value="<?php echo $tel;?>" name="tel" required="required" class="form-control"><br>
										</div>
										<div class="col-lg-6">
											<label>Prenom</label> <input value="<?php echo $prenom;?>" type="text" name="prenom"
												required="required" class="form-control"><br> <label>Date de
												Naissance</label> <input value="<?php echo $date;?>" type="date" name="date"
												required="required" class="form-control"><br>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<label>Code Confidenntiel</label> <input value="<?php echo $user;?>"  type="text" name="code"
												required="required" class="form-control"><br>
										</div>
										<div class="col-lg-6">
											<label>Mot de Pass</label> <input type="password" name="pass"
												required="required" class="form-control"><br>
										</div>
									</div>
								</fieldset>
								<div class="row">
									<div class="col-lg-6">
									<a href="install.php?step1"><input type="button" name="step1" value="Precedent" class="form-control"><br></a>
									</div>
									<div class="col-lg-6">
									<input type="submit" name="admin" value="Suivant" class="form-control"><br>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
									<div class="progress progress-striped active">
								<div class="progress-bar" style="width: 60%"></div>
							</div>
									</div>	
								</div>
							</form>
							<?php }else if(isset($_POST['admin']) or isset($_GET['step3'])){
								if(isset($_POST['admin'])){
								$_SESSION['nom']=$_POST['nom'];
								$_SESSION['prenom']=$_POST['prenom'];
								$_SESSION['adress']=$_POST['adress'];
								$_SESSION['tel']=$_POST['tel'];
								$_SESSION['date']=$_POST['date'];
								$_SESSION['code']=$_POST['code'];
								$_SESSION['pass']=$_POST['pass'];
								}
								?>
								<form action="" method="post" >
								<fieldset>
									<legend>Base De donnee</legend>
									<div class="row">
										<div class="col-lg-6">

											<label>Hot :</label> <input type="text" name="host" value="<?php echo $host;?>"
												required="required" class="form-control"><br> 
											<label>Base de Donne</label> <input value="<?php echo $db;?>"
												type="tel" name="db" required="required" class="form-control"><br>
										</div>
										<div class="col-lg-6">
											<label>Port</label> <input type="text" name="port" placeholder="3306" value="<?php echo $port;?>"
												required="required" class="form-control"><br> 
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<label>Utilisateur</label> <input type="text" name="dbuser" value="<?php echo $dbuser;?>"
												required="required" class="form-control"><br>
										</div>
										<div class="col-lg-6">
											<label>Mot de Pass</label> <input type="password" name="dbpass" value="<?php echo $dbpass;?>"
												 class="form-control"><br>
										</div>
									</div>
								</fieldset>
								<div class="row">
									<div class="col-lg-6">
									<a href="install.php?step2"><input type="button" name="step1" value="Precedent" class="form-control"><br></a>
									</div>
									<div class="col-lg-6">
									<input type="submit" name="finish" value="Suivant" class="form-control"><br>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
									<div class="progress progress-striped active">
								<div class="progress-bar" style="width: 90%"></div>
							</div>
									</div>	
								</div>
							</form>
							<?php }else {?>
							<form action="" method="post">
									<div class="row">
									<div class="col-lg-12">
									<H1 class="text-info">PHP : <i class="text-success"><?php echo ' '. PHP_VERSION;?></i></h1>
            <?php $val=false;
             foreach (pdo::getAvailableDrivers() as $key=>$driver){?>
            <?php if($driver=='mysql'){
            	?>
            	 <h1 class="text-info"> PDO : <i class="text-success">Active</i></h1> 
            	<?php
            }
			}
            ?>
            <?php 
            echo $_SERVER['SERVER_SOFTWARE'];
            echo $_SERVER['SERVER_ADDR'];
            echo $_SERVER['SERVER_NAME'];
             ?>
									</div>
								</div>
								
									<div class="row">
									<div class="col-lg-12">
										<input type="submit" name="init" value="Suivant" class="form-control"><br>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
									<div class="progress progress-striped active">
								<div class="progress-bar" style="width: 30%"></div>
							</div>
									</div>	
								</div>
							</form>
							<?php }?>
						</DIV>
					</DIV>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->
	</div>
	<!-- /#wrapper -->
</body>
</html>