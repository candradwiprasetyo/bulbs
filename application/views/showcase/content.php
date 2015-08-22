<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-3">
       	 	<div class="row">
                <select name="i_type" size="1" class="form-control select_search category_search new_select" placeholder="test"/>
                     <option value="1">Concentration</option>
                     <option value="2">Graphic Design</option>    
                      <option value="2">Photography</option>  
                      <option value="2">Design Interior</option>            
                 </select> 
             </div> 
        </div>
        <div class="col-md-3">
       	 	<div class="row">
                <select name="i_type" size="1" class="form-control select_search category_search new_select"/>
                     <option value="1">Location</option>
                     <option value="2">Jakarta</option>       
                     <option value="2">Bandung</option>       
                     <option value="2">Surabaya</option>       
                 </select> 
             </div> 
        </div>
         <div class="col-md-3">
       	 	<div class="row">
                <select name="i_type" size="1" class="form-control select_search category_search new_select"/>
                     <option value="1">Sort By</option>
                     <option value="2">Feature</option>       
                     <option value="2">Most Recommended</option>
                     <option value="2">Most Resent</option>       
                            
                 </select> 
             </div> 
        </div>
         <div class="col-md-3">
       	 	<div class="row">
                 <input required type="text" name="i_name" class="form-control category_search" placeholder="Search" value="" title="" style="padding-top:24px; padding-bottom:24px;"/>
             </div> 
        </div>
     
</div>




<div style="clear:both"></div>
<br />

<div class="container" >
  <?php
                $q_p  = mysql_query("select a.*, b.creative_wp_name
									from projects a 
									join creatives b on b.creative_id = a.creative_id
									join users c on c.user_id = b.user_id
									
									
									order by project_id");
				while($r_p = mysql_fetch_array($q_p)){ 
                ?>
                <a href="<?=site_url('project/view/'.$r_p['project_id'])?>">
                    <div class="box-showcase2">
                        <div class="box-showcaseInner">
                            <img src="<?= base_url(); ?>assets/images/project/<?= $r_p['project_img'] ?>" />
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