<?php
$q_last  = mysql_query("select * from workshops where workshop_id = '".$data_workshop['last_id']."'");
$r_last = mysql_fetch_array($q_last);
?>

<div class="col-md-12">
    <div class="row">
        <div class="project_main">
            <div class="container">
                <div class="col-md-12">
                
                	
                             <div class="col-md-12" >
                                 <div class="row">
                                   <div class="profile_name" style="margin-bottom:10px;">Next Event</div>
                                  </div>
                             </div>
                   
                       
                        
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                               <img src="<?= base_url(); ?>assets/images/workshop/<?= $r_last['workshop_img'] ?>" style="width:100%;" />
                               </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                            <div class="news_date"><strong>Event by Aldo Felix Studio</strong> </div>
                            </div>
                             <div class="profile_name"><a href="<?=site_url('workshop/view/'.$r_last['workshop_id'])?>"><?= $r_last['workshop_name'] ?></a></div>
                                <div class="profile_location">&nbsp;</div>
                               
                               
                                <div class="form-group" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div class="col-xs-6" >
                                            <div ><strong>Concentrations</strong></div>
                                            Graphic Design, Photography, Interior Design
                                         </div>
                                         <div class="col-xs-6" >
                                            <div ><strong>Price</strong></div>
                                            IDR 500K (Price Includes Lunch)
                                         </div>
                                     </div>
                            	</div>
                                
                                <div class="form-group" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div class="col-xs-6" >
                                            <div ><strong>Date / Time</strong></div>
                                            August 19, 2015 / 03:00 PM
                                         </div>
                                         <div class="col-xs-6" >
                                            <div ><strong>Place</strong></div>
                                            Tanamera Coffee Serpong<br />
Scientia Boulevard<br />
Gading Serpong
                                         </div>
                                     </div>
                            	</div>
                                
                                <div class="form-group" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div class="col-xs-6" >
                                           <a href="#" style="text-decoration:none;"><div class="button_unfollow" style="background-color:#C63">REGISTER NOW</div></a>
                                         </div>
                                         
                                     </div>
                            	</div>
                               
                        </div>

                    </div>
                </div>

                <div style="clear:both; height:30px;"></div>

               

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
                                
                                   <div class="profile_name">Other Event</div>
                                   
                             </div>
                        </div>
      
      
    <div class="col-md-12" ><div class="row">


 <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from workshops a 
									join creatives b on b.user_id = a.user_id
									
									where workshop_id <> '".$data_workshop['last_id']."'
									order by workshop_id");
				while($r_p = mysql_fetch_array($q_p)){ 
                ?>
                <a href="<?=site_url('workshop/view/'.$r_p['workshop_id'])?>">
                    <div class="box-showcase">
                        <div class="box-showcaseInner">
                        
                        <?php
                        $img_class = $this->access->get_valid_img(base_url()."assets/images/workshop/".$r_p['workshop_img']);
						?>
                            <img src="<?= base_url(); ?>assets/images/workshop/<?= $r_p['workshop_img'] ?>" class="<?= $img_class?>" />
                          
                        </div>
                        <div class="box-showcaseDesc">
                             <div class="box-showcaseDesc_name"><?= $r_p['workshop_name'] ?></div>
                          
                            <div class="box-showcaseDesc_date"><?php
								echo $this->access->format_date($r_p['workshop_date'] );
							  ?></div>
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