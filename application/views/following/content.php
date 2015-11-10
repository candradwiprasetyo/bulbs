<script type="text/javascript">
$(function() {
<?php
	$q_c_ajax = mysql_query("select a.*, b.location_name 
   						from tr_following z 
						join creatives a on a.user_id = z.user_creative_id
						left join locations b on b.location_id = a.location_id
						where z.user_regular_id = '".$this->session->userdata('user_id')."'
   						order by a.creative_id desc
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

<?php
if($this->session->userdata('logged')){
if($this->session->userdata('user_type_id') == 2){
?>
<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9" style="padding:0px;">
		<?= $this->access->get_navbar_category(); ?>
       </div>
       
         <div class="col-md-3">
       	 	<div class="row">
                 <input required type="text" name="i_name" class="form-control category_search2" placeholder="Search" value="" title="" style="padding-top:24px; padding-bottom:24px;"/>
             </div> 
        </div>
     
</div>
<?php	
}else if($this->session->userdata('user_type_id') == 3){
?>
<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9" style="padding:0px;">
       	 	<?= $this->access->get_navbar_category_regular(); ?>
        </div>
       
         <div class="col-md-3">
       	 	<div class="row">
                 <input required type="text" name="i_name" class="form-control category_search2" placeholder="Search" value="" title="" style="padding-top:24px; padding-bottom:24px;"/>
             </div> 
        </div>
     
</div>
<?php
}
}
?>

<div style="clear:both"></div>

<div class="container" >
<br />

<div class="col-md-12" style="padding:0px;" >
   <?php
   $ic = 1;
  
   $q_c = mysql_query("select a.*, b.location_name 
   						from tr_following z 
						join creatives a on a.user_id = z.user_creative_id
						left join locations b on b.location_id = a.location_id
						where z.user_regular_id = '".$this->session->userdata('user_id')."'
   						order by a.creative_id desc
   			");
	
   while($r_c = mysql_fetch_array($q_c)){
	   $img_class_profile = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$r_c['creative_img']);
   ?>
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
                                <div class="creative_location" style="margin-bottom:5px;"><?= ($r_c['location_id']!=0) ? $r_c['location_name'] : $r_c['other_location']?></div>
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
   <?php
   $ic++;
   }
   ?>
</div>
</div>
<br />