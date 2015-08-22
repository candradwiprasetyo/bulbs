
    <form id="form1" name="form1" method="post" action="<?=site_url('register/save_registration/'.$data['id'])?>" enctype="multipart/form-data">
    
    <div class="col-md-12" style="padding:0px; " >
    	
  <div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        <div class="form-group">
                                           		
                                            	<div class="message">Thanks for signup. Please complete form registration </div>
                                            	
                    </div>
                                
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Register</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        
                                        <div class="row">
                                       
                                         
                                      
                                        
                                        <div class="col-md-12">
                                         	
                                          <div class="row">
                                               
                                               <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                                                            <div class="form-group">
                                                            <label>Photo Profile</label>
                                                          
                                                            <input type="file" name="i_img" id="i_img" required />
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
                                                            <label>Workplace Name</label>
                                                            <input required type="text" name="i_wp_name" class="form-control" placeholder="First Name" value="" title="" id="i_wp_name"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    
                                                        <div class="form-group"> <label>Workplace Location</label>
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
                                                        <label>Workplace Description</label>
                                                <textarea name="i_description" rows="5" class="form-control" id="i_description" ></textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                              
                          <div class="row">
                                                    <div class="col-md-6">
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
