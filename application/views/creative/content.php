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


$(function() {
<?php
	$q_c_ajax = mysql_query("select a.*, b.location_name 
   						from creatives a
   						join locations b on b.location_id = a.location_id 
						join profile_detail_categories d on d.user_id = a.user_id  
						
						group by a.creative_id
   						order by a.creative_id 
   			");
	
   while($r_c_ajax = mysql_fetch_array($q_c_ajax)){
?>
	$(".follow_<?= $r_c_ajax['user_id']?>").click(function(){
		var element = $(this);
		var noteid = element.attr("id");
		var info = 'id=' + noteid;
		
		
		$.get( 
                  "<?= site_url()?>creative/get_follow_status",
                  { id: noteid },
                  function(data) {
                     var follow_status = data;
						 
							 $.ajax({
								   type: "POST",
								   url: "<?= site_url()?>creative/follow_ajax",
								   data: info,
								   success: function(){}
								 });
               
          if(follow_status == 0){
              $(".follow_<?= $r_c_ajax['user_id']?>").html('<div class="button_unfollow">FOLLOWING</div>');
					}else{
              $(".follow_<?= $r_c_ajax['user_id']?>").html('<div class="button_creatives">FOLLOW</div>');
					}	
						
								 
							
						
					
					
					
                  }
        );
		return false;
	});
	<?php
   }
	?>
});
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
	
<form action="<?=site_url('creative/action_search')?>" method="post" enctype="multipart/form-data">
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




<div class="container" >
<br />
<?php
if(isset($_GET['reg']) && $_GET['reg'] == 1){
?>
<div class="box-body">
    <div class="form-group">
        <div class="col-md-12">
            <div class="new_title">Expand Your Network</div>
            <div style="text-align:center; padding-bottom:20px;">Below are some of the top creatives that are already on 8Bulbs.<br />Follow them to connect and expand your network.</div>
        </div>
    </div>
</div>
<?php
}
?>

   <?php
   $ic = 1;
  $parameter = ($this->session->userdata('parameter')) ? $this->session->userdata('parameter') : "";
  $where = ' where a.creative_id <> 0 ';
  if($this->session->userdata('user_id')){
    $where .= " and a.user_id <> '".$this->session->userdata('user_id')."' ";
  }
   
   //echo $where;
   $q_c = mysql_query("select a.*, b.location_name 
   						from creatives a
   						join locations b on b.location_id = a.location_id 
						join profile_detail_categories d on d.user_id = a.user_id  
						$where $parameter
						group by a.creative_id
   						order by a.creative_id 
   			");
	
   while($r_c = mysql_fetch_array($q_c)){
	   $img_class_profile = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$r_c['creative_img']);
   ?>
      <a href="<?=site_url('profile_view/?id='.$r_c['user_id'])?>">
                    <div class="box-showcase_creative">
                        <div class="box-showcaseInner_creative">
                           
                            <?php
						$q_p  = mysql_query("select a.*, b.creative_wp_name
											from projects a 
											join creatives b on b.creative_id = a.creative_id
											
											where b.creative_id = '".$r_c['creative_id']."' 
											
											order by project_id limit 4");
						while($r_p = mysql_fetch_array($q_p)){ 
						$img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
						?>
                            <div class="col-xs-6">
                             <div class="row">
                                <div class="box-showcase_gallery">
                                    <div class="box-showcaseInner" style="bottom:0px;">
                                        <a href="<?=site_url('project/view/'.$r_p['project_id'])?>"><img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" class="<?= $img_class ?>"></a>
                                    </div>
                                </div>
                                </div>
                            </div>
                          <?php
						}
						  ?>
                           
                        </div>
                        <div class="box-showcaseDesc_creative">
                             
                             <div class="col-xs-3">
                            <div class="row">
                            <div class="box-showcase_profile">
                                <div class="box-showcaseInnerProfile">
                            		<img src="<?= base_url(); ?>assets/images/profile/<?= $r_c['creative_img'] ?>" class="<?= $img_class_profile ?>">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xs-9">
                           
                                <div class="creative_name"><a href="<?=site_url('profile_view/?id='.$r_c['user_id'])?>"><?= $r_c['creative_wp_name'] ?></a></div>
                                <div class="creative_location" style="margin-bottom:5px;"><?= $r_c['location_name'] ?></div>
                                <div class="blue_text">
                                <?php
                                if($this->session->userdata('user_id')){
									$q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$r_c['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
									?>
                                   
                                 <a href="#" class="follow_<?= $r_c['user_id']?>" id="<?= $r_c['user_id'] ?>" style="text-decoration:none;"><div class="button_unfollow">FOLLOWING</div></a>
                                <?php
								}else{
                                ?>
								   <a href="#" class="follow_<?= $r_c['user_id']?>" id="<?= $r_c['user_id'] ?>" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>
                                <?php
								}
								}
								?>
                                
                              </div>
                               
                        </div>
                             
                        </div>
                    </div>
                    </a>
   <?php
   $ic++;
   }
   ?>
   <div style="clear:both;"></div>
   <?php
if(isset($_GET['reg']) && $_GET['reg'] == 1){
?>
   <div class="row" style="padding-top:20px;">
   <div class="col-md-4 col-md-offset-4">
                                                        <div class="form-group">
                                                            <a href="<?= site_url() ?>profile" class="btn button_unfollow">SKIP THIS STEP</a>
                                                        </div>
                                                    </div>
   </div>
   
   <?php
}
   ?>
   
</div>
<br />