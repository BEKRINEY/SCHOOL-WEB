<?php header('Content-type: text/html; charset=iso-8859-1');?>
<!-- debut de header -->
<?php 
include('include/header.php');
//include 'admin/includes/session.php';
include 'admin/lib/Database.Pdo.class.php';
//include 'admin/includes/head.php';

?>
<?php 
		$pro = $_GET ['pro']; 
		
		
		?>
		<?php
//$query = mysql_query("SET NAMES 'utf8'");

		$db=new database();
			$rs=null;
	$rs = $db->doQuery ( 'SELECT c_id, c_sender, date(c_date), c_titre, c_body, c_body2, c_file, c_ressources FROM t_messages where c_id='.$pro );
							// echo $line[2];
?>
 <!-- fin de header -->    
 <?php foreach ( $rs as $line ) ?>
    <div id="templatemo_main">
    	<div id="templatemo_content">
    	
            <div class="post_box">
                <div class="post_header">
                  <div class="post_date">
                  <span><?php  echo $line[2];//date?></span>
                    </div>
                    <h2><?php  echo $line[3];//titre?></h2>
                </div>
                <div class="post_inner"> <a href="#"><img src="<?php  echo $line[4];//Image Url?>" height="300" width="600" alt="Image" /></a>
                    <p class="post_meta"><?php  echo $line[7];//ressurs?></p>
                    <p align="justify"><?php  echo $line[5]; /// text?></p>
					<p align="justify"><a href="http://localhost/PFEPHP<?php  echo $line[6]; //Fille?>"> Doc</a></p>
</div>
			</div> <!-- end of post -->
            <?php ?>
            <div class="cleaner h30"></div>
                        <h3> شارك </h3>
                        
      
      

	  <div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="http://fpotve.tk/news.php?actualite=<?php echo $line[0];?>"data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>	  

      <div id="comments">

        <h3>تعليقك </h3>

		<div id="fb-root"></div>

<script>

(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="http://fpotve.tk/news.php?actualite=<?php echo $line[0];?>" data-numposts="5"></div>   
                    
                </div>
                
                <div class="cleaner h20"></div>
                
                
                
		</div> <!-- end of content -->
       
        <div id="templatemo_sidebar">
				
           	<div class="sb_box">
            	<h3>للنشر في الموقع</h3>
                <ul class="recent_post">
                	<li><a href="#">ونود أن نخبر جميع المهتمين أننا نرحب بالمقالات والمساهمات التي ترد إلينا من زوار الموقع وأعضائه وفق الشروط التالية :</li>
                    <li><a href="#">- إرسال المقالات في صيغة  Word إلى العنوان البريدي</li>
                     <li><a href="#">يمتنع الموقع عن نشر مساهمات أي شخص اكتشف أنه ينشر مقالات لآخرين وينسبها لنفسه أو سبق ونشرت باسم شخص آخر مسبقا. </li>
                    <li><a href="#">تعطى الأسبقية للمواد الخاصة والتي يُجرى نشرها لأول مرة والموقعة بأسماء أصحابها الصريحة. </li>
				</ul>
            </div>
            <div class="sb_box">
            
				<h3><a href="#"  class="project_big" rel="nofollow" target="_blank">مواقع تهمك</a></h3>
                  <ul class="tmo_list">
                	<li><a href="http://www.men.gov.ma/default.aspx">وزارة التربية الوطنية </a></li>
                    <li><a href="http://www.arefsmd.gov.ma">الأكاديمية الجهوية للتربية والتكوين لجهة الرباط سلا القنيطرة</a></li>
                    <li><a href="http://www.almanara.ma">المنارة - توجيه</a></li>
                   
                    
				</ul>
			</div>
			<div class="sb_box">
							<h3>Meteo</h3>
			  <!-- widget meteo -->
<div id="widget_b813c78da6896e9941382deaf3a2088e">
<span id="t_b813c78da6896e9941382deaf3a2088e">Météo Rabat-sal&eacute;</span>
<span id="l_b813c78da6896e9941382deaf3a2088e"><a href="http://www.my-meteo.fr/previsions+meteo+maroc/rabat+sale.html">www.my-meteo.fr</a></span>
<script type="text/javascript">
(function() {
  var my = document.createElement("script"); my.type = "text/javascript"; my.async = true;
  my.src = "http://services.my-meteo.fr/widget/js3.php?ville=331&format=vertical&nb_jours=3&temps&icones&vent&c1=393939&c2=a9a9a9&c3=e6e6e6&c4=ffffff&c5=00d2ff&c6=d21515&police=0&t_icones=1&x=160&y=321&id=b813c78da6896e9941382deaf3a2088e";
  var z = document.getElementsByTagName("script")[0]; z.parentNode.insertBefore(my, z);
})();
</script>

</div>
<!-- widget meteo -->
            </div>
        </div>  <!-- end of sidebar -->
        <div class="cleaner"></div>
    </div>
    
    <div class="cleaner"></div>
</div>
<!-- debut de footer -->
<?php 
include('include/footer.php');
?>
 <!-- fin de footer -->