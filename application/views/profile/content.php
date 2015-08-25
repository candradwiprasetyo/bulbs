
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
                                  	<!--<div class="profile_nav"><?= $data['nav'] ?></div>-->
                                  </div>
                             </div>
                        </div>
                  </div>
                  
                <div class="col-md-4">
                  
                       <div class="form-group">
                             <div class="col-md-12" >
                             	<div class="row">
                                   
                                   <?php
                                    $img_class_profile = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$data_creatives['creative_img']);
								   ?>
                                   <div class="box-showcase_profile">
                                        <div class="box-showcaseInnerProfile">
                                            <img src="<?= base_url(); ?>assets/images/profile/<?= $data_creatives['creative_img'] ?>" class="<?= $img_class_profile ?>">
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                       
                        <div class="form-group">
                        	
                                 <div class="col-md-12" >
                                     <div class="row">
                                           <a href="<?= site_url('profile/edit'); ?>" style="text-decoration:none;"><div class="button_creatives">EDIT PROFILE</div></a>
                                     </div>
                                 </div>
                                
                         </div>
                         
                  </div>
                  
                <div class="col-md-8">
                   
                   		<div class="form-group">
                             <div class="col-md-12" >
                             	
                                   <div class="profile_name"><?= $data_creatives['creative_wp_name']?></div>
                                   <div class="profile_location"><?= $data_creatives['location_name']?></div>
                                   <div class="profile_description_title">Description</div>
                                   <div class="profile_description_content">
                                   		<?= $data_creatives['creative_wp_description']?>
                                   </div>
                                   <!--<div class="profile_readmore">Read More</div>-->
                                   
                                   <br />
                               
                             </div>
                        </div>
                   
                   </div>
    
        	</div>
        </div>
        
        <div class="profile_left_color2">
        	<div class="profile_left_content">
        		
             
      			<div class="form-group">
                             <div class="col-md-12" >
                             	
                                <div class="row">
                                 <div class="col-md-6" >
                                   <div class="profile_name">Projects</div>
                                  </div> 
                                  
                                  <div class="col-md-6" style="text-align:right;">
                                   <a href="<?= site_url('project/add'); ?>" class="btn btn-primary">Add New</a>
                                  </div> 
                                  </div>
                                  
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
				
				 
					   $img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
					   
                ?>
                <a href="<?=site_url('project/view/'.$r_p['project_id'])?>">
                    <div class="box-showcase2">
                        <div class="box-showcaseInner">
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="<?= $img_class?>" />
                            <div class="titlebox-showcase"><?= $r_p['project_name'] ?></div>
                        </div>
                        <div class="box-showcaseDesc">
                             <div class="box-showcaseDesc_name"><?= $r_p['project_name'] ?></div>
                            <div class="box-showcaseDesc_by"><?= $r_p['creative_wp_name'] ?></div>
                        </div>
                    </div>
                    </a>
                <?php
                }
                ?>  
            
            </div>
           
            <div style="clear:both;"></div>
            <br />
                
        	</div>
        </div>
        
        </div>
	</div>
    
     <div class="col-md-3">
    	<div class="profile_right">
        
        <div class="form-group" style="margin-bottom:50px;">
        	<div class="row">
                <div class="col-md-12" >
                	<?php if($data_creatives['creative_facebook']){ ?>
                    <a href="<?= $data_creatives['creative_facebook'] ?>" style="padding-right:0px;">
                    <div class="circle_navbar" style="margin-right:10px;">FB</div>
                    </a>
                    <? } ?>
                    <?php if($data_creatives['creative_twitter']){ ?>
                    <a href="<?= $data_creatives['creative_twitter'] ?>" style="padding-right:0px;">
                    <div class="circle_navbar" style="margin-right:10px;">TW</div>
                    </a>
                    <? } ?>
                     <?php if($data_creatives['creative_instagram']){ ?>
                    <a href="<?= $data_creatives['creative_instagram'] ?>" style="padding-right:0px;">
                    <div class="circle_navbar" style="margin-right:10px;">IG</div>
                    </a>
                    <? } ?>
                     <?php if($data_creatives['creative_rss']){ ?>
                    <a href="<?= $data_creatives['creative_rss'] ?>" style="padding-right:0px;">
                    <div class="circle_navbar" style="margin-right:10px;">RSS</div>
                    </a>
                    <? } ?>
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
                    <span class="blue_text"><?= $data_creatives['creative_website']?></span>
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
                    <span class="blue_text"><?= $data_creatives['creative_phone']?></span>
                 </div>
             </div>
        </div>
        
         
        
        
            
        </div>
	</div>    	
</div>