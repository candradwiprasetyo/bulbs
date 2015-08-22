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
      
            <div style="padding-right:10px;">
            <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									where c.user_id = '".$this->session->userdata('user_id')."' 
									
									order by project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
                ?>
                    <div class="box-showcase2">
                        <div class="box-showcaseInner">
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>.jpg" />
                            <div class="titlebox-showcase"><?= $r_p['project_name'] ?></div>
                        </div>
                        <div class="box-showcaseDesc">
                             <div class="box-showcaseDesc_name"><?= $r_p['project_description'] ?></div>
                            <div class="box-showcaseDesc_by"><?= $r_p['creative_wp_name'] ?></div>
                        </div>
                    </div>
                <?php
                }
                ?>  
            
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
                	<div ><strong>Phone</strong></div>
                    
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