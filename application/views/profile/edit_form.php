
    <form id="form1" name="form1" method="post" action="<?=site_url('profile/save_profile/')?>" enctype="multipart/form-data">
    
    <div class="col-md-12" style="padding:0px; " >
    	
  <div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        
                                
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Change Your Account Settings</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        
                                       
                                        <div class="col-md-12">
                                         	
                                          <div class="row">
                                               
                                              
                                            
                                             <div class="row">
                                                	<div class="col-md-6">
                                                            <div class="form-group">
                                                           
                                                            <div class="col-md-5">
                                                          <div class="row">
														  <img src="<?= base_url(); ?>assets/images/profile/<?= $data_creatives['creative_img'] ?>" style="width:100%;" />
                                                          </div>
                                                          </div>
                                                          
                                                          <div class="col-md-7">
                                                          <label>Photo Profile</label>
                                                          <div>Please select an image that is 300x300pixels or bigger. </div>
<div class="fileUpload btn button_signup">
    <span>CHOOSE FILE</span>
   <input class="upload" type="file" name="i_img" id="i_img"/>
</div>



                                                          
                                                          
														  </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        <label>Concentration</label>
																<?php
                                                                $q_p_category = mysql_query("select * from profile_categories order by pc_id");
                                                                while($r_p_category = mysql_fetch_array($q_p_category)){
                                                         		$q_p_valid = mysql_query("select count(pdc_id) as jumlah from profile_detail_categories where user_id = '".$data_creatives['user_id']."' and pc_id = '".$r_p_category['pc_id']."'");
																$r_p_valid = mysql_fetch_array($q_p_valid);
														        ?>
                                                                    <div>
                                                                        
                                                                            <input type="checkbox" name="i_pc_<?= $r_p_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_p_category['pc_id'] ?>" <?php if($r_p_valid['jumlah'] > 0 ){ ?> checked="checked"<?php }?> class="rbutton"  />
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
                                                            <label>First Name</label>
                                                            <input required type="text" name="i_first_name" class="form-control" placeholder="First Name" value="<?= $data_creatives['user_first_name'] ?>" title=""/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>Last Name</label>
                                                            <input required type="text" name="i_last_name" class="form-control" placeholder="Last Name" value="<?= $data_creatives['user_last_name'] ?>" title=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                  <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                            <label>Email</label>
                                                            <input required type="text" name="i_email" class="form-control" placeholder="Email Address" value="<?= $data_creatives['user_email'] ?>" title=""/>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Change Password</label>
                                                            <input  type="password" name="i_current_password" class="form-control" placeholder="Current Password" value="" title=""/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label></label>
                                                            <input type="password" name="i_new_password" class="form-control" placeholder="New Password" value="" title=""/>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Username</label>
                                                            <input  type="text" name="i_username" class="form-control" value="<?= $data_creatives['user_username']?>" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        	<label>Location</label>
                                                            <select name="i_location_id" id="i_location_id" class="form-control new_select" onchange="select_city(this.value)">
    <?php
	
    $q_location = mysql_query("select * from locations order by location_name");
	while($r_location = mysql_fetch_array($q_location)){
		?>
        <option value="<?= $r_location['location_id']?>" <?php if($data_creatives['location_id'] == $r_location['location_id']){ ?> selected="selected"<?php } ?> ><?= $r_location['location_name']?></option>
        <?php
	}
	?>                                     
    <option value="0"  <?php if($data_creatives['location_id']==0){ ?> selected="selected"<?php } ?>>Others</option>       
</select>

  <input type="text" name="i_other_location" id="i_other_location" class="form-control" placeholder="Other location" value="<?= $data_creatives['other_location']?>" title="" style="<?php if($data_creatives['location_id']!=0){  ?>display:none;<?php } ?> margin-top:10px;"/>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Phone No.</label>
                                                            <input required type="text" name="i_phone" class="form-control"value="<?= $data_creatives['creative_phone']?>" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> <label>Web Address (URL)</label>
                                                            <input required type="text" name="i_website" class="form-control"  value="<?= $data_creatives['creative_website']?>" title="" id="i_website"/>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                              
                          					<div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                            <label>Company Name</label>
                                                            <input required type="text" name="i_wp_name" class="form-control" placeholder="" value="<?= $data_creatives['creative_wp_name']?>" title="" id="i_wp_name"/>
                                                            </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                    
                                                      <div class="form-group">
                                                        <label>Bio</label>
                                                <textarea name="i_description" rows="10" class="form-control" id="i_description" ><?= $data_creatives['creative_wp_description']?></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                              
                          <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="SAVE DETAILS"/>
                                                        </div>
                                                    </div>
                                                		 <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="btn button_cancel" type="button" value="CANCEL" onclick="javascript: history.back()"/>
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
		
		function select_city(id){
				var other_city = document.getElementById("i_other_location");
				if(id == 0){
					other_city.style.display = 'inline';
				}else{
					other_city.style.display = 'none';
				}
				
				
			}
    </script>