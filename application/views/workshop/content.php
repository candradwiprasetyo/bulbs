<?php
$q_last  = mysql_query("select a.*, b.creative_wp_name
						from workshops a
						join creatives b on b.user_id = a.user_id 
						where a.workshop_id = '".$data_workshop['last_id']."'");
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
                            <div class="news_date"><strong>Event by <?= $r_last['creative_wp_name'] ?></strong> </div>
                            </div>
                             <div class="profile_name"><a href="<?=site_url('workshop/view/'.$r_last['workshop_id'])?>"><?= $r_last['workshop_name'] ?></a></div>
                                <div class="profile_location">&nbsp;</div>
                               
                               
                                <div class="form-group" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div class="col-xs-6" >
                                            <div ><strong>Concentrations</strong></div>
                                             <?php
											   
												$q_pc = mysql_query("select b.pc_name, b.pc_color
																	from workshop_details a
																	join profile_categories b on b.pc_id = a.pc_id
																	where a.workshop_id = '".$r_last['workshop_id']."'
																	order by a.pc_id 
																	limit 3
																	");
												$concentration = '';
												while($r_pc = mysql_fetch_array($q_pc)){
												?>
												 
												
												<div class="circle_project" style="background:<?= $r_pc['pc_color']?>"></div><?= $r_pc['pc_name']?><br />
												<?php    
												}
												
												
												?>
                                         </div>
                                         <div class="col-xs-6" >
                                            <div ><strong>Price</strong></div>
                                            <?= $r_last['workshop_price']?>
                                         </div>
                                     </div>
                            	</div>
                                
                                <div class="form-group" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div class="col-xs-6" >
                                            <div ><strong>Date / Time</strong></div>
                                           <?= $this->access->format_date($r_last['workshop_date'])." / ".$r_last['workshop_time'] ?>
                                         </div>
                                         <div class="col-xs-6" >
                                            <div ><strong>Place</strong></div>
                                           <?= $r_last['workshop_place']?>
                                         </div>
                                     </div>
                            	</div>
                                
                                <div class="form-group" style="margin-bottom:30px;">
                                    <div class="row">
                                        <div class="col-xs-6" >
                                           <a href="<?= $r_last['workshop_link']?>" style="text-decoration:none;"><div class="button_unfollow" style="background-color:#C63">REGISTER NOW</div></a>
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