 
<div class="row" style="margin-left:0px; margin-right:0px;">
 

    <div class="col-md-12" style="padding:0px; " >
    	
    	<div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      <div class="form-group">
                                        <?php
                                         if(isset($_GET['err']) && $_GET['err'] == 1){
                                        ?>
                                        <div class="message_error">Wrong Confirm Password </div>
                                        <?php
                                        }else{
                                        ?>
                                        
                                           		
                                                <div class="message">Create new password</div>
                                                
                                        
                                        <?php
                                        }
                                        ?>
                                        </div>
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">New Password</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <div class="form-group">
                                                    <input required type="password" name="i_password" class="form-control" placeholder="New Password" value="" title=""/>
                                                    </div>

                                                    <div class="form-group">
                                                    <input required type="password" name="i_confirm_password" class="form-control" placeholder="Confirm New Password" value="" title=""/>
                                                    </div>
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                               
                                                <div class="form-group">
                                                    <input class="btn button_signup" type="submit" value="SAVE" />
                                                </div>
                                            </div>
                                        
                                           
                                        </div>
                                         </form>
                                         
                                        
                                       
                                      
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                 
                            
                            </div><!-- /.box -->
           
        </div>
        
        </div>
    </div>
</div>

