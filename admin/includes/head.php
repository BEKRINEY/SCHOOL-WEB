<?php 
	include 'lib/Database.Pdo.class.php';
	try {
		$db=new database();
	} catch (Exception $e) {
		?>
		<div class="well well-lg-6">
				<p class="text-danger"><?php echo $e->getMessage();?></p>
				<form action="addnew.php">
					<input type="submit" value="Retour" class="btn btn-danger btn-lg">
				</form>
			</div>
		<?php 
	}
	
	$rs=null;
?>
<head>
    <?php header('Content-type: text/html; charset=utf-8');?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title;?></title>
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