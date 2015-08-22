
<div class="row" style="margin-left:0px; margin-right:0px;">
 

    <div class="col-md-12" style="padding:0px; " >
    	
    	<div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        <div class="form-group">
                                           		<?php
                                                if($message){
												?>
                                            	<div class="message"><?= $message ?></div>
                                            	<?php
												}else if(isset($_GET['err'])){
												?>
                                            	<div class="message">Wrong username or password. Please try again !</div>
                                            	<?php
												}
												?>
                                        </div>
                                
                                        
                                         <div class="form-group">
                                           	<div class="col-md-12">
                                            	<div class="new_title">Log In to Use 8Bulbs</div>
                                            </div>
                                        </div>
                                      	
                                        
                                        
                                        <div class="row">
                                         <form action="<?=site_url('login/submit_login')?>" method="post" enctype="multipart/form-data"><div class="col-md-12">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input required type="text" name="i_username" class="form-control" placeholder="Username" value="" title=""/>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input required type="password" name="i_password" class="form-control" placeholder="Password" value="" title=""/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="new_label" >
                                                        <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
                                                        Keep me signed in
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="btn button_signup" type="submit" value="LOG IN"/>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="new_label" style="text-align:right; padding-bottom:5px;">
                                                    Forgot password ?
                                                    </div>
                                                 </div>
                                                 <div class="form-group">
                                                    <input class="btn button_signup" type="submit" value="LOG IN WITH FACEBOOK"/>
                                                </div>
                                            </div>
                                        </div>
                                         </form>
                                         
                                        <br /><br /><br /><br /><br />
                                        
                                        <div class="col-md-12">
                                         	<div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="new_title">Sign Up to 8Bulbs</div>
                                                </div>
                                        	</div>
                                      	
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="circle_signup">?</div><div style="padding-top:5px;">Join 8Bulbs as</div>
                                                    </div>
                                                </div>
                                        
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                           <a href="#" style="text-decoration:none;"><div class="button_creatives">CREATIVES</div></a>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                           <a href="#" style="text-decoration:none;"><div class="button_regular">REGULAR</div></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_name" class="form-control" placeholder="First Name" value="" title=""/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input required type="password" name="i_name" class="form-control" placeholder="Last Name" value="" title=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_name" class="form-control" placeholder="Email Address" value="" title=""/>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_name" class="form-control" placeholder="Username" value="" title=""/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input required type="password" name="i_name" class="form-control" placeholder="Password" value="" title=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="new_label" >
                                                                <input type="checkbox" name="CheckboxGroup1" value="checkbox" id="CheckboxGroup1_0">
                                                                Subscribe to 8Bulbs Newsletter
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="SIGN UP"/>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="new_label" style="text-align:right;height:20px;">
                                                           
                                                            </div>
                                                         </div>
                                                         <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="SIGN UP WITH FACEBOOK"/>
                                                        </div>
                                                    </div>
                                                </div>
                                        	 <div class="new_label" >
                                            By Signing Up, you agree to our Terms & Conditions and that you have read our Privacy Policy. </div>

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

