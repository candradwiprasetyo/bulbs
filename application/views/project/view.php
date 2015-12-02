<script type="text/javascript">
$(function() {
	$(".follow").click(function(){
		var element = $(this);
		var noteid = element.attr("id");
		var info = 'id=' + noteid;
		
		
		$.get( 
                  "<?= site_url()?>project/get_follow_status",
                  { id: noteid },
                  function(data) {
                     var follow_status = data;
					 
					
						
						 
							 $.ajax({
								   type: "POST",
								   url: "<?= site_url()?>project/follow_ajax",
								   data: info,
								   success: function(){}
								 });

					if(follow_status == 0){
             		
							$(".follow").html('<div class="button_unfollow">FOLLOWING</div>');
						
					}else{
								$(".follow").html('<div class="button_creatives">FOLLOW</div>');
						
					}
					
					
                  }
        );
		
		return false;
	});
});



</script>      
  

<div class="profile_page">
<div class="row" style="margin-left:0px; margin-right:0px;">
    <div class="col-md-9" style="padding:0px; ">
    	<div class="profile_left">
        
        <div class="profile_left_color2" style="min-height:800px">
        <div class="row" style="margin-left:0px; margin-right:0px;">
        	<div class="profile_left_content">
        		<div class="col-md-11 col-md-offset-1" >
             			<div class="col-md-12" >
                       
      						<div class="form-group">
                                   		<div class="profile_name"><?= $data_project['project_name']?></div>
                                  	 
                             </div>
                       
                        </div>
						
                        <div class="col-md-12" >

                          <div class="form-group">
                            <img src="<?= site_url() ?>assets/images/project/<?= $data_project['project_img']?>" style="width:100%;">
                          </div>
                        
                        	 <?php

                          $q_detail_tmp = mysql_query("select 
                                                        a.* from project_detail_images a
                                                        join projects b on b.project_id = a.project_id
                                                        where b.project_id = '".$data_project['project_id']."' 
                                                        order by pdi_id");
                          while($r_detail_tmp = mysql_fetch_array($q_detail_tmp)){ 
                          if($r_detail_tmp['pdi_type']==1){
                          ?>
                          <div class="form-group">
                            <img src="<?= site_url() ?>assets/images/project/detail/<?= $r_detail_tmp['pdi_value']?>" style="width:100%;">
                          </div>
                          <?php
                          }else{
                          ?>
                          <div class="form-group">
                           <?= $r_detail_tmp['pdi_value']?>
                          </div>
                          <?php
                          }
                        }
                          ?>
                          
                        	
                        </div>
                        
                        <div class="col-md-12" >
                       
                        <div class="form-group">
                             
                        		
      						
                        </div><a href="javascript: history.back()" class="btn my_button">BACK</a>
                       
                        
                        <br />
                        </div>
                        
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
                       
                        	<img src="<?= base_url(); ?>assets/images/profile/<?= $data_project['creative_img'] ?>" style="width:100%;"/>                                
                        
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
                                   
                                 
                                   <a href="#" class="follow" id="<?= $data_project['user_id'] ?>" style="text-decoration:none;"><div class="button_unfollow">FOLLOWING</div></a>
                                <?php
								}else{
                                ?>
                                           <a href="#" class="follow" id="<?= $data_project['user_id'] ?>" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>
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
                	<div ><strong>Other Projects</strong></div>
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
									and a.project_active_status = 1
									order by project_id desc
									limit 6");
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

