 <script>	
			function sign_up_type(type) {
				
				if(type==2){
					document.getElementById("t_sign_up3").value = "2";
				}else{
					document.getElementById("t_sign_up3").value = "3";
				}
			}
			
			
			function signup_facebook(link){
				var type = document.getElementById("t_sign_up3").value;
				window.location.href = "<?= site_url(); ?>" + "/login/signup_facebook/" + type;
				
				
			}
        </script>
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
                                      	
                                        
                                        <form action="<?=site_url('login/submit_login')?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
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
                                                    <input class="btn button_signup" type="submit" value="LOG IN" />
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="new_label" style="text-align:right; padding-bottom:5px;">
                                                    Forgot password ?
                                                    </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <a href="<?= $login_facebook_url ?>" class="btn button_login_facebook"><i class="fa fa-facebook fa-fw"></i>&nbsp;LOG IN WITH FACEBOOK</a>
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
                                                <div class="btn-toggle"> 
                                                    <div class="col-md-3">
                                                     
                                                        <div class="form-group">
                                                       <button class="btn btn-lg btn-primary new_button_creatives" id="t_sign_up1" onclick="sign_up_type(2)">CREATIVES</button>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                           <button class="btn btn-lg btn-default new_button_creatives  active" id="t_sign_up2" onclick="sign_up_type(3)">REGULAR</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                  <form action="<?=site_url('home/signup')?>" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_first_name" class="form-control" placeholder="First Name" value="" title=""/><input id="t_sign_up3" name="t_sign_up3" type="hidden" value="2" style="color:#000"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input required type="text" name="i_last_name" class="form-control" placeholder="Last Name" value="" title=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_email" class="form-control" placeholder="Email Address" value="" title=""/>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
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
                                                            <a href="#" onclick="signup_facebook('test')" class="btn button_login_facebook"><i class="fa fa-facebook fa-fw"></i>&nbsp;LOG IN WITH FACEBOOK</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
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