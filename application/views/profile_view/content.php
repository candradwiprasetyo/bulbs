
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
                        	<?php
                       if($this->session->userdata('user_id')){
					   ?>
                                 <div class="col-md-6" >
                                     <div class="row">
                                     <?php
                                     $q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$data_creatives['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
										
									?> 
                                   
                                 
                                   <a href="<?=site_url('profile_view/unfollowing/'.$data_creatives['user_id']); ?>" style="text-decoration:none;"><div class="button_creatives" style="background:#C30;">UNFOLLOW</div></a>
                                <?php
								}else{
                                ?>
                                           <a href="<?=site_url('profile_view/following/'.$data_creatives['user_id']); ?>" style="text-decoration:none;"><div class="button_creatives"><i class="fa fa-plus"></i>&nbsp;FOLLOW</div></a>
                                      <?php
									}
									
									  ?>
                                     </div>
                                 </div>
                                 <div class="col-md-6" >
                                 	<div class="row">
                                       <a href="#" style="text-decoration:none;"><div class="button_message"><i class="fa fa-envelope"></i>&nbsp;MESSAGE</div></a>
                                     </div>
                                 </div>
                                  <?php
					   }else{
						   ?>
						    <div class="col-md-6" >
                                 	<div class="row">
                                       <div style="height:20px;"></div>
                                     </div>
                                 </div>
						   
						   <?php
						  }
						 ?>
                         </div>
                      
                        
                         
                  </div>
                  
                <div class="col-md-8">
                   
                   		<div class="form-group">
                             <div class="col-md-12" >
                             	
                                   <div class="profile_name"><?= $data_creatives['creative_wp_name']?></div>
                                   <div class="profile_location"><?= $data_creatives['location_name']?></div>
                                   <div class="profile_like">
                                   <?php
                                   $q_pl = mysql_query("select count(*) as jumlah from profile_likes 
								   						where user_creative_id = '".$data_creatives['user_id']."'
														and user_regular_id = '".$this->session->userdata('user_id')."'
														");
								    $r_pl = mysql_fetch_array($q_pl);
									 if($this->session->userdata('user_id')){
									if($r_pl['jumlah'] > 0){ 
								   ?>
                                     <a href="<?= site_url('profile_view/dislike/'.$data_creatives['user_id']); ?>" class="btn btn-success" style="border-radius:0px; "><i class="fa fa-thumbs-up"></i>&nbsp;Like</a>
                                    
                                     </div>
                                   <?php
									}else{
								   ?>
                                   <a href="<?= site_url('profile_view/like/'.$data_creatives['user_id']); ?>" class="btn btn-default" style="border-radius:0px;color:#999"><i class="fa fa-thumbs-up"></i>&nbsp;Like</a>
                                   <?php
									}
									 }
								   ?>
                                   </div>
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
									where c.user_id = '".$_GET['id']."' 
									
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
                    
					
					<?php
					 if($this->session->userdata('user_id')){
					 	echo $data_creatives['creative_website'];
                     }else{
                     	echo "<a href='".site_url('login')."'<span class='blue_text'>Login to view</span></a>";
                     }
                     ?>
                     
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
                    <?php
					 if($this->session->userdata('user_id')){
					 	echo $data_creatives['creative_phone'];
                     }else{
                     	echo "<a href='".site_url('login')."'<span class='blue_text'>Login to view</span></a>";
                     }
                     ?>
                 </div>
             </div>
        </div>
        
         
        
        
            
        </div>
	</div>    	
</div>