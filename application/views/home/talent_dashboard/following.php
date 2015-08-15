<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9">
       	 	<div class="row">
                 <div class="navbar_category">
                 	<div class="container">
                    	<div class="navbar_category_menu">&nbsp;</div>
                    	<div class="navbar_category_menu">Activity</div>
                        <div class="navbar_category_menu">Profile</div>
                        <div class="navbar_category_menu">Following</div>
                        <div class="navbar_category_menu">Followers</div>
                        <div class="navbar_category_menu" style="color:#06C">Upload Work</div>
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


<div class="col-md-12" style="padding:0px;" >
   <?php
   for($if=1; $if<=6; $if++){
   ?>
        <div class="<?php if($if%2==1){ ?> following_page1<?php }else{ ?>following_page2<?php } ?>">
        <!--
            <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            
                            <img src="<?= base_url(); ?>assets/images/profile_photo.jpg" class="project_view_photo">
                           
                        </div>
                        <div class="col-md-4">
                                <div class="profile_name">Aldo Felix Studio</div>
                                <div class="profile_location" style="margin-bottom:10px;">Jakarta – Indonesia</div>
                                <div class="blue_text"> <input class="btn button_signup" type="submit" value="FOLLOWING" style="width:200px; margin-top:30px;"/></div>
                        </div>
						<div class="col-md-6">
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project.jpg" class="project_view_photo">
                           	</div>
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project3.jpg" class="project_view_photo">
                           	</div>
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project4.jpg" class="project_view_photo">
                           	</div>
                        </div>
                    </div>
                </div>
            </div>
            -->
            
            <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <div class="row">
                            <img src="<?= base_url(); ?>assets/images/profile_photo.jpg" class="project_view_photo">
                            </div>
                        </div>
                        <div class="col-md-5">
                           
                                <div class="following_name">Aldo Felix Studio</div>
                                <div class="following_location" style="margin-bottom:10px;">Jakarta – Indonesia</div>
                                <div class="blue_text"><input class="btn button_signup" type="submit" value="FOLLOWING" style="width:120px;"/></div>
                               
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project.jpg" class="project_view_photo">
                           	</div>
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project3.jpg" class="project_view_photo">
                           	</div>
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project4.jpg" class="project_view_photo">
                           	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
   <?php
   }
   ?>
</div>
