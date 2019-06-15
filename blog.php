
<!-- ouverture de la connexion  -->
<?php
//include 'admin/includes/session.php';
include 'admin/lib/Database.Pdo.class.php';
//include 'admin/includes/head.php';
include('include/header.php');
$db=new Database();
?>

     <?php
					//include 'admin/includes/sidebar.php';
					?>
<?php
//$query = mysql_query("SET NAMES 'utf8'");

		
	$rs = $db->doQuery ( 'SELECT c_id, c_sender, date(c_date), c_titre, c_body, SUBSTRING(c_body2,1,1922), c_file, c_ressources FROM t_messages ORDER BY c_id desc' );
							
							// echo $line[2];
?>
   
    <div id="templatemo_main">
  
		
        
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
        </div> <!-- end of sidebar -->
        <div id="templatemo_content">
		    
  	      <div class="post_box">
		  	            <?php
foreach ( $rs as $line ) {
?>
			<div class="post_header">
				
                    <div class="post_date">
                  <span><?php  echo $line[2];//date?></span>
                    </div>
                    <h2><a href="blog_post.php?pro=<?php echo $line[0];?>" dir="rtl"><font size="6"><?php  echo $line[3];//titre?></font></a></h2>
                </div>
                <div class="post_inner"> <a href="#">
				<img src="<?php echo $line[4];//img?>"  alt="New Year" width="530" height="300"/></a>
                  <p class="post_meta"><span class="cat"><?php  echo $line[7];//t1?></p>
                    <p><?php  echo $line[5];//t1?></p>
                    <p></p>
                    <div class="h30"></div>
                 <a href="blog_post.php?pro=<?php echo $line[0];?>" class="more float_r"></a>
				 
                  <div class="cleaner"></div>
                </div>
              <?php } ?>
			</div>
          
		</div> <!-- end of content -->
        <div class="cleaner"></div>
    </div>
    
    <div class="cleaner"></div>
</div>
<!-- debut de footer -->
<?php 
include('include/footer.php');
?>
 <!-- fin de footer -->