<?php
$q_last  = mysql_query("select * from news where news_id = '".$data_news['last_id']."'");
$r_last = mysql_fetch_array($q_last);
?>

<div class="col-md-12">
    <div class="row">
        <div class="project_main">
            <div class="container">
                <div class="col-md-12">
                
                	
                             <div class="col-md-12" >
                                 <div class="row">
                                   <div class="profile_name" style="margin-bottom:10px;">News</div>
                                  </div>
                             </div>
                   
                  
                        
                    <div class="row">
                        <div class="col-md-6">
                               <img src="<?= base_url(); ?>assets/images/news/<?= $r_last['news_img'] ?>" style="width:100%;" />
                        </div>

                        <div class="col-md-6">
                           
                            <div class="news_date"><strong>News</strong> Published on <?= $this->access->format_date($r_last['news_date']);?></div>
                             <div class="profile_name"><a href="<?=site_url('news/view/'.$r_last['news_id'])?>"><?= $r_last['news_name'] ?></a></div>
                                <div class="profile_location">&nbsp;</div>
                               
                                <div class="profile_description_content">
                                <?php
                                $desc = explode(" ", $r_last['news_description']);
								$jumlah = count($desc);
								$limit = ($jumlah < 100) ? $limit = $jumlah : $limit = 100;
								
								for($d=0; $d<=$limit-1; $d++){
									if($desc[$d]){
										echo $desc[$d]." ";	
									}
								}
								?>
                                                  
                                </div>
                                <div  class="blue_text"><a href="<?=site_url('news/view/'.$r_last['news_id'])?>">Read More</a></div>
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
                                
                                   <div class="profile_name">Recent News</div>
                                   
                             </div>
                        </div>
      
      
    <div class="col-md-12" ><div class="row">


 <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name, c.news_type_name
									from news a 
									join creatives b on b.user_id = a.user_id
									join news_types c on c.news_type_id = a.news_type_id
									where news_id <> '".$data_news['last_id']."'
									order by news_id");
				while($r_p = mysql_fetch_array($q_p)){ 
                ?>
                <a href="<?=site_url('news/view/'.$r_p['news_id'])?>">
                    <div class="box-showcase">
                        <div class="box-showcaseInner">
                         <?php
					   $img_class = $this->access->get_valid_img(base_url()."assets/images/news/".$r_p['news_img']);
					   ?>
						   
                       
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_p['news_img'] ?>" class="<?= $img_class?>" />
                          
                        </div>
                        <div class="box-showcaseDesc">
                             <div class="box-showcaseDesc_name"><?= $r_p['news_name'] ?></div>
                            <div class="box-showcaseDesc_by">In <?= $r_p['news_type_name'] ?></div>
                            <div class="box-showcaseDesc_date"><?php
								echo $this->access->format_date($r_p['news_date'] );
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