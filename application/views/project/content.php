<?= $this->access->get_navbar_category(); ?>
<form id="form1" name="form1" method="post" action="<?= $data_project['action'] ?>" enctype="multipart/form-data">
<div class="col-md-12" style="padding:0px;" >

<?php
if($data_project['project_img']){
?>
<div class="box-showcase_cover">
     <div class="box-showcaseInnerCover">
          <img src="<?= base_url(); ?>assets/images/project/<?= $data_project['project_img'] ?>" style="width:100%;"/>      
            
     </div>
</div>
<div class="col-md-12">
        <div class="project_desc">
            <div class="container">
            <input type="file" name="i_img" id="i_img" /> 
            </div>
        </div>
</div>   
<?php
}else{
?>
      <div class="img_cover_image">
      	<div class="img_cover_image_content">
        
      	  <input type="file" name="i_img" id="i_img" />
      	
        </div>
      </div>
<?php
}
?>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="project_desc">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                        
                         <div class="row">
                        	 <div class="col-md-6">
                              <div class="form-group">
                              
                               
                                    <label>Project Name</label>
                                    <input required type="text" name="i_name" class="form-control" value="<?= $data_project['project_name'] ?>" title="" id="i_name"/>
                               
                               </div>
                              </div>
                         </div>
                         
                         <div class="row">
                              
                              <div class="col-md-12">  
                                
                                <div class="form-group">
                               	 <label>Project Info</label>
                                <div class="profile_description_content">
                                  <textarea name="i_description" cols="" rows="10" class="form-control"><?= $data_project['project_description'] ?></textarea>                
                                </div>
                                </div>
                                </div>
                        </div>
                        </div>
                        

                        <div class="col-md-3">
                            <div class="profile_name">&nbsp;</div>
                             <div class="profile_description_title">Project Concentrations</div>
                            <div class="profile_description_content">
                            <?php
							$q_project_category = mysql_query("select * from profile_categories order by pc_id");
							while($r_project_category = mysql_fetch_array($q_project_category)){
								$checked = "";
								if($data_project['project_name']){
									$q_p_valid = mysql_query("select count(pdc_id) as jumlah from project_detail_categories where project_id = '".$data_project['project_id']."' and pc_id = '".$r_project_category['pc_id']."'");
									$r_p_valid = mysql_fetch_array($q_p_valid);
									
									if($r_p_valid['jumlah'] > 0){
										$checked = " checked = 'checked'";
									}
								}
							?>
                                <div>
                                    <label>
                                        <input type="checkbox" name="i_pc_<?= $r_project_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_project_category['pc_id'] ?>"  <?php echo $checked ?> />
                                       	<?= $r_project_category['pc_name']?>
                                     </label>
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
                <div class="img_add_image">
                    <div class="img_add_image_content">
                   <input type="file" name="i_detail_img" id="i_detail_img" />
                    </div>
                 </div>
                 -->
                 
                 <br />
                 <button type="submit" class="btn btn-primary">SAVE</button>
                  
                                <a href="javascript: history.back()" class="btn btn-primary">BACK</a>
                  
                 <div style="clear:both; height:50px;"></div>
            </div>
            
           
            
        </div>
    </div>
</div>
</form>