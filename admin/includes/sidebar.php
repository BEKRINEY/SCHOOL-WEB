
<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" >
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
			data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="home.php"><?php echo $_SESSION['owner'];?></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php
								
								if ($_SESSION ['TYPE'] == 'GS') {
									?>
          <ul class="nav navbar-nav side-nav">
			<li class="active">
				<a href="home.php">
					<i class="fa fa-dashboard"></i>
					Page d'accueil
				</a>
			</li>
			<li>
				<a href="statistiques.php">
					<i class="fa fa-bar-chart-o"></i>
					Statistiques
				</a>
			</li>
			
			<li>
				<a href="addnew.php">
					<i class="fa fa-table"></i>
					Annonce
				</a>
			</li>
			<li>
				<a href="teacher.php">
					<i class="fa fa-wrench"></i>
					Cadres
				</a>
			</li>
			<li>
				<a href="classes.php" >
					<i class="fa fa-file"></i>
					Classes
				</a>
			</li>
			<!--<li>
				<a href="applet.php">
					<i class="fa fa-file"></i>
					Applet
				</a>
			</li>-->
			<li>
				<a href="administration.php">
					<i class="fa fa-file"></i>
					Services
				</a>
			</li>
		</ul>
		
		<?php
								} else if ($_SESSION ['TYPE'] == 'STUDENT') {
									?>
          <ul class="nav navbar-nav side-nav">
			<li>
				<a href="notes.php">
					<i class="fa fa-table"></i>
					Notes et Assiduité
				</a>
			</li>
			<li>
				<a href="mail.php">
					<i class="fa fa-table"></i>
					Message privé
				</a>
			</li>
		</ul>
 		<?php
								} else if ($_SESSION ['TYPE'] == 'TEACHER') {
									?>
          <ul class="nav navbar-nav side-nav">
			<li>
				<a href="addnew.php">
					<i class="fa fa-table"></i>
					Annonce
				</a>
			</li>
			<li>
				<a href="mail.php">
					<i class="fa fa-table"></i>
					Message privé
				</a>
			</li>
			<li>
				<a href="applet.php">
					<i class="fa fa-file"></i>
					Services
				</a>
			</li>
		</ul>
 		<?php
								} else if ($_SESSION ['TYPE'] == 'ADMIN') {
									?>
          <ul class="nav navbar-nav side-nav">
			<li>
				<a href="addnew.php">
					<i class="fa fa-table"></i>
					annonce
				</a>
			</li>
			<li>
				<a href="mail.php">
					<i class="fa fa-table"></i>
					Message privé
				</a>
			</li>
		</ul>
          <?php }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
          <?php
										
										if ($_SESSION ['TYPE'] == 'GS') {
											?>
            <li class="dropdown messages-dropdown">
				<a href="inbox.php" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-envelope"></i>
					Messages
					<span class="badge"></span>
					<b class="caret"></b>
				</a>
				<?php ?>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Messages</li>
					<?php
											$rs = $db->doQuery( 'SELECT * FROM t_private_mail limit 3' );
											foreach ( $rs as $line ) {
											?>
					<li class="message-preview">
						<a href="inbox.php?mail=<?php echo $line[0];?>">
							<span class="avatar">
								<img src="http://placehold.it/50x50">
							</span>
							<span class="name"><?php echo $line[1];?></span>
							<span class="message"><?php echo $line[2];?></span>
							<span class="time">
								<i class="fa fa-clock-o"></i>
								<?php echo $line[3];?>
							</span>
						</a>
					</li>
					<li class="divider"></li>
					<?php }
											?>
					<li>
						<a href="inbox.php">
							Boite de Reception
							<span class="badge">
								<i class="fa fa-envelope"></i>
							</span>
						</a>
					</li>
				</ul>
			</li>
            <?php }?>
            <li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-user"></i> <?php echo $_SESSION['FULLNAME']?> <b
						class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="profile.php">
							<i class="fa fa-user"></i>
							Profile
						</a>
					</li>
                <?php
																
if ($_SESSION ['TYPE'] == 'GS') {
																	?>
                <li>
						<a href="inbox.php">
							<i class="fa fa-envelope"></i>
							Boite de Reception
							<span class="badge"></span>
						</a>
					</li>
                <?php }?>
                <li>
						<a href="setting.php">
							<i class="fa fa-gear"></i>
							Paramétres
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="logout.php">
							<i class="fa fa-power-off"></i>
							Se Déconnecter
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>
<?php 
/*

<li>
				<a href="tables.php">
					<i class="fa fa-table"></i>
					Tables
				</a>
			</li>
			<li>
				<a href="forms.php">
					<i class="fa fa-edit"></i>
					Forms
				</a>
			</li>
			<li>
				<a href="typography.php">
					<i class="fa fa-font"></i>
					Typography
				</a>
			</li>
			<li>
				<a href="bootstrap-elements.php">
					<i class="fa fa-desktop"></i>
					Bootstrap Elements
				</a>
			</li>
			<li>
				<a href="bootstrap-grid.php">
					<i class="fa fa-wrench"></i>
					Bootstrap Grid
				</a>
			</li>
*/
/*
 * 			<li class="dropdown alerts-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bell"></i>
					Alerts
					<span class="badge">3</span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="#">
							Default
							<span class="label label-default">Default</span>
						</a>
					</li>
					<li>
						<a href="#">
							Primary
							<span class="label label-primary">Primary</span>
						</a>
					</li>
					<li>
						<a href="#">
							Success
							<span class="label label-success">Success</span>
						</a>
					</li>
					<li>
						<a href="#">
							Info
							<span class="label label-info">Info</span>
						</a>
					</li>
					<li>
						<a href="#">
							Warning
							<span class="label label-warning">Warning</span>
						</a>
					</li>
					<li>
						<a href="#">
							Danger
							<span class="label label-danger">Danger</span>
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">View All</a>
					</li>
				</ul>
			</li>

 * 
 * 
 * 
 * 
 */
?>
