<script type="text/javascript">
$(function() {
	$(".follow").click(function(){
		var element = $(this);
		var noteid = element.attr("id");
		var info = 'id=' + noteid;
		
		
		$.get( 
                  "<?= site_url()?>profile_view/get_follow_status",
                  { id: noteid },
                  function(data) {
                     var follow_status = data;
					 
					
						 
						
						 
							 $.ajax({
								   type: "POST",
								   url: "<?= site_url()?>profile_view/follow_ajax",
								   data: info,
								   success: function(){}
								 });
								
							
					if(follow_status == 0){	
                        $(".follow").html('<div class="button_unfollow">FOLLOWING</div>');
					}else{
						$(".follow").html('<div class="button_creatives">FOLLOW</div>');
						
					}
					
					
                  }
        );
		
		return false;
	});
});



</script>  

<?php 
	if(isset($_GET['did']) && $_GET['did']==1){
		echo $this->access->get_alert_success("You are logged in"); 
	}else if(isset($_GET['did']) && $_GET['did']==2){
		echo $this->access->get_alert_success("Your profile has been saved"); 
	}else if(isset($_GET['did']) && $_GET['did']==3){
		echo $this->access->get_alert_success("Your account has been saved"); 
	}else if(isset($_GET['did']) && $_GET['did']==4){
		echo $this->access->get_alert_success("Your project has been updated"); 
	}
?>
<?php
if($this->session->userdata('user_type_id')==2){
	echo $this->access->get_navbar_category(); 
}else if($this->session->userdata('user_type_id')==3){
	echo $this->access->get_navbar_category_regular(); 
}
?>
<div class="md-modal md-effect-1" id="modal-1">

            <form id="form1" name="form1" method="post" action="<?=site_url('profile_view/review/'.$data_creatives['user_id'])?>" enctype="multipart/form-data">
   
            <div class="md-content">
               
                <div>
                     <div class="profile_name">Rate <?= $data_creatives['creative_wp_name'] ?></div>
               
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="i_rating" value="5" required/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="i_rating" value="4" required/><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="i_rating" value="3" required/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="i_rating" value="2" required/><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="i_rating" value="1" required/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                         </fieldset>

                    <div style="clear:both"></div>
                    <br>

                     <div class="profile_name" style="margin-bottom:20px;">Review <?= $data_creatives['creative_wp_name'] ?></div>
                      <textarea name="i_description" rows="5" class="form-control" id="i_description" required placeholder="Write a few words about your experience
with the creative..." ></textarea>
                                               
                      <div style="clear:both"></div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="btn button_signup" type="submit" value="SUBMIT"/>
                       
                        </div> 
                         <div class="col-md-6">
                          
                        <button class="btn button_regular md-close" style="border-radius:0px;">CANCEL</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
      
        </div>

 <div class="profile_left_color1" style="padding-bottom:20px;">
        <div class="row" style="margin-left:0px; margin-right:0px;">
        	<div class="profile_left_content">
        		 <div class="col-md-12">
                 
                 <div class="col-xs-4">
                            <div class="row">
                            <div class="box-showcase_profile">
                            <?php
                          $img_class_profile = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$data_creatives['creative_img']);
							?>
                                <div class="box-showcaseInnerProfile">
                            		   <img src="<?= base_url(); ?>assets/images/profile/<?= $data_creatives['creative_img'] ?>" class="<?= $img_class_profile ?>">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xs-8">
                           
                                <div class="following_name"><?= $data_creatives['creative_wp_name']?></div>
                                <div class="following_location" style="margin-bottom:10px;"><?= ($data_creatives['location_id']!=0) ? $data_creatives['location_name'] : $data_creatives['other_location']?></div>
                                
                                
                                 <div class="form-group">
                        	<?php
                       if($this->session->userdata('user_id')){
					   ?>
                                 <div class="col-xs-8" >
                                     <div class="row">
                                     <?php
                                     $q_tr_f = mysql_query("select count(tr_following_id) as jumlah from tr_following where user_creative_id = '".$data_creatives['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
									$r_tr_f = mysql_fetch_array($q_tr_f);
									if($r_tr_f['jumlah'] > 0){
										
									?> 
                                   
                                 
                                   <a href="#" class="follow" id="<?= $data_creatives['user_id'] ?>" style="text-decoration:none;"><div class="button_unfollow">FOLLOWING</div></a>
                                <?php
								}else{
                                ?>
                                          <a href="#" class="follow" id="<?= $data_creatives['user_id'] ?>" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>
                                      <?php
									}
									
									  ?>
                                     </div>
                                 </div>
                                 <div class="col-xs-4" >
                                 	<div class="row">
                                          <a href="<?=site_url('message/view/'.$data_creatives['user_id']); ?>" style="text-decoration:none;"><div class="button_message"><i class="fa fa-envelope"></i></div></a>
                                      </div>
                                 </div>
                                  <?php
					   }else{
						   ?>
						    <div class="col-md-6" >
                                 	<div class="row">
                                       <div style="height:20px;"></div>
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
 </div>
 
 <div class="profile_left_color2" style="padding-bottom:20px;">

        <div class="profile_mobile">
             <div class="row">
                    <div class="col-xs-6">
                        <div class="row">
                            <a href="<?=site_url().'profile_view_mobile?id='.$_GET['id'].'&tab=1'; ?>">
                            <div class="menu">
                                <div class="menu_caption">Projects</div>
                            </div>
                            </a>
                        </div>
                    </div>
            
                    <div class="col-xs-6">
                        <div class="row">
                            <a href="<?=site_url().'profile_view_mobile?id='.$_GET['id'].'&tab=2'; ?>">
                                <div class="menu">
                                   
                                    <div class="menu_caption">Profile</div>
                                </div>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
        
        
        
 
<?php
if(isset($_GET['tab']) && $_GET['tab'] == 2){
?>

<div class="profile_statistic_mobile">
<div class="col-xs-4">
    <div class="row">
    	
        <div class="menu">
      		<div class="menu_count"><?= $data_creatives['following'] ?></div>
            <div class="menu_caption">Following</div>
        </div>
       
    </div>
</div>
<div class="col-xs-4">
    <div class="row">
    
        <div class="menu">
          <div class="menu_count"><?= $data_creatives['follower'] ?></div>
            <div class="menu_caption">Followers</div>
        </div>
    
    </div>
</div>

<div class="col-xs-4">
    <div class="row">
   
        <div class="menu">
           <div class="menu_count"><?= $data_creatives['view'] ?></div>
            <div class="menu_caption">Views</div>
        </div>
    
    </div>
</div>


</div>

<div class="col-md-12">

<div class="form-group" style="margin-bottom:50px;">
        	<div class="row">
                <div class="col-md-12" >
                <strong>SHARE</strong>
                    <a href="http://www.facebook.com/sharer.php?u=<?= site_url().'profile_view?id='.$data_creatives['user_id']; ?>" target="_blank" style="padding-right:0px; margin-left:20px;">
                    <div class="circle_navbar" style="margin-right:10px;"><i class="fa fa-facebook"></i></div>
                    </a>
                </div>
            </div>
        </div>

 <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Concentrations</strong></div>
                    
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                     <?php
                            $color = array('#d05a51', '#92a495', '#3a58db', '#f1c40f', '#d35400', '#27ae60', '#8e44ad');
							$q_pc = mysql_query("select b.pc_name 
												from profile_detail_categories a
												join profile_categories b on b.pc_id = a.pc_id
												where user_id = '".$data_creatives['user_id']."'
												order by a.pc_id 
												limit 3
												");
							$concentration = '';
							while($r_pc = mysql_fetch_array($q_pc)){
							 
							$concentration .= $r_pc['pc_name'].", ";
                                
							}
							
							echo substr($concentration,0, -2);
							?>
                 </div>
             </div>
        </div>
        
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-xs-6" >
                	<div ><strong>Website</strong></div>
                    <?php
					 if($this->session->userdata('user_id')){
					 	?>
                        <a href="http://<?= $data_creatives['creative_website']?>"><?= $data_creatives['creative_website']?></a>
                        <?php
                     }else{
                     	echo "<a href='".site_url('login')."'<span class='blue_text'>Login to view</span></a>";
                     }
                     ?>
                 </div>
                 <div class="col-xs-" >
                	<div ><strong>Phone</strong></div>
                     <?php
					 if($this->session->userdata('user_id')){
					 	echo $data_creatives['creative_phone'];
                     }else{
                     	echo "<a href='".site_url('login')."'<span class='blue_text'>Login to view</span></a>";
                     }
                     ?>
                 </div>
             </div>
        </div>
        
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>User Review</strong></div>
                    <?php
					$q_rating = mysql_query("select sum(pr_rating) / count(pr_rating) as rata from profile_reviews where user_creative_id = '".$data_creatives['user_id']."'");
					$r_rating = mysql_fetch_array($q_rating);
					
					$rata = ($r_rating['rata']);
					
					
					$selisih = 5 - $rata;
					
					$selisih_bulat = floor($selisih);
					
					$setengah = $selisih - $selisih_bulat;
					//echo $setengah;
					
					
					for($i=1; $i<=$rata; $i++){
					?>
                    <i class="fa fa-star" style="color:#477CBD; font-size:24px;"></i>
                    <?php
					}
					?>
                    
                    <?php
					if($setengah > 0){
					for($ise=1; $ise<=1; $ise++){
					?>
                    <i class="fa fa-star-half-empty" style="color:#477CBD; font-size:24px;"></i>
                    <?php
					}
					}
					?>  
					
					<?php
					
					for($is=1; $is<=$selisih; $is++){
					?>
                    <i class="fa fa-star-o" style="color:#477CBD; font-size:24px;"></i>
                    <?php
					}
					?>                    
                    <div style="margin-top:5px; float:right"><?= number_format($rata,1); ?> / 5 Stars</div>
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                	<?php
					$q_pr = mysql_query("select count(pr_id) as jumlah from profile_reviews where user_creative_id = '".$data_creatives['user_id']."' and user_regular_id = '".$this->session->userdata('user_id')."'");
					$r_pr = mysql_fetch_array($q_pr);
					if($this->session->userdata('user_id')){
					if($r_pr['jumlah'] > 0){
						echo "You've already written a review";	
					}else{
					?>
                    <a href="#" class="md-trigger" data-modal="modal-1" style="text-decoration:none">Write Review</a>
                    <?php
					}
					}
					?>
                 </div>
             </div>
             
             </div>
             
        <div class="form-group" style="margin-bottom:30px;">
        	<div class="row">
                <div class="col-md-12" >
                	<div ><strong>Description</strong></div>
                    <?= $data_creatives['creative_wp_description']?>
                 </div>
                 
             </div>
        </div>
      

</div>

 
             

<?php	
}else{
?>
<div class="col-md-12">
 <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									where c.user_id = '".$_GET['id']."' 
									
									order by project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
				
				 
					   $img_class = $this->access->get_valid_img(base_url()."assets/images/project/".$r_p['project_img']);
					   
                ?>
                <a href="<?=site_url('project/view/'.$r_p['project_id'])?>">
                    <div class="box-showcase2">
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
								case 1: $style = "style='background:".$r_pc['pc_color']."; z-index:9999'"; break;
								case 2: $style = "style='background:".$r_pc['pc_color']."; left:10px; z-index:9998'"; break;
								case 3: $style = "style='background:".$r_pc['pc_color']."; left:20px; z-index:9997'"; break;
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
                            <div class="box-showcaseDesc_button"> 
                            
                            </div>
                            
                        </div>
                    </div>
                    </a>
                <?php
                }
                ?>  
                
                <div style="clear:both"></div>
                </div>
                <br />
<?php
}
?>
        
 </div>
 
 