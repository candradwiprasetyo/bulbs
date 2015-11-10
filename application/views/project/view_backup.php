<div class="col-md-12" style="padding:0px;" >
     <div class="box-showcase_cover">
         <div class="box-showcaseInnerCover">
              <img src="<?= base_url(); ?>assets/images/project/<?= $data_project['project_img'] ?>" style="width:100%;"/>            
         </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="project_desc">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                                <div class="profile_name"><?= $data_project['project_name']?></div>
                                <div class="profile_location"><?= $data_project['creative_wp_name']?></div>
                                <div class="profile_description_title">Project Info</div>
                                <div class="profile_description_content">
                                                  <?= $data_project['project_description']?>
                                </div>
                                <a href="javascript: history.back()" class="btn btn-primary">Back</a>
                        </div>

                        <div class="col-md-3">
                            <div class="profile_name">&nbsp;</div>
                            <div class="profile_location">Published on <?= $this->access->format_date($data_project['project_date']);?></div>
                            <div class="profile_description_title">Project Concentrations</div>
                            <div class="profile_description_content">
                           <?php
                            $color = array('#d05a51', '#92a495', '#3a58db', '#f1c40f', '#d35400', '#27ae60', '#8e44ad');
							$q_pc = mysql_query("select b.pc_name 
												from project_detail_categories a
												join profile_categories b on b.pc_id = a.pc_id 
												where a.project_id = '".$data_project['project_id']."'
												order by b.pc_id 
												");
							while($r_pc = mysql_fetch_array($q_pc)){
							?>
                                <div>
                                    <div class="circle_project" style="background-color:<?= $color[rand(0,6)] ?>"></div><?= $r_pc['pc_name'] ?>
                                </div>
                               <?php
							}
							   ?>
                              
                            </div>
                        </div>

                    </div>
                </div>

                <div style="clear:both; height:30px;"></div>
				<!--
                 <?php
                           
							$q_pdi = mysql_query("select a.pdi_img 
												from project_detail_images a
												
												where a.project_id = '".$data_project['project_id']."'
												order by pdi_id 
												");
							while($r_pdi = mysql_fetch_array($q_pdi)){
							?>
                 <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_pdi['pdi_img'] ?>" class="img_banner_project">
                        </div>
                     </div>
                </div>
				<?php
							}
				?>
                -->

                 <div style="clear:both; height:50px;"></div>



            </div>
        </div>
    </div>
</div>

<div class="col-md-12" style="padding:0px;" >
   
        <div class="project_view_profile_page">
            <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <div class="row">
                          <?php
                           $img_class_profile = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$data_project['creative_img']);
						  ?>
                             <div class="box-showcase_profile">
                                <div class="box-showcaseInnerProfile">
                            		<img src="<?= base_url(); ?>assets/images/profile/<?= $data_project['creative_img']?>" class="<?= $img_class_profile ?>">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-11">
                           
                                <div class="following_name">
                                  <?php

                                  if($this->session->userdata('user_id') == $data_project['user_id']){
                                  ?>
                                  <a href="<?=site_url('profile') ?>"><?= $data_project['creative_wp_name'] ?></a>
                                  
                                  <?php
                                  }else{ 
                                  ?>
                                  <a href="<?=site_url('profile_view/?id='.$data_project['user_id'])?>"><?= $data_project['creative_wp_name'] ?></a>
                                  <?php
                                  }
                                  ?>
                                </div>
                                <div class="following_location" style="margin-bottom:10px;"><?= ($data_project['location_id']!=0) ? $data_project['location_name'] : $data_project['other_location']?></div>
                                <div class="blue_text">
                                 <?php
                                if($this->session->userdata('user_id') != "" && $this->session->userdata('user_id') != $data_project['user_id']){
									$q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$data_project['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
									?>
                                   <button class="btn btn-success" style="border-radius:0px;" disabled>Following</button>
                                   <a href="<?=site_url('project/unfollowing/'.$data_project['user_id'].'/'.$data_project['project_id']); ?>" class="btn btn-danger" style="width:120px; border-radius:0px;">Unfollow</a>
                                <?php
								}else{
                                ?>
								<a href="<?=site_url('project/following/'.$data_project['user_id'].'/'.$data_project['project_id']); ?>" class="btn btn-primary" style="width:120px; border-radius:0px;">FOLLOW</a>
                                <?php
								}
								}
								?>
                                </div>
                               
                        </div>

                    </div>
                </div>
            </div>
        </div>
   
</div>

<div class="col-md-12">
    <div class="row">
        <div class="project_desc">
            <div class="container">
               
                            <div class="form-group">
                             <div class="col-md-12" >
                                
                                   <div class="profile_name">Related Projects</div>
                                   
                             </div>
                        </div>
      
      
    <div class="col-md-12" ><div class="row">

	  <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									where c.user_id = '".$data_project['user_id']."' 
									and project_id <> '".$data_project['project_id']."'
									order by project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
				$img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
						
                ?>
                <a href="<?=site_url('project/view/'.$r_p['project_id'])?>">
                    <div class="box-showcase">
                        <div class="box-showcaseInner">
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="<?= $img_class ?>" />
                           
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
            
        
           
            <div style="clear:both; height:50px;"></div>
   </div>
</div>
                
            </div>
        </div>
    </div>
</div>