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
                                   		<div class="profile_name"><?= $data_workshop['workshop_name']?></div>
                                  	 
                             </div>
                       
                        </div>
						
                        <div class="col-md-12" >
                        
                        	<div class="form-group">
                            
                             	<img src="<?= base_url(); ?>assets/images/workshop/<?= $data_workshop['workshop_img'] ?>" style="width:100%;"/>                                
                             </div>
                        	
                        </div>
                        
                        <div class="col-md-12" >
                       
                        <div class="form-group">
                             
                        		<?= $data_workshop['workshop_description']?>
      						
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
        			
                     <div class="col-md-12" style="padding:0" >
                    	<div class="col-md-10" >
      					<div class="form-group">
                           
                            	
                                   		<div class="profile_name"><a href="<?=site_url('profile_view/?id='.$data_workshop['user_id'])?>"><?= $data_workshop['creative_wp_name'] ?></a></div>
                                  	</div> 
                             
                        </div>
                        </div>
						
                        
                        <div class="col-md-12">
                        <div class="col-md-4" style="padding:0">
                       
                        	<img src="<?= base_url(); ?>assets/images/profile/<?= $data_workshop['creative_img'] ?>" style="width:100%;"/>                                
                        
                        </div>
                        <div class="col-md-6" style="padding-right:0">
                       <div class="form-group">
                       
                        	         <?php
									 if($this->session->userdata('user_id')){
                                     $q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$data_workshop['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
										
									?> 
                                   
                                 
                                   <a href="#" class="follow" id="<?= $data_workshop['user_id'] ?>" style="text-decoration:none;"><div class="button_unfollow">FOLLOWING</div></a>
                                <?php
								}else{
                                ?>
                                           <a href="#" class="follow" id="<?= $data_workshop['user_id'] ?>" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>
                                      <?php
									}
									 
									
									  ?>    
                                      </div>
                                      <div class="form-group">
                                       <a href="<?=site_url('message/view/'.$data_workshop['user_id']); ?>" style="text-decoration:none;"><div class="button_message">MESSAGE</div></a>  
                                       </div>   
                                       <?php
									 }
									   ?> 
                        
                        </div>
                        </div>
                        <div class="col-md-12" style="padding:0" >
                      
                      
                      
                    
                        <div style="clear:both;"></div>
         <div class="form-group" style="margin-bottom:20px; margin-top:20px;">
        	
                <div class="col-md-12" >
                	<div ><strong>Workshop Concentrations</strong></div>
                    
                 </div>
             </div>
             
             <div class="row" style="padding:0; margin:0; margin-bottom:20px;">
                <div class="col-md-12" >
                    <?php
                           
							$q_pc = mysql_query("select b.pc_name, b.pc_color
												from workshop_details a
												join profile_categories b on b.pc_id = a.pc_id
												where a.workshop_id = '".$data_workshop['workshop_id']."'
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
        
        <div class="form-group">
        	<div class="row" style="padding:0; margin:0;">
                <div class="col-md-10" >
                	<div ><strong>Date / Time</strong></div>
                 </div>
                 
                 <div class="col-md-10" >
               			 <?= $this->access->format_date($data_workshop['workshop_date'])." / ".$data_workshop['workshop_time'] ?>
                 </div>
         </div>
        </div>
         
         <div class="form-group">
        	<div class="row" style="padding:0; margin:0;">
                <div class="col-md-12" >
                	<div ><strong>Place</strong></div>
                    
                 </div>
                <div class="col-md-12" >
                    <?= $data_workshop['workshop_place'] ?>
                 </div>
            </div>
        </div>
        
         <div class="form-group">
        	<div class="row" style="padding:0; margin:0;">
                <div class="col-md-12" >
                	<div ><strong>Price</strong></div>
                    
                 </div>
                <div class="col-md-12" >
                    <?= $data_workshop['workshop_price'] ?>
                 </div>
            </div>
        </div>
        
         <div class="form-group">
        	<div class="row" style="padding:0; margin:0;">
                <div class="col-md-10" >
                	<a href=" <?= $data_workshop['workshop_link'] ?>" style="text-decoration:none;"><div class="button_unfollow" style="background-color:#C63">REGISTER NOW</div></a>
                    
                 </div>
               
            </div>
        </div>
                        
                       
        
            </div>
        </div>
	</div>    	
</div>

