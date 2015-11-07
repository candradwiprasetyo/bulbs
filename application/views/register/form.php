    <form id="form1" name="form1" method="post" action="<?=site_url('register/save_registration/'.$data['id'])?>" enctype="multipart/form-data">
    
    <div class="col-md-12" style="padding:0px; " >
    	
  <div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        <!--
                                        <div class="form-group">
                                           <div class="message">Thanks for signing up. Please complete the registration form</div>
                                         </div>
                                        -->
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Complete Your Profile</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        
                                       
                                        <div class="col-md-12">
                                         	
                                          <div class="row">
                                               
                                               
                                                
                                                <div class="row">
                                                	<div class="col-md-6">
                                                           <div class="form-group">
                                                          
                                                           
                                                           
                                                           
                                                           
                                                           
                                                           <?php
                                                           if($user_category_id == 2){
                                                           ?>
                                                          <img src="<?= base_url()."assets/images/profile/".$creative_img ?>" style="width:100%;" />
                                                          <?php
                                                          }else{
														  ?>
                                                          <div class="col-md-5">
                                                          <div class="row">
														  <img src="<?= base_url()."assets/images/profile/default_user.jpg"; ?>" style="width:100%;" />
                                                          </div>
                                                          </div>
                                                          
                                                          <div class="col-md-7">
                                                          <label>Photo Profile</label>
                                                          <div>Please select an image that is 300x300
pixels or bigger. </div>
<div class="fileUpload btn button_signup">
    <span>CHOOSE FILE</span>
   <input class="upload" type="file" name="i_img" id="i_img" <?php if($user_category_id == 1){ echo "required"; } ?>/>
</div>
                                                          
                                                          
														  </div>
														  <?php
														  }
                                                          ?>
                                                            
                                                           
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        <label>Concentration</label>
																<?php
                                                                $q_p_category = mysql_query("select * from profile_categories order by pc_id");
                                                                while($r_p_category = mysql_fetch_array($q_p_category)){
                                                                ?>
                                                                    <div>
                                                                        
                                                                            <input type="checkbox" name="i_pc_<?= $r_p_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_p_category['pc_id'] ?>" class="rbutton"  />
                                                                            <?= $r_p_category['pc_name']?>
                                                                         
                                                                  </div>
                                                                  <?php
                                                                }
                                                                  ?>      
                                                        </div>
                                                    </div>
                      								
                                            	</div>
                                                
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            
                                                            <input required type="text" name="i_phone" class="form-control"value="" title="" id="i_phone" placeholder="Phone No."/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group">
                                                            <input required type="text" name="i_website" class="form-control"  value="" title="" id="i_website" placeholder="Web Address (URL)"/>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                              
                                             
                                                
                                                <div class="row">
                                                    
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        	
                                                            <select name="i_location_id" id="i_location_id" class="form-control new_select">
    <?php
    $q_location = mysql_query("select * from locations order by location_name");
	while($r_location = mysql_fetch_array($q_location)){
		?>
        <option value="<?= $r_location['location_id']?>"><?= $r_location['location_name']?></option>
        <?php
	}
	?>                                            
</select>
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="col-md-6">
                                                            <div class="form-group">
                                                            
                                                            <input placeholder="Company Name" required type="text" name="i_wp_name" class="form-control"  value="" title="" id="i_wp_name"/>
                                                            </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                              
                                              
                          					
                                                
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                    
                                                      <div class="form-group">
                                                        
                                                <textarea placeholder="Short bio about yourself" name="i_description" rows="5" class="form-control" id="i_description" ></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                              
                          <div class="row">
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="NEXT STEP: EXPAND YOUR NETWORK"/>
                                                        </div>
                                                    </div>
                                                
                                                   
                                            </div>
                                        	

											<br /><br /><br /><br /><br />
                                            
                                            
                                            </div>
                                        </div>
                                      
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                 
                            
                            </div><!-- /.box -->
           
        </div>
        
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
	$(function() {
			var $inputs = $('input.rbutton');
			$inputs.change(function() {
				if ($('input.rbutton:checked').length == 3) {
					$inputs.not(':checked').prop('disabled', true);
				} else {
					$inputs.prop('disabled', false);
				}
			});
		});
		
		$(window).load(function(){
			var $inputs = $('input.rbutton');
			if ($('input.rbutton:checked').length == 3) {
					$inputs.not(':checked').prop('disabled', true);
				} else {
					$inputs.prop('disabled', false);
				}
		});
    </script>