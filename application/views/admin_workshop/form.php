<!-- Content Header (Page header) -->
        
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                            <div class="title_page"> <?= $data_head['title'] ?></div>
                            

                             <form  class="cmxform" id="createForm" action="<?= $data_head['action']?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                      
                                       
                                        <div class="col-md-9">
                                      
                                      
                                         <div class="form-group">
                                         <label>Title</label>
                                    <input required type="text" name="i_name" class="form-control" placeholder="workshop title" value="<?= @$data['workshop_name'] ?>" title="Fill workshop title"/>
                                			</div>
                                            
                                             <div class="form-group">
                                         <label>Price</label>
                                    <input required type="text" name="i_price" class="form-control" placeholder="workshop price" value="<?= @$data['workshop_price'] ?>" title="Fill workshop price"/>
                                			</div>
                                            
                                               <div class="form-group">
                                         <label>Place</label>
                                    <input required type="text" name="i_place" class="form-control" placeholder="workshop place" value="<?= @$data['workshop_place'] ?>" title="Fill workshop place"/>
                                			</div>
                                            
                                              <div class="form-group">
                                         <label>Register Link</label>
                                    <input required type="text" name="i_link" class="form-control" placeholder="workshop register link" value="<?= @$data['workshop_link'] ?>" title="Fill workshop register link"/>
                                			</div>
                                            
                                             <div class="form-group">
                                             <label>Date </label>
                                             <div class="input-group">
            
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= @$data['workshop_date'] ?>"/>
                                        </div><!-- /.input group -->
            </div>
            
            <!-- time Picker -->
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <div class="input-group">                                            
                                                <input type="text" class="form-control timepicker" name="i_time" value="<?= @$data['workshop_time']?>"/>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </div>
                                        
                                              <div class="form-group">
                                            <label>Creative</label>
                                           <select id="basic" name="i_user_id" class="selectpicker show-tick form-control" data-live-search="true">
											<?php
                                            $query_user = mysql_query("select a.*
															from creatives a 
															order by  
															creative_id");
                                            while($row_user = mysql_fetch_array($query_user)){
                                            ?>
                                            <option value="<?= $row_user['user_id']?>" <?php if($row_user['user_id'] == $data['user_id']){ ?>selected <?php } ?>  ><?= $row_user['creative_wp_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                        </div>
                                            
                                         <div class="form-group">
                                            <label>Description</label>
                                           <textarea id="editor" name="editor" rows="10" cols="80">
                                            <?php
                                            echo @$data['workshop_description']
                                            ?>
                                        </textarea>
                                        </div>
                                      
                                        </div>
                                      
                                        
 										<div class="col-md-3">
                                          <div class="form-group" style="margin-bottom:40px;">
                                         <label>Images</label>
                                         <?php
                                        if($data['row_id']){
										?>
                                        <br />
                                        <img src="<?= base_url(); ?>assets/images/workshop/<?= $data['workshop_img']?>" style="width:100%;"/>
                                        <?php
										}
										?>
                                           <input type="file" name="i_img" id="i_img" <?php if(!$data['row_id']){ echo " required "; } ?>title="fill workshop img" />
                                        </div>
                                        
                                        <div class="form-group">
                                        <?php
							$q_project_category = mysql_query("select * from profile_categories order by pc_id");
							while($r_project_category = mysql_fetch_array($q_project_category)){
								$checked = "";
								if($data['row_id']){
									$q_p_valid = mysql_query("select count(pc_id) as jumlah from workshop_details where workshop_id = '".$data['workshop_id']."' and pc_id = '".$r_project_category['pc_id']."'");
									$r_p_valid = mysql_fetch_array($q_p_valid);
									
									if($r_p_valid['jumlah'] > 0){
										$checked = " checked = 'checked'";
									}
								}
							?>
                                <div>
                                    <label>
                                        <input type="checkbox" name="i_pc_<?= $r_project_category['pc_id'] ?>" value="1" id="i_pc_<?= $r_project_category['pc_id'] ?>"  <?php echo $checked ?> class="rbutton" />
                                       	<?= $r_project_category['pc_name']?>
                                     </label>
                              </div>
                              <?php
							}
							  ?>
                                        </div>
                                    
                                      
                                        </div>
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Save"/>
                                <a href="<?= $data_head['close_button']?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
               
                </section><!-- /.content -->