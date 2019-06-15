<?php 
	include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
   <?php
		include 'includes/head.php';
		?>
  <body >

    <div id="wrapper">

     <?php 
	include 'includes/sidebar.php';
	if(!($_SESSION['TYPE']=='GS' || $_SESSION['TYPE']=='TEACHER')){
		header('location:home.php');
	}
	?>
      <div id="page-wrapper">
        <div  class="row">
          <div class="col-lg-12">
        <applet  archive="applets.jar" code="com.bts.applet.Applet.class" width="100%" height="600PX">
			<PARAM name="username" value="<?php echo $_SESSION['user'];?>">
		</applet>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
  </body>
</html>
