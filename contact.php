<!-- debut de header -->
<?php 
include('include/header.php');
?>
 <!-- fin de header -->    
    <div id="templatemo_main">
    	<h2>ركن التواصل</h2>
        <div class="col_w630 float_l">
        	
             <div id="contact_form">
        
                <h4>أرسل رسالة</h4>
                
                <form method="post" name="contact" action="#">
                    <input type="hidden" name="post" value="Send" />
                    <label for="author">الإسم :</label> <input type="text" id="author" name="author" class="input_field" />
                    <div class="cleaner h10"></div>
                    
                    <label for="email">البريد الإلكتروني :</label> <input type="text" id="email" name="email" class="validate-email input_field" />
                    <div class="cleaner h10"></div>
                    
                    <label for="text">الموضوع :</label> <textarea id="text" name="text" rows="0" cols="0"></textarea>
                    <div class="cleaner h10"></div>
                    
                    <input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Envoyer" />
                    <input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
                
                </form> <br /><br /><br /><br />
				<h4>Location</h4>
      <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:420px;width:780px;'><div id='gmap_canvas' style='height:420px;width:780px;'></div><div><small><a href="http://embedgooglemaps.com">                                    embed google maps                           </a></small></div><div><small><a href="http://freedirectorysubmissionsites.com/">free web directories</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(33.994093436310095,-6.825151668955982),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(33.994093436310095,-6.825151668955982)});infowindow = new google.maps.InfoWindow({content:'<strong>IBN BATTOUTA</strong><br>Rabat  mabilla<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            
       
            </div> 
        </div>
        
          <div class="col_w300 float_r">
            <div class="col_fw">	
            <h4>العنوان البريدي : </h4>
                <h6> الثانوية التأهيلية ابن بطوطة </h6>
                الرباط القنيطرة السلا،<br />
                شارع مابيلا اليوسفية دوار الحاجة<br />
                Fax : 0524-88-23-24<br />
                Tél. : 0524-88-63-91 <br />
            <br />
                Validate <a href="#" rel="nofollow">XHTML</a> &amp; <a href="#" rel="nofollow">CSS</a></div>            
            <div class="col_fw_last"><a href="mouassassa.php" rel="nofollow">
لقد أنشئت هذه المؤسسة خلال الموسم الدراسي 1994/ 1995<br />
                ويعمل بها حاليا طاقم إداري يتكون من ...<br /></a>
				</div>
        </div>
	    <div class="cleaner"></div>
    </div> <!-- end of main -->

</div>
<!-- debut de footer -->
<?php 
include('include/footer.php');
?>
 <!-- fin de footer -->