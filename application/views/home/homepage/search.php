 <form action="<?=site_url('home/search')?>" method="post" enctype="multipart/form-data">
<div class="search_page">

	<div class="container" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
     
		<div class="row">
        	 <div class="col-md-6">
             	<div class="form-group">
                
             	<div class="search_quote">Find Creatives in Your Area</div>
               
                </div>
             </div>
             
              <div class="col-md-6">
              
             	
                	<div class="row">
                    <div class="col-md-4"> 
                    <div class="form-group">
                	<select name="i_location_id" size="1" class="form-control select_search new_select" required style="-webkit-appearance:none !important;"/>
                                             <option value="">Concentration</option>
                                             <?php
											$q_pc  = mysql_query("select * from profile_categories order by pc_id");
											while($r_pc = mysql_fetch_array($q_pc)){ 
											?>
                                           <option value="<?= $r_pc['pc_id']?>"><?= $r_pc['pc_name'] ?></option>      
                                           <?php
											}
                                           ?> 
                                           </select>  
                                           </div>
               		 </div>
                    
                	<div class="col-md-4"> 
                     <div class="form-group">
                	<select name="i_pc_id" size="1" class="form-control select_search new_select" required style="-webkit-appearance:none !important;"/>
                                             <option value="">Location</option>
                                            <?php
											$q_l  = mysql_query("select * from locations order by location_id");
											while($r_l = mysql_fetch_array($q_l)){ 
											?>
                                           <option value="<?= $r_l['location_id']?>"><?= $r_l['location_name'] ?></option>      
                                           <?php
											}
                                           ?> 
                                           </select>  
                     </div>
                	</div>
                     
                	<div class="col-md-4"> 
                    <div class="form-group">
                	<input class="btn button_search" type="submit" value="SEARCH"/>
                     </div>
                	</div>
                    </div>
             </div>
        
		</div>

    </div> <!-- /container -->
    
</div>
</form>