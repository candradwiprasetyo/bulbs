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
   $ic = 1;
   $q_c = mysql_query("select a.*, b.location_name from creatives a
   						join locations b on b.location_id = a.location_id 
   						order by creative_id
   			");
   while($r_c = mysql_fetch_array($q_c)){
   ?>
        <div class="<?php if($ic%2==1){ ?> following_page1<?php }else{ ?>following_page2<?php } ?>">
       
            
            <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <div class="row">
                            <img src="<?= base_url(); ?>assets/images/profile/<?= $r_c['creative_img'] ?>" class="project_view_photo">
                            </div>
                        </div>
                        <div class="col-md-5">
                           
                                <div class="following_name"><?= $r_c['creative_wp_name'] ?></div>
                                <div class="following_location" style="margin-bottom:10px;"><?= $r_c['location_name'] ?></div>
                                <div class="blue_text"><input class="btn button_signup" type="submit" value="FOLLOWING" style="width:120px;"/></div>
                               
                        </div>
                        <div class="col-md-6">
                         <?php
						$q_p  = mysql_query("select a.*, b.creative_wp_name
											from projects a 
											join creatives b on b.creative_id = a.creative_id
											
											where b.creative_id = '".$r_c['creative_id']."' 
											
											order by project_id limit 3");
						while($r_p = mysql_fetch_array($q_p)){ 
						?>
                            <div class="col-md-4">
                            	<img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="project_view_photo">
                           	</div>
                          <?php
						}
						  ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
   <?php
   $ic++;
   }
   ?>
</div>
