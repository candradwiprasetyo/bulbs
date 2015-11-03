<script type="text/javascript">
if (document.documentElement.clientWidth <= 768) {
	// scripts
	window.location.href = "<?= site_url() ?>profile_view_mobile?id=<?= $_GET['id']?>";
}

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
					 
					if(follow_status == 0){
						 
						var question = confirm("Are you sure want to follow ?");
						if(question==true){
						 
							 $.ajax({
								   type: "POST",
								   url: "<?= site_url()?>profile_view/follow_ajax",
								   data: info,
								   success: function(){}
								 });
								
							$(".follow").html('<div class="button_unfollow">FOLLOWING</div>');
						}
					}else{
						
						$.ajax({
								   type: "POST",
								   url: "<?= site_url()?>profile_view/follow_ajax",
								   data: info,
								   success: function(){}
								 });
								 
								$(".follow").html('<div class="button_creatives">FOLLOW</div>');
						
					}
					
					
                  }
        );
		
		return false;
	});
	
	$(".like").click(function(){
		var element = $(this);
		var noteid = element.attr("id");
		var info = 'id=' + noteid;
		
		
		$.get( 
                  "<?= site_url()?>profile_view/get_like_status",
                  { id: noteid },
                  function(data) {
                     var follow_status = data;
					 
				
						
						$.ajax({
								   type: "POST",
								   url: "<?= site_url()?>profile_view/like_ajax",
								   data: info,
								   success: function(){}
								 });
								 
								 if(follow_status == 0){
									$(".like").html('<div class="btn btn-success" style="border-radius:0px;"><i class="fa fa-thumbs-up"></i>&nbsp;You like it !</div>');
								 }else{
								 	$(".like").html('<div class="btn btn-default" style="border-radius:0px;"><i class="fa fa-thumbs-up"></i>&nbsp;Like</div>');
								 }
						
				
					
                  }
        );
		
		return false;
	});
});



</script>   

 
    <?php 
	if(isset($_GET['did']) && $_GET['did']==1){
		echo $this->access->get_alert_success("Review Saved"); 
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


<div class="profile_page">
<div class="row" style="margin-left:0px; margin-right:0px;">
    <div class="col-md-9" style="padding:0px; ">
    	<div class="profile_left">
        <div class="profile_left_color1">
        	<div class="profile_left_content">
            <div class="row" style="margin-left:0px; margin-right:0px;">
            
            	<div class="col-md-11 col-md-offset-1">
        		 <div class="col-md-12">
                       <div class="form-group">
                             <div class="col-md-12" >
                             	<div class="row">
                                  	<!--<div class="profile_nav"><?= $data['nav'] ?></div>-->
                                  </div>
                             </div>
                        </div>
                  </div>
                  
                <div class="col-md-4">
                  
                       <div class="form-group">
                             <div class="col-md-12" >
                             	<div class="row">
                                  <?php
                                    $img_class_profile = $this->access->get_valid_profile_img(base_url()."assets/images/profile/".$data_creatives['creative_img']);
								   ?>
                                   <div class="box-showcase_profile">
                                        <div class="box-showcaseInnerProfile">
                                            <img src="<?= base_url(); ?>assets/images/profile/<?= $data_creatives['creative_img'] ?>" class="<?= $img_class_profile ?>">
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                       
                        <div class="form-group">
                        	<?php
                       if($this->session->userdata('user_id')){
					   ?>
                                 <div class="col-md-6" >
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
                                          <!-- <a href="<?=site_url('profile_view/following/'.$data_creatives['user_id']); ?>" style="text-decoration:none;" class="follow" id="<?= $data_creatives['user_id'] ?>"><div class="button_creatives">FOLLOW</div></a>-->
                                           <a href="#" class="follow" id="<?= $data_creatives['user_id'] ?>" style="text-decoration:none;"><div class="button_creatives">FOLLOW</div></a>

                                      <?php
									}
									
									  ?>
                                  
                                     </div>
                                 </div>
                                 <div class="col-md-6" >
                                 	<div class="row">
                                          <a href="<?=site_url('message/view/'.$data_creatives['user_id']); ?>" style="text-decoration:none;"><div class="button_message">MESSAGE</div></a>
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
                  
                <div class="col-md-8">
                   
                   		<div class="form-group">
                             <div class="col-md-12" >
                             	    
                                   <div class="profile_name"><?= $data_creatives['creative_wp_name']?></div>
                                   <div class="profile_location"><?= $data_creatives['location_name']?></div>
                                   <div class="profile_like">
                                   <?php
                                   $q_pl = mysql_query("select count(*) as jumlah from profile_likes 
								   						where user_creative_id = '".$data_creatives['user_id']."'
														and user_regular_id = '".$this->session->userdata('user_id')."'
														");
								    $r_pl = mysql_fetch_array($q_pl);
									 if($this->session->userdata('user_id')){
									if($r_pl['jumlah'] > 0){ 
								   ?>
                                     <a href="#" class="like" id="<?= $data_creatives['user_id'] ?>" style="text-decoration:none;"><div class="btn btn-success" style="border-radius:0px;"><i class="fa fa-thumbs-up"></i>&nbsp;You like it !</div></a>
                                    
                                    
                                    
                                   <?php
									}else{
								   ?>
                                   <a href="#" class="like" id="<?= $data_creatives['user_id'] ?>" style="text-decoration:none;"><div class="btn btn-default" style="border-radius:0px;"><i class="fa fa-thumbs-up"></i>&nbsp;Like</div></a>
                                 
                                   
                                   <?php
									}
									 }
								   ?>
                                   <!--<button class="md-trigger" data-modal="modal-1">Fade in &amp; Scale</button>-->
                                   </div>
                                   <div class="profile_description_title">Description</div>
                                   <div class="profile_description_content">
                                   		<?= $data_creatives['creative_wp_description']?>
                                   </div>
                                   <!--<div class="profile_readmore">Read More</div>-->
                                   
                                   <br />
                               <br />
                             </div>
                        </div>
                   
                   </div>
    			</div>
        	</div>
        </div>
        </div>
        
        <div class="profile_left_color2">
        	<div class="profile_left_content">
           <div class="row" style="margin-left:0px; margin-right:0px;">
        		<div class="col-md-11 col-md-offset-1">
             
      			<div class="form-group">
                             <div class="col-md-12" >
                             	
                                <div class="row">
                                 <div class="col-md-6" >
                                   <div class="profile_name">Projects</div>
                                  </div> 
                                  
                                  <div class="col-md-6" style="text-align:right;">
                                   
                                  </div> 
                                  </div>
                                  
                             </div>
                        </div>
      
            <div style="padding-right:10px;">
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
                            <div class="titlebox-showcase"><?= $r_p['project_name'] ?></div>
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
           
            <div style="clear:both;"></div>
            <br />
                
        	</div>
        </div>
        </div>
        </div>
        </div>
	</div>
    
     <div class="col-md-3">
    	<div class="profile_right">
        
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
                	<div ><strong>Statistics</strong></div>
                    
                    <div class="row">
                		<div class="col-md-6" >
                        	<?= $data_creatives['follower'] ?> Followers
                        </div>
                        <div class="col-md-6" >
                        	<?= $data_creatives['following'] ?> Followings
                        </div>
                        <div class="col-md-6" >
                        	<?= $data_creatives['view'] ?>  views
                        </div>
                        <div class="col-md-6" >
                        	<?= $data_creatives['like'] ?> likes
                        </div>
                    </div>
                    
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
                <div class="col-md-12" >
                	<div ><strong>Website</strong></div>
                    
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                    
					
					<?php
					 if($this->session->userdata('user_id')){
					 	echo $data_creatives['creative_website'];
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
                	<div ><strong>Phone</strong></div>
                    
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
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
        
        <?php
        $q_review = mysql_query("select a.*, b.user_first_name, b.user_last_name, b.user_type_id
												from profile_reviews a
												join  users b on b.user_id = a.user_regular_id
												where user_creative_id = '".$data_creatives['user_id']."'
												order by a.pr_id desc 
												limit 5
												");
							
		while($r_review = mysql_fetch_array($q_review)){
		?>
        <div class="form-group" style="margin-bottom:30px;">
        
        	<div class="row">
                <div class="col-md-6" >
                	<div ><strong><?php
					if($r_review['user_type_id'] == 3){
						?>
						<?= $r_review['user_first_name']." ".$r_review['user_last_name']; ?>
						<?php
					
					}else{
					if($r_review['user_regular_id'] == $this->session->userdata('user_id')){
					?>
					<a href="<?= site_url().'profile'; ?>"><?= $r_review['user_first_name']." ".$r_review['user_last_name']; ?></a>
                    <?php
					}else{
                    ?>
					<a href="<?=  site_url().'profile_view/?id='.$r_review['user_regular_id']; ?>"><?= $r_review['user_first_name']." ".$r_review['user_last_name']; ?></a>
                    <?php
					}
					}
					?></strong></div>
                 </div>
                 
                <div class="col-md-6" >
                	<div style="text-align:right"><?= $this->access->format_date($r_review['pr_date'] )?></div>
                 </div>
             </div>
             
             <div class="row">
                <div class="col-md-12" >
                <?= $r_review['pr_description'] ?>
                 </div>
             </div>
        
        </div>
		
        <?php
		}
		?>
        
            
        </div>
	</div>    	
</div>

