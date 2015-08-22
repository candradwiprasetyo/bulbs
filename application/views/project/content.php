<form id="form1" name="form1" method="post" action="<?=site_url('project/save/')?>" enctype="multipart/form-data">
<div class="col-md-12" style="padding:0px;" >
      <div class="img_cover_image">
      	<div class="img_cover_image_content">
      	  <input type="file" name="i_img" id="i_img" />
      	
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
                        
                         <div class="row">
                        	 <div class="col-md-6">
                              <div class="form-group">
                                <div class="profile_name"> 
                                <label>Project Name</label>
                                <input required type="text" name="i_name" class="form-control"value="" title="" id="i_name"/></div>
                                </div>
                                
                                <div class="profile_description_title">Project Info</div>
                             </div>
                             <div style="clear:both;"></div>
                             <div class="col-md-12">
                                <div class="profile_description_content">
                                  <textarea name="i_description" cols="" rows="5" class="form-control"></textarea>                
                                </div>
                                </div>
                        </div>
                        </div>
                        

                        <div class="col-md-3">
                            <div class="profile_name">&nbsp;</div>
                            
                            <div class="profile_description_title">Project Concentrations</div>
                            <div class="profile_description_content">
                            <?php
							$q_project_category = mysql_query("select * from project_categories order by pc_id");
							while($r_project_category = mysql_fetch_array($q_project_category)){
							?>
                                <div>
                                    <label>
                                        <input type="checkbox" name="i_pc_<?= $r_project_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_project_category['pc_id'] ?>" />
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
				
                <div class="img_add_image">
                    <div class="img_add_image_content">
                   <input type="file" name="i_detail_img" id="i_detail_img" />
                    </div>
                 </div>
                 
                 
                 <br />
                 <button type="submit" class="btn btn-primary">SAVE</button>
                 <div style="clear:both; height:50px;"></div>
            </div>
            
           
            
        </div>
    </div>
</div>
</form>