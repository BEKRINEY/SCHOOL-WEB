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
			
        
		<button data-toggle="modal" href="#infos" class="btn btn-primary">Informations</button>
<div class="modal" id="infos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h4 class="modal-title">Plus d'informations</h4>
      </div>
      <div class="modal-body">
        			<form action="" method="post">
        			
					</form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-info" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
  </body>
</html>