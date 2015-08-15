<div class="profile_page">
<div class="row" style="margin-left:0px; margin-right:0px;">
    <div class="col-md-9" style="padding:0px; ">
    	<div class="profile_left">
        <div class="profile_left_color1">
        	<div class="profile_left_content">
        		 <div class="col-md-12">
                       <div class="form-group">
                             <div class="col-md-12" >
                             	<div class="row">
                                  	<div class="profile_nav"> Explore -> Interior Design -> Aldo Felix Studio</div>
                                  </div>
                             </div>
                        </div>
                  </div>
                  
                <div class="col-md-4">
                  
                       <div class="form-group">
                             <div class="col-md-12" >
                             	<div class="row">
                                   <img src="<?= base_url(); ?>assets/images/profile_photo.jpg" class="profile_photo" />
                                </div>
                             </div>
                        </div>
                       
                        <div class="form-group">
                        	
                                 <div class="col-md-6" >
                                     <div class="row">
                                           <a href="#" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>
                                     </div>
                                 </div>
                                 <div class="col-md-6" >
                                 	<div class="row">
                                       <a href="#" style="text-decoration:none;"><div class="button_message">MESSAGE</div></a>
                                     </div>
                                 </div>
                         </div>
                         
                  </div>
                  
                <div class="col-md-8">
                   
                   		<div class="form-group">
                             <div class="col-md-12" >
                             	
                                   <div class="profile_name">Aldo Fellix Studio</div>
                                   <div class="profile_location">JAKARTA - INDONESIA</div>
                                   <div class="profile_description_title">Description</div>
                                   <div class="profile_description_content">
                                   		Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam
                                        volorrum vollam, nam id unturit, vid eatio. Lore milit voluptat arum
                                        re lam quate volum quiatis et arum harioreris a dolume remperi simet re,
                                        net lametur re mosandem int pro con eaquodipsus volor atum fuga. Otatet
                                        quaepel igentia nitas maionse quatqui ducidi doluptatio vel id etur maiores
                                        exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae
                                        nonse doloris moluptatus magnia delen pro con.
                                   </div>
                                   <div class="profile_readmore">Read More</div>
                                   
                                   
                               
                             </div>
                        </div>
                   
                   </div>
    
        	</div>
        </div>
        
        <div class="profile_left_color2">
        	<div class="profile_left_content">
        		
             
      			<div class="form-group">
                             <div class="col-md-12" >
                             	
                                   <div class="profile_name">Projects</div>
                                   
                             </div>
                        </div>
      
   
<div class="grid" style="text-align:left !important"> <div class="portfoliocontent">
				<?php
                for($i=1;$i<=12;$i++){
					$nama_por = array(
								'',
								'Amanah Fashion',
								'Amanah Fashion',
								'Elkabumi Caraka Daya',
								'Internet Taqwa',
								'POIN Online Purchase Order Inventory Online',
								'Sapar',
								'AIA Insurance',
								'Wimbi Store',
								'Daun Pandan Catering',
								'BPM',
								'Prima Mandiri Trans',
								'Agenda Kota'
								);
					$ket_por = array(
								'',
								'Online Store',
								'Online Store',
								'Company Profile',
								'Portal Website',
								'Purchase Order Inventory Online Purchase Order Inventory Online',
								'Portal Website',
								'Event Management',
								'Online Store',
								'Restaurant and Catering Website',
								'Portal Website',
								'Truck Management',
								'Portal Website'
								);
				?>
              	
				<figure class="effect-milo <?php if($i > 10){ echo " webdesign"; }else if($i > 5){ echo " webdevelopment"; }else{ echo " desktopapp"; }?>" style="width:30% !important">
				<a  class="fancybox" href="<?= base_url(); ?>assets/images/showcase/<?= $i ?>.jpg" data-fancybox-group="gallery"  title="Lorem ipsum dolor sit amet"><img src="<?= base_url(); ?>assets/images/showcase/<?= $i ?>.jpg" alt="img<?= $i ?>"/>
					<figcaption>
						
                        <div class="portofolio_putih">
                        <div class="portofolio_putih_title"><?= "Project Name Lorem Ipsum
Line 2 of Project Name" ?></div>
                       
                        
                        <div class="portofolio_kiri">by Designer Name</div>
                       
                       
						</div>
                        <span class="figure_date">13 Nov 2014</span>
						<p class="portofolio_icon">
                   
                        </p>
						
					</figcaption>	   
          	</a>
				</figure>           
                <?php
				}
			   ?>
			</div>
        </div>
            
        
           
            <div style="clear:both;"></div>
                
        	</div>
        </div>
        
        </div>
	</div>
    
     <div class="col-md-3">
    	<div class="profile_right">
        
        <div class="form-group" style="margin-bottom:50px;">
        	<div class="row">
                <div class="col-md-12" >
                    <a href="#" style="padding-right:0px;"><div class="circle_navbar" style="margin-right:10px;">FB</div></a>
                    <a href="#" style="padding-right:0px;"><div class="circle_navbar" style="margin-right:10px;">TW</div></a>
                    <a href="#" style="padding-right:0px;"><div class="circle_navbar" style="margin-right:10px;">IG</div></a>
                    <a href="#" style="padding-right:0px;"><div class="circle_navbar" style="margin-right:10px;">RSS</div></a>
                    <strong>SHARE</strong>
                </div>
            </div>
        </div>
        
       
        	
        
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>User Review</strong></div>
                    <div class="star_icon"></div>
                    <div class="star_icon"></div>
                    <div class="star_icon"></div>
                    <div class="star_icon"></div>
                    <div class="star_icon"></div>
                    <div style="margin-top:5px; float:right">5 / 5 Stars</div>
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                    <span class="blue_text">Write Review</span>
                 </div>
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Statistics</strong></div>
                    
                    <div class="row">
                		<div class="col-md-6" >
                        	265 Followers
                        </div>
                        <div class="col-md-6" >
                        	66 Followings
                        </div>
                        <div class="col-md-6" >
                        	512 views
                        </div>
                        <div class="col-md-6" >
                        	11 likes
                        </div>
                    </div>
                    
                 </div>
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Concentrations</strong></div>
                    
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                    <span>Interior Design, Architecture</span>
                 </div>
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Website</strong></div>
                    
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                    <span class="blue_text">Login to view</span>
                 </div>
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Phone to</strong></div>
                    
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                    <span class="blue_text">Login to view</span>
                 </div>
             </div>
        </div>
        
         
        
        
            
        </div>
	</div>    	
</div>