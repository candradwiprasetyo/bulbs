<?php
if($this->session->userdata('logged')){
if($this->session->userdata('user_type_id') == 2){
?>
<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9">
       	 	<div class="row">
                 <div class="navbar_category">
                 	<div class="container">
                    	<div class="navbar_category_menu">&nbsp;</div>
                        <div class="navbar_category_menu"><a href="<?=site_url('profile'); ?>">Profile</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('follower'); ?>">Followers</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('following'); ?>">Followings</a></div>
                     	<div class="navbar_category_menu"><a href="<?=site_url('project/add'); ?>">Upload Work</a></div>
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
}else if($this->session->userdata('user_type_id') == 3){
?>
<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9">
       	 	<div class="row">
                 <div class="navbar_category">
                 	<div class="container">
                    	<div class="navbar_category_menu">&nbsp;</div>
                         <div class="navbar_category_menu"><a href="<?=site_url('showcase_regular'); ?>">Activity</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('account_regular'); ?>">Profile</a></div>
                        <div class="navbar_category_menu"><a href="<?=site_url('follower'); ?>">Following</a></div>
                     
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

<div class="col-md-12" style="padding:0px;" >
   <?php
   $ic = 1;
  
   $q_c = mysql_query("select a.*, b.location_name 
   						from tr_following z 
						join creatives a on a.user_id = z.user_regular_id
						join locations b on b.location_id = a.location_id
						where z.user_creative_id = '".$this->session->userdata('user_id')."'
   						order by a.creative_id 
   			");
	
   while($r_c = mysql_fetch_array($q_c)){
	   $img_class = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$r_c['creative_img']);
   ?>
        <div class="<?php if($ic%2==1){ ?> following_page1<?php }else{ ?>following_page2<?php } ?>">
       
            
            <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <div class="row">
                            <div class="box-showcase_profile">
                                <div class="box-showcaseInnerProfile">
                            		<img src="<?= base_url(); ?>assets/images/profile/<?= $r_c['creative_img'] ?>" class="<?= $img_class ?>">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                           
                                <div class="following_name"><a href="<?=site_url('profile_view/?id='.$r_c['user_id'])?>"><?= $r_c['creative_wp_name'] ?></a></div>
                                <div class="following_location" style="margin-bottom:10px;"><?= $r_c['location_name'] ?></div>
                                <div class="blue_text">
                               <?php
                                if($this->session->userdata('user_type_id')){
									$q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$r_c['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
									?>
                                   <button class="btn btn-success" style="border-radius:0px;" disabled>Following</button>
                                   <a href="<?=site_url('follower/unfollowing/'.$r_c['user_id']); ?>" class="btn btn-danger" style="width:120px; border-radius:0px;">Unfollow</a>
                                <?php
								}else{
                                ?>
								<a href="<?=site_url('follower/following/'.$r_c['user_id']); ?>" class="btn btn-primary" style="width:120px; border-radius:0px;">FOLLOW</a>
                                <?php
								}
								}
								?>
                                
                              </div>
                               
                        </div>
                        <div class="col-md-6">
                         <?php
						$q_p  = mysql_query("select a.*, b.creative_wp_name
											from projects a 
											join creatives b on b.creative_id = a.creative_id
											
											where b.creative_id = '".$r_c['creative_id']."' 
											
											order by project_id limit 3");
						while($r_p = mysql_fetch_array($q_p)){ 
						$img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
						?>
                            <div class="col-md-4">
                             <div class="row">
                                <div class="box-showcase_gallery">
                                    <div class="box-showcaseInner">
                                        <a href="<?=site_url('project/view/'.$r_p['project_id'])?>"><img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="<?= $img_class ?>"></a>
                                    </div>
                                </div>
                                </div>
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
