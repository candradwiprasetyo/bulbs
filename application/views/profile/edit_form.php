
    <form id="form1" name="form1" method="post" action="<?=site_url('profile/save_profile/')?>" enctype="multipart/form-data">
    
    <div class="col-md-12" style="padding:0px; " >
    	
  <div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        
                                
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Edit Profile</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        
                                       
                                        <div class="col-md-12">
                                         	
                                          <div class="row">
                                               
                                              
                                            
                                             <div class="row">
                                                	<div class="col-md-6">
                                                            <div class="form-group">
                                                           <label>Photo Profile</label>
                                                           <img src="<?= base_url(); ?>assets/images/profile/<?= $data_creatives['creative_img'] ?>" style="width:100%;" />
                                                            <input type="file" name="i_img" id="i_img" />
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
                                                                        
                                                                            <input type="checkbox" name="i_pc_<?= $r_p_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_p_category['pc_id'] ?>" <?php if($r_p_valid['jumlah'] > 0 ){ ?> checked="checked"<?php }?> />
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
                                                            <input required type="text" name="i_phone" class="form-control"value="<?= $data_creatives['creative_phone']?>" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> <label>Website</label>
                                                            <input required type="text" name="i_website" class="form-control"  value="<?= $data_creatives['creative_website']?>" title="" id="i_website"/>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                              
                                               <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Facebook</label>
                                                            <input  type="text" name="i_facebook" class="form-control" value="<?= $data_creatives['creative_facebook']?>" title="" id="i_phone"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> 
                                                        	<label>Twitter</label>
                                                            <input  type="text" name="i_twitter" class="form-control"  value="<?= $data_creatives['creative_twitter']?>" title="" id="i_website"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Instagram</label>
                                                            <input  type="text" name="i_instagram" class="form-control" value="<?= $data_creatives['creative_instagram']?>" title="" id="i_phone"/>
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
                                                            <input required type="text" name="i_wp_name" class="form-control" placeholder="" value="<?= $data_creatives['creative_wp_name']?>" title="" id="i_wp_name"/>
                                                            </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12 ">
                                                    
                                                      <div class="form-group">
                                                        <label>Workplace Description</label>
                                                <textarea name="i_description" rows="10" class="form-control" id="i_description" ><?= $data_creatives['creative_wp_description']?></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                              
                          <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="EDIT"/>
                                                        </div>
                                                    </div>
                                                		 <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="button" value="BACK" onclick="javascript: history.back()"/>
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
