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



<div style="clear:both"></div>
<br />

<div class="container" >
  <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									
									
									order by project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
                ?>
                 <?php
                        

						$img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
						
						?>
                <a href="<?=site_url('project/view/'.$r_p['project_id'])?>">
                    <div class="box-showcase">
                        <div class="box-showcaseInner">
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="<?= $img_class?>" />
                           
                        </div>
                        <div class="box-showcaseDesc">
                             <div class="box-showcaseDesc_name"><?= $r_p['project_name'] ?></div>
                            <div class="box-showcaseDesc_by"><?= $r_p['creative_wp_name'] ?></div>
                        </div>
                    </div>
                    </a>
                <?php
                }
                ?>  

</div>