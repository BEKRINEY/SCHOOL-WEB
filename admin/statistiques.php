<?php 
	include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="fr">
 <?php
	$title = "Statistiques";
	include 'includes/head.php';
	?>
  <body>

    <div id="wrapper">

      <?php 
	include 'includes/sidebar.php';
	?>
	 <?php 
                 $rs= $db->doQuery('SELECT COUNT(*) FROM t_teacher');
                 $teacher=$rs[0][0];
                 $rs= $db->doQuery('SELECT COUNT(*) FROM t_student');
                 $student=$rs[0][0];
                  ?>
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h2>Statistiques</h2>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i></h3>
              </div>
              <div class="panel-body">
                <div class="flot-chart">
                    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Categorie');
        data.addColumn('number', 'Total');
        data.addRows([
          ['Cadres Administratifs', <?php echo $teacher; ?>],
          ['Etudiants',  <?php echo $student; ?>]
        ]);

        // Set chart options
        var options = {'title':'personne par fonction','is3D':true};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <div class="col-lg-6">
    <div id="chart_div"></div>
    </div>
    
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
             $rs= $db->doQuery('  SELECT COUNT(*), t_filiere.c_name FROM t_student JOIN t_class ON t_student.c_class = t_class.c_id JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id GROUP BY t_filiere.c_name');
              foreach ($rs as $line){?>
            <?php echo "[ \"$line[1]\" , $line[0] ],"; ?>
            <?php }?>
            [null,  null]
          ]);

          // Set chart options
          var options = {'title':'Etdiant Par filiere','is3D':true};

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('chart'));
          chart.draw(data, options);
        };
    </script>
    <div class="col-lg-6">
         <div id="chart"></div> 
            </div>
                <script type="text/javascript">
	  google.load('visualization', '1.0', {'packages':['corechart']});
	  google.setOnLoadCallback(draw1);
      function draw1() {
          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Etudiant');
          data.addColumn('number', 'Total');
          data.addRows([
             <?php
             $rs= $db->doQuery('SELECT SUM(c_total),CONCAT(c_first_name,\' \',c_last_name) ,CONCAT(t_class.c_niveau,t_filiere.c_name) FROM t_student JOIN t_absence ON t_student.c_id=t_absence.c_student JOIN t_class ON t_student.c_class = t_class.c_id JOIN t_filiere ON t_class.c_filiere = t_filiere.c_id GROUP BY c_first_name,c_last_name,CONCAT(t_class.c_niveau,t_filiere.c_name)  ORDER BY SUM(c_total) DESC LIMIT 10');
              foreach ($rs as $line){?>
            <?php echo "[ \"$line[1]\" , $line[0] ],"; ?>
            <?php }?>
            [null,  null]
          ]);

          // Set chart options
          var options = {'title':'','pieStartAngle': 180};

          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.BarChart(document.getElementById('chart1'));
          chart.draw(data, options);
        };
    </script>
    <div class="col-lg-6">
         <div id="chart1"></div> 
            </div>       
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
	<script src="js/flot/jquery.flot.js"></script>
	<script src="js/flot/jquery.flot.tooltip.min.js"></script>
	<script src="js/flot/jquery.flot.resize.js"></script>
	<script src="js/flot/jquery.flot.pie.js"></script>
	<script src="js/flot/chart-data-flot.js"></script>

  </body>
</html>
