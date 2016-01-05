 
<div class="row" style="margin-left:0px; margin-right:0px;">
 

    <div class="col-md-12" style="padding:0px; " >
    	
    	<div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        <div class="form-group">
                                           		<?php
                                                if(isset($_GET['did']) && $_GET['did'] == 1){
                                                ?>
                                                <div class="message_error">Your username and details about how to reset your password have been sent to you by email</div>
                                                <?php
                                                }else if(isset($_GET['err']) && $_GET['err'] == 1){
                                                ?>
                                                <div class="message_error">Invalid email. Please try again !</div>
                                               
                                                <?php
                                                }
                                                ?>
                                        </div>
                                
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Forgot Password</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        <form action="<?=site_url('forgot/submit_email')?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <div class="form-group">
                                                    <input required type="text" name="i_email" class="form-control" placeholder="Email" value="" title=""/>
                                                    </div>
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                               
                                                <div class="form-group">
                                                    <input class="btn button_signup" type="submit" value="RESET" />
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

