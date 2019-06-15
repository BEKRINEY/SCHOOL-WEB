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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 id="container">bienvenu dans l'espece web Platform</h1>
                        </div>
                        <div class="bs-example">
                            <div class="jumbotron">
                                <h1></h1>
                                <center>
                                <p>
                                    <a class="btn btn-primary btn-lg"><?php
                                        $timezone = date_default_timezone_get();

// Change the line below to your timezone!
                                        date_default_timezone_set($timezone);
                                        echo date('m/d/Y h:i:s a', time());
                                        ?></a>
                                </p>
                                
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="images/bg.jpg" alt="..." width="1000px" height="250px">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"></h4>
                                    </div>
                                </div>
</center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
    </body>
</html>
