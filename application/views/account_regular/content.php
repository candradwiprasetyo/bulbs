<?php
if($this->session->userdata('logged')){
if($this->session->userdata('user_type_id') == 3){
?>
<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9">
       	 	<div class="row">
                 <div class="navbar_category">
                 	<div class="container">
                    	<div class="navbar_category_menu">&nbsp;</div> 
                        <div class="navbar_category_menu"><a href="<?=site_url('showcase_regular'); ?>">Activity</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('account_regular'); ?>">Profile</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('following_regular'); ?>">Following</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('message/view'); ?>">Message</a></div>
                    </div>
                 </div>
             </div> 
        </div>
       
         <div class="col-md-3">
       	 	<div class="row">
                 <input required type="text" name="i_name" class="form-control category_search" placeholder="Search" value="" title="" style="padding-top:24px; padding-bottom:24px;"/>
             </div> 
        </div>
     
</div>
<?php
}
}
?>

<div class="row" style="margin-left:0px; margin-right:0px;">
 

    <div class="col-md-12" style="padding:0px; " >
    	
    	<div class="col-md-6  col-md-offset-3">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                        <div class="col-md-12">
                                        	
                                            <?php
                                                 if(isset($_GET['did'])){
												?>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                       <div class="message">Data Saved</div>
                                                    </div>
                                                </div>
                                            	
                                            	<?php
												}
												?>
                                        
                                         	<div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="new_title">My Account</div>
                                                </div>
                                        	</div>
                                      	
                                          		
                                               
                                        
                                                <div class="row">
                                               
                                                  <form action="<?=site_url('account_regular/save_account')?>" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>First Name</label>
                                                            <input required type="text" name="i_first_name" class="form-control" placeholder="First Name" value="<?= $data_user['user_first_name'] ?>" title=""/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>Last Name</label>
                                                            <input required type="text" name="i_last_name" class="form-control" placeholder="Last Name" value="<?= $data_user['user_last_name'] ?>" title=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            <div class="form-group">
                                                            <label>Email</label>
                                                            <input required type="text" name="i_email" class="form-control" placeholder="Email Address" value="<?= $data_user['user_email'] ?>" title=""/>
                                                            </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Username</label>
                                                            <input required type="text" name="i_username" class="form-control" placeholder="Username" value="<?= $data_user['user_username'] ?>" title=""/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <label>Password</label>
                                                            <input type="password" name="i_password" class="form-control" placeholder="" value="" title=""/>
                                                            * Leave it blank if you don't wish to change the password
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
                                                          
                                                             <a href="javascript: history.back()" class="btn button_signup">BACK</a>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                </div>
                                                </form>
                                        	

                                            
                                            
                                            </div>
                                            
                                        </div>
                                       
                                      
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                 
                            
                            </div><!-- /.box -->
           
        </div>
        
        </div>
    </div>
</div>

