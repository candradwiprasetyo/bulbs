    <form id="form1" name="form1" method="post" action="<?=site_url('register/save_registration/'.$data['id'])?>" enctype="multipart/form-data">
    
    <div class="col-md-12" style="padding:0px; " >
    	
  <div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        <div class="form-group">
                                           <div class="message">Thanks for signing up. Please complete the registration form</div>
                                         </div>
                                
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Register</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        
                                       
                                        <div class="col-md-12">
                                         	
                                          <div class="row">
                                               
                                               
                                                
                                                <div class="row">
                                                	<div class="col-md-6">
                                                            <div class="form-group">
                                                           <label>Photo Profile</label>
                                                           <?php
                                                           if($user_category_id == 2){
                                                           ?>
                                                          <img src="<?= base_url()."assets/images/profile/".$creative_img ?>" style="width:100%;" />
                                                          <?php
                                                          }
                                                          ?>
                                                            <input type="file" name="i_img" id="i_img" <?php if($user_category_id == 1){ echo "required"; }
                                                           ?>/>
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
                                                                        
                                                                            <input type="checkbox" name="i_pc_<?= $r_p_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_p_category['pc_id'] ?>" />
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
                                                            <label>Phone</label>
                                                            <input required type="text" name="i_phone" class="form-control"value="" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> <label>Website</label>
                                                            <input required type="text" name="i_website" class="form-control"  value="" title="" id="i_website"/>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                              
                                               <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Facebook</label>
                                                            <input  type="text" name="i_facebook" class="form-control" value="<?= $creative_facebook ?>" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        	<label>Twitter</label>
                                                            <input  type="text" name="i_twitter" class="form-control"  value="" title="" id="i_website"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Instagram</label>
                                                            <input  type="text" name="i_instagram" class="form-control"value="" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        	<label>Workplace Location</label>
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
                                                </div>
                                              
                                              
                          					<div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                            <label>Workplace Name</label>
                                                            <input required type="text" name="i_wp_name" class="form-control" placeholder="" value="" title="" id="i_wp_name"/>
                                                            </div>
                                                    </div>
                                                   
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                    
                                                      <div class="form-group">
                                                        <label>Workplace Description</label>
                                                <textarea name="i_description" rows="5" class="form-control" id="i_description" ></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                              
                          <div class="row">
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="SAVE"/>
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