    
  

<div class="profile_page">
<div class="row" style="margin-left:0px; margin-right:0px;">
    <div class="col-md-9" style="padding:0px; ">
    	<div class="profile_left">
        
        <div class="profile_left_color2">
        	<div class="profile_left_content">
        		<div class="col-md-12" >
             			<div class="col-md-12" >
                       
      						<div class="form-group">
                                   		<div class="profile_name"><?= $data_project['project_name']?></div>
                                  	 
                             </div>
                       
                        </div>
						
                        <div class="col-md-12" >
                        
                        	<div class="form-group">
                            
                             	<img src="<?= base_url(); ?>assets/images/project/<?= $data_project['project_img'] ?>" style="width:100%;"/>                                
                             </div>
                        	
                        </div>
                        
                        <div class="col-md-12" >
                       
                        <div class="form-group">
                             
                        		<?= $data_project['project_description']?>
      						
                        </div><a href="javascript: history.back()" class="btn btn-primary">Back</a>
                       
                        
                        <br />
                        </div>
                        
              </div>
        	</div>
        </div>
        
        </div>
	</div>
    
     <div class="col-md-3">
    	<div class="profile_right">
        <div class="profile_right_content">
        			
                    <div class="col-md-10" >
      					<div class="form-group">
                           
                            	
                                   		<div class="profile_name"><a href="<?=site_url('profile_view/?id='.$data_project['user_id'])?>"><?= $data_project['creative_wp_name'] ?></a></div>
                                  	</div> 
                             
                        </div>
						
                        
                        
                        <div class="col-md-10" >
                       
                        	<img src="<?= base_url(); ?>assets/images/project/<?= $data_project['project_img'] ?>" style="width:100%;"/>                                
                        
                        </div>
                        
                      
                      
                         <div class="col-md-10" >
                        	<div class="form-group">
                            
                             	<?php
                       if($this->session->userdata('user_id')){
					   ?>
                                 <div class="col-md-6" >
                                     <div class="row">
                                     <?php
                                     $q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$data_project['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
										
									?> 
                                   
                                 
                                   <a href="<?=site_url('profile_view/unfollowing/'.$data_project['user_id']); ?>" style="text-decoration:none;"><div class="button_unfollow">FOLLOWING</div></a>
                                <?php
								}else{
                                ?>
                                           <a href="<?=site_url('profile_view/following/'.$data_project['user_id']); ?>" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>
                                      <?php
									}
									
									  ?>
                                     </div>
                                 </div>
                                 <div class="col-md-6" >
                                 	<div class="row">
                                          <a href="<?=site_url('message/view/'.$data_project['user_id']); ?>" style="text-decoration:none;"><div class="button_message">MESSAGE</div></a>
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
                    
                        <div style="clear:both;"></div>
         <div class="form-group" style="margin-bottom:20px; margin-top:20px;">
        	
                <div class="col-md-12" >
                	<div ><strong>Project Concentrations</strong></div>
                    
                 </div>
             </div>
             
             <div class="row" style="padding:0; margin:0; margin-bottom:20px;">
                <div class="col-md-12" >
                    <?php
                            $color = array('#d05a51', '#92a495', '#3a58db', '#f1c40f', '#d35400', '#27ae60', '#8e44ad');
							$q_pc = mysql_query("select b.pc_name, b.pc_color
												from project_detail_categories a
												join profile_categories b on b.pc_id = a.pc_id
												where a.project_id = '".$data_project['project_id']."'
												order by a.pc_id 
												limit 3
												");
							$concentration = '';
							while($r_pc = mysql_fetch_array($q_pc)){
							?>
							 
							
                            <div class="circle_project" style="background:<?= $r_pc['pc_color']?>"></div><?= $r_pc['pc_name']?><br />
							<?php    
							}
							
							
							?>
                
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:20px;">
        	
                <div class="col-md-10" >
                	<div ><strong>Other Project</strong></div>
                 </div>
                 
                 <div class="col-md-10" >
                  <div class="row">
                 <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									where c.user_id = '".$data_project['user_id']."' 
									and project_id <> '".$data_project['project_id']."'
									order by project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
				$img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
						
                ?>
                 <div class="col-md-6">
                 <div class="form-group">
                  <div class="box-showcase_other_project">
                        <div class="box-showcaseInner_other_project">
                            <a href="<?= site_url() ?>project/view/<?= $r_p['project_id']?>"><img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="<?= $img_class ?>" /></a>
                        </div>
                       </div>
                    </div>
                </div>
                 <?php
				}
				 ?>
                  </div>
                 </div>
            
         </div>
                        
                       
        
            </div>
        </div>
	</div>    	
</div>

