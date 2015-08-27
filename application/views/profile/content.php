<?php 
	if(isset($_GET['did']) && $_GET['did']==1){
		echo $this->access->get_alert_success("You are logged in"); 
	}else if(isset($_GET['did']) && $_GET['did']==2){
		echo $this->access->get_alert_success("Your profile has been saved"); 
	}else if(isset($_GET['did']) && $_GET['did']==3){
		echo $this->access->get_alert_success("Your account has been saved"); 
	}else if(isset($_GET['did']) && $_GET['did']==4){
		echo $this->access->get_alert_success("Your project has been updated"); 
	}
?>

<div class="col-md-9">
       	 	<div class="row">
                 <div class="navbar_category">
                 	<div class="container">
                    	<div class="navbar_category_menu">&nbsp;</div>
                        <div class="navbar_category_menu"><a href="<?=site_url('profile'); ?>">Profile</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('follower'); ?>">Followers</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('following'); ?>">Followings</a></div>
                     	<div class="navbar_category_menu"><a href="<?=site_url('project/add'); ?>">Upload Work</a></div>
                    </div>
                 </div>
             </div> 
        </div>
    
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
                        	
                                 <div class="col-md-6" >
                                     <div class="row">
                                           <a href="<?= site_url('profile/edit'); ?>" style="text-decoration:none;"><div class="button_creatives">EDIT PROFILE</div></a>
                                     </div>
                                 </div>
                                 
                                 <div class="col-md-6" >
                                     <div class="row">
                                           <a href="<?= site_url('account_regular'); ?>" style="text-decoration:none;"><div class="button_message">EDIT ACCOUNT</div></a>
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
                            
                        </div>
                        <div class="box-showcaseDesc">
                             <div class="box-showcaseDesc_name"><?= $r_p['project_name'] ?></div>
                             
                            <div class="box-showcaseDesc_by"><?= $r_p['creative_wp_name'] ?></div>
                            <div class="box-showcaseDesc_button"> 
                            	<a href="<?= site_url('project/form_edit/'.$r_p['project_id']); ?>" class="btn btn-info"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
                            </div>
                            
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
                    <div class="circle_navbar" style="margin-right:10px;"><i class="fa fa-facebook"></i></div>
                    </a>
                    <? } ?>
                    <?php if($data_creatives['creative_twitter']){ ?>
                    <a href="<?= $data_creatives['creative_twitter'] ?>" style="padding-right:0px;">
                    <div class="circle_navbar" style="margin-right:10px;"><i class="fa fa-twitter"></i></div>
                    </a>
                    <? } ?>
                     <?php if($data_creatives['creative_instagram']){ ?>
                    <a href="<?= $data_creatives['creative_instagram'] ?>" style="padding-right:0px;">
                    <div class="circle_navbar" style="margin-right:10px;"><i class="fa fa-instagram"></i></div>
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
                    <?php
					$q_rating = mysql_query("select sum(pr_rating) / count(pr_rating) as rata from profile_reviews where user_creative_id = '".$data_creatives['user_id']."'");
					$r_rating = mysql_fetch_array($q_rating);
					
					$rata = floor($r_rating['rata']);
					
					$selish = 5 - $rata;
					for($i=1; $i<=$rata; $i++){
					?>
                    <i class="fa fa-star" style="color:#477CBD; font-size:24px;"></i>
                    <?php
					}
					for($is=1; $is<=$selish; $is++){
					?>
                    <i class="fa fa-star" style="color:#ccc; font-size:24px;"></i>
                    <?php
					}
					?>                    
                    <div style="margin-top:5px; float:right"><?= $rata; ?> / 5 Stars</div>
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                   
                 </div>
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Statistics</strong></div>
                    
                    <div class="row">
                		<div class="col-md-6" >
                        	<?= $data_creatives['follower'] ?> Followers
                        </div>
                        <div class="col-md-6" >
                        	<?= $data_creatives['following'] ?> Followings
                        </div>
                        <div class="col-md-6" >
                        	<?= $data_creatives['view'] ?>  views
                        </div>
                        <div class="col-md-6" >
                        	<?= $data_creatives['like'] ?> likes
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
                     <?php
                            $color = array('#d05a51', '#92a495', '#3a58db', '#f1c40f', '#d35400', '#27ae60', '#8e44ad');
							$q_pc = mysql_query("select b.pc_name 
												from profile_detail_categories a
												join profile_categories b on b.pc_id = a.pc_id
												where user_id = '".$data_creatives['user_id']."'
												order by a.pc_id 
												");
							while($r_pc = mysql_fetch_array($q_pc)){
							?>
                                <div>
                                    <div class="circle_project" style="background-color:<?= $color[rand(0,6)] ?>"></div><?= $r_pc['pc_name'] ?>
                                </div>
                               <?php
							}
							   ?>
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
                    <?= $data_creatives['creative_website']?>
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
                    <?= $data_creatives['creative_phone']?>
                 </div>
             </div>
        </div>
        
         
        
        
            
        </div>
	</div>    	
</div>