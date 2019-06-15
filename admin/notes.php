<?php
include 'includes/session.php';
if (! ($_SESSION ['TYPE'] == 'STUDENT')) {
	header ( 'location:home.php' );
}
?>
<!DOCTYPE html  >
<html lang="fr">
  <?php
		$title = "Notes";
		include 'includes/head.php';
		?>
  <body>

	<div id="wrapper">

<?php
include 'includes/sidebar.php';
?>
      <div id="page-wrapper">
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>

			<div class="row">
				<div class="col-lg-12">
					<h1>
						Notes
						<small>control continue</small>
					</h1>
					<div class="alert alert-info alert-dismissable">

						<button type="button" class="close" data-dismiss="alert"
							aria-hidden="true">&times;</button>
					</div>
				</div>
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-lg-6">
					<h2></h2>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
							<h2 class="panel-title">Notes</h2>

						</div>


						<div class="table-responsive">
							<table class="table table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th>
											Matiere
											<i class="fa fa-sort"></i>
										</th>
										<th>
											Note
											<i class="fa fa-sort"></i>
										</th>
										<th>
											Date
											<i class="fa fa-sort"></i>
										</th>
										<th>
											Appreciation
											<i class="fa fa-sort"></i>
										</th>
									</tr>
								</thead>
								<tbody>
                <?php
																$rs = $db->doQuery ( 'SELECT  c_name,   c_note, c_date,  (case when c_note<10 then \'Pas de Moyene\' when c_note<12 then \'Passable\' when c_note<14 then \'A Bien\'  when c_note<16 then \'Bien\' when c_note is null  then \'\' else \'Exelent\' end ) FROM   t_matiere JOIN  t_note ON  t_matiere.c_id = t_note.c_matiere WHERE c_student=' . $_SESSION ['SID'] );
																
																foreach ( $rs as $line ) {
																	?>
                  <tr>
										<td><?php echo $line[0]; ?></td>
										<td><?php echo $line[1]; ?></td>
										<td><?php echo $line[2]; ?></td>
										<td><?php echo $line[3]; ?></td>
									</tr>
                <?php }?>
                </tbody>
							</table>
						</div>
						<script type="text/javascript">
	  google.load('visualization', '1.0', {'packages':['corechart']});
	  google.setOnLoadCallback(draw1);
      function draw1() {
          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Filiere');
          data.addColumn('number', 'Total ');
          data.addRows([
             <?php
													$rs = $db->doQuery ( 'SELECT AVG(c_note) ,c_name FROM t_note JOIN t_matiere ON t_note.c_matiere=t_matiere.c_id WHERE c_student=' . $_SESSION ['SID'] . ' GROUP BY c_name' );
													foreach ( $rs as $line ) {
														?>
            <?php echo "[ \"$line[1]\" , $line[0] ],"; ?>
            <?php }?>
            [null,  null]
          ]);

          // Set chart options
          var options = {'title':'Absence ','is3D':true};

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('chart1'));
          chart.draw(data, options);
        };
    </script>
						<div id="chart1"></div>

					</div>


				</div>

				<div class="col-lg-6">
					<h2></h2>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
							<h2 class="panel-title">Assiduité
                                                        </h2>

						</div>
						 <?php
							$rs = $db->doQuery ( 'SELECT  sum(c_total), sum(c_total)-sum(c_just) , sum(c_just) FROM   t_absence WHERE c_student=' . $_SESSION ['SID'] );
							?>

						<div class="table-responsive">
							<table class="table table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th>
											Totale
											<i class="fa fa-sort"></i>
										</th>
										<th>
											Non Justifier
											<i class="fa fa-sort"></i>
										</th>
										<th>
											Justifier
											<i class="fa fa-sort"></i>
										</th>
									</tr>
								</thead>
								<tbody>
                <?php
																$t = 0;
																foreach ( $rs as $line ) {
																	$t = $line [0];
																	?>
                  <tr>
										<td><?php echo $line[0]; ?></td>
										<td><?php echo $line[1]; ?></td>
										<td><?php echo $line[2]; ?></td>
									</tr>
                <?php }?>
                </tbody>
							</table>
							<BR>
							<INPUT type="text" class="form-control" readonly="readonly"
								value="<?php echo 20-($t/4); ?>">
							<BR>
						</div>
						<script type="text/javascript" src="https://www.google.com/jsapi"></script>
						<script type="text/javascript">
	  google.load('visualization', '1.0', {'packages':['corechart']});
	  google.setOnLoadCallback(draw);
      function draw() {
          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Filiere');
          data.addColumn('number', 'Total ');
          data.addRows([
             <?php
													$rs = $db->doQuery ( 'SELECT concat(c_start,\'---->\',c_end) , c_total FROM t_absence WHERE c_student =' . $_SESSION ['SID'] . ' AND c_total>0 ORDER BY c_total DESC LIMIT 10' );
													foreach ( $rs as $line ) {
														?>
            <?php echo "[ \"$line[0]\" , $line[1] ],"; ?>
            <?php }?>
            [null,  null]
          ]);

          // Set chart options
          var options = {'title':'Absence ','is3D':true};

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('chart'));
          chart.draw(data, options);
        };
    </script>
						<div id="chart"></div>

					</div>
				</div>

			</div>
			<!-- /.row -->


			<DIV class="row">
				<div class="col-lg-12">
					<div class="bs-example">
						<ul class="nav nav-tabs" style="margin-bottom: 15px;">
							<li>
								<a href="#A" data-toggle="tab">Detail</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade" id="A">

								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">
											<i class="fa fa-bar-chart-o"></i>

										</h3>
									</div>
									<div class="panel-body">
										<div class="row">
											<div class="col-lg-12">
											<?php 
												$rs=$db->doQuery("SELECT * FROM t_absence WHERE c_student=? ORDER BY c_start DESC",array('i',$_SESSION ['SID']));
											?>
							<table class="table table-hover table-striped tablesorter">
								<thead>
									<tr>
										<th>
											Total
											
										</th>
										<th>
											Justifiee
											
										</th>
										<th>
											Non Justifiee
											
										</th>
										<th>
											
											
										</th>
									</tr>
								</thead>
								<tbody>
                <?php
																foreach ( $rs as $line ) {
																	?>
                  <tr>
										
										<td><?php echo $line[1]; ?></td>
										<td><?php echo $line[5]; ?></td>
										<td><?php echo $line[1]-$line[5]; ?></td>
										<td><?php echo $line[2]; ?></td>
										<td><?php echo $line[3]; ?></td>	
									</tr>
                <?php }?>
                </tbody>
							</table>
												<h1>
													
													<small></small>
												</h1>
												
											</div>
										</div>
										<!-- /.row -->


									</DIV>
								</DIV>
							</DIV>
						</div>
					</div>
				</div>
			</div>





		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->
	<!-- Page Specific Plugins -->
	<script src="js/tablesorter/jquery.tablesorter.js"></script>
	<script src="js/tablesorter/tables.js"></script>
</body>
</html>