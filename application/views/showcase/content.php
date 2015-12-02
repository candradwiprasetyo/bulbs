<script type="text/javascript">

function open_concentration(){
	var h = false;
	if (h == false){
        
        $("#container_select").fadeIn(function(){h = true;});
    }
    if (h == true){
        
        $("#container_select").fadeOut(function(){h=false});
    }
}

</script>



<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-3">
       	 	<div class="row">
                <div class="form-control select_search category_search new_select"  placeholder="Concentration" style="-webkit-appearance:none !important;" onclick="open_concentration()">Concentration</div>
             </div> 
        </div>
        <div class="col-md-3">
       	 	<div class="row">
                 <div class="form-control select_search category_search new_select"  placeholder="Concentration" style="-webkit-appearance:none !important;" onclick="open_concentration()">Location</div>
             </div> 
        </div>
         <div class="col-md-3">
       	 	<div class="row">
                <div class="form-control select_search category_search new_select"  placeholder="Concentration" style="-webkit-appearance:none !important;" onclick="open_concentration()">Sort By</div>
             </div> 
        </div>
         <div class="col-md-3">
       	 	<div class="row">
                 
                 <div class="form-control select_search category_search2 new_select"  placeholder="Concentration" style="-webkit-appearance:none !important;" onclick="open_concentration()">Search ...</div>
             </div> 
        </div>
     
</div>




<div style="clear:both"></div>
	
<form action="<?=site_url('showcase/action_search')?>" method="post" enctype="multipart/form-data">
<div id = 'container_select' <?php /*if($this->session->userdata('parameter')){ ?> style="display:block"<?php } */?>>
<div class="row" style="margin:0px; padding:0px;">
<div class="col-md-12">
	<div class="col-md-3">
    	<div class="form-group"> 
            <div class="checkbox_multiple">
            	<?php
				$no_multiple1 = 1;
                $q_multiple1 = mysql_query("select * from profile_categories order by pc_id");
				while($r_multiple1  = mysql_fetch_array($q_multiple1)){
				?>
                <div>
                <input id="multiple1_<?= $no_multiple1 ?>" type="checkbox" name="i_multiple1_<?= $no_multiple1 ?>" value="<?= $r_multiple1['pc_id'] ?>" class="checkbox_multiple_input" 
				<?php
                if($this->session->userdata('sess_multiple1_'.$r_multiple1['pc_id'])){
				?> checked="checked" <?php } ?>>
                <label for="multiple1_<?= $no_multiple1 ?>" class="label_multiple"><?= $r_multiple1['pc_name'] ?></label>
                </div>
                <?php
				$no_multiple1++;
				}
				?>
            </div>
                                           
         </div>	
    </div>
    
    <div class="col-md-3">
    	<div class="form-group"> 
            <div class="checkbox_multiple">
               <?php
				$no_multiple2 = 1;
                $q_multiple2 = mysql_query("select * from locations order by location_id");
				while($r_multiple2  = mysql_fetch_array($q_multiple2)){
				?>
                <div>
                <input id="multiple2_<?= $no_multiple2 ?>" type="checkbox" name="i_multiple2_<?= $no_multiple2 ?>" value="<?= $r_multiple2['location_id'] ?>" class="checkbox_multiple_input"
                <?php
                if($this->session->userdata('sess_multiple2_'.$r_multiple2['location_id'])){
				?> checked="checked" <?php } ?>
                >
                <label for="multiple2_<?= $no_multiple2 ?>" class="label_multiple"><?= $r_multiple2['location_name'] ?></label>
                </div>
                <?php
				$no_multiple2++;
				}
				?>
			</div>
                                           
         </div>	
    </div>
    
     <div class="col-md-3">
    	<div class="form-group"> 
            <div class="radio_multiple">
                <input id="i_radio1" type="radio" name="i_radio" value="1" checked="checked" class="radio_multiple_input">
                <label for="i_radio1" class="label_multiple">Featured</label>
                <br />
                <input id="i_radio2" type="radio" name="i_radio" value="2" class="radio_multiple_input">
                <label for="i_radio2" class="label_multiple">Most Recommended</label>
                <br />
                <input id="i_radio3" type="radio" name="i_radio" value="3" class="radio_multiple_input">
                <label for="i_radio3" class="label_multiple">Most Recent</label>
            </div>
                                           
         </div>	
    </div>
    
    
    <div class="col-md-3">
    	<div class="form-group"> 
             
             <input name="i_search_keyword" class="form-control" placeholder="Search Here ..." value="<?php
                if($this->session->userdata('sess_search')){
				echo $this->session->userdata('sess_search'); } ?>" type="text" />
                       
         </div>	
         <div class="form-group"> 
         <div class="col-md-6 col-md-offset-3">  
                  	 <input class="btn button_signup" type="submit" value="SEARCH" />
                  </div>  
         </div>
    </div>
    
</div>
</div>
</div>
</form>


<br />



<div class="container" >
  <?php
	$parameter = ($this->session->userdata('parameter')) ? $this->session->userdata('parameter') : "";
  $where = ' where a.project_id <> 0 ';
  if($this->session->userdata('user_id')){
    $where .= " and c.user_id <> '".$this->session->userdata('user_id')."' ";
  }
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									left join project_detail_categories d on d.project_id = a.project_id
								    $where $parameter
									and a.project_active_status = 1
									group by a.project_id
									order by a.project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
                ?>
                 <?php
                        

						$img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
						
						?>
                <a href="<?=site_url('project/view/'.$r_p['project_id'])?>">
                    <div class="box-showcase">
                        <div class="box-showcaseInner">
                        
                        <div class="circle_showcase_frame">
                       
                        <?php
                            
							$q_pc = mysql_query("select b.pc_name, b.pc_color
												from project_detail_categories a
												join profile_categories b on b.pc_id = a.pc_id
												where a.project_id = '".$r_p['project_id']."'
												order by a.pc_id 
												limit 3
												");
							$no_color = 1;
							while($r_pc = mysql_fetch_array($q_pc)){
							
							switch($no_color){
								case 1: $style = "style='background:".$r_pc['pc_color']."; z-index:999'"; break;
								case 2: $style = "style='background:".$r_pc['pc_color']."; left:10px; z-index:998'"; break;
								case 3: $style = "style='background:".$r_pc['pc_color']."; left:20px; z-index:997'"; break;
							}
							
							?>
							
                            
                        	<div class="circle_showcase" <?= $style?>></div>
                            
                            <?php
							$no_color++;
							}
							?>
                        </div>
                        
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
<br />