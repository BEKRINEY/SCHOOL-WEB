  <link rel="stylesheet" href="css1/bootstrap.css" />
	<link rel="stylesheet" href="css1/bootstrap-responsive.css" />
	<link rel="stylesheet" href="css1/custom.css" />
<!-- debut de header -->
<?php 
include('include/header.php');
?>
 <!-- fin de header -->
  

    <div id="templatemo_main">
    	<h2>ألبوم الصور  <a class="project_big"  target="_blank"></a></h2>
            <p><em> </em></p>   
            
			
      <div class="cleaner h30"></div>
         	<div class="carousel slide" id="my-carousel">
			<ol class="carousel-indicators">
				<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#my-carousel" data-slide-to="1"></li>
				<li data-target="#my-carousel" data-slide-to="2"></li>
				<li data-target="#my-carousel" data-slide-to="3"></li>
			</ol>
		
			<div class="carousel-inner">
			
				<div class="item active">
					<img src="img/1.jpg" width="1003" height="555" alt="Demo" />
					<div class="carousel-caption">
						<h4>Youssef Bekrine</h4>
						<p>Some description.</p>
					</div>
				</div>
				<div class="item">
					<img src="img/5.jpg"  width="1003" height="555" alt="Demo" />
					<div class="carousel-caption">
						<h4>La porte du Lycéé</h4>
						<p>Some description.</p>
					</div>
				</div>
				<div class="item">
					<img src="img/9.jpg" width="1003" height="555" alt="Demo" />
				</div>
				<div class="item">
					<img src="img/7.jpg"  width="1003" height="555"alt="Demo" />
				</div>
			</div>
			
			<a href="#my-carousel"class="carousel-control right" data-slide="prev">&lsaquo;</a>
			<a href="#my-carousel" class="carousel-control left" data-slide="next">&rsaquo;</a>
		</div>
            
            </div>
            
            <div class="cleaner h30"></div>
            <div class="templatemo_paging">
            	
                <div class="cleaner"></div>
            </div>
    	<div class="cleaner"></div>
    </div> <!-- end of main -->
    
    <div class="cleaner"></div>
<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.js"></script>
<!-- debut de footer -->
<?php 
include('include/footer.php');
?>
 <!-- fin de footer -->