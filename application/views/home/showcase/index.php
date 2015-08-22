<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-3">
       	 	<div class="row">
                <select name="i_type" size="1" class="form-control select_search category_search" placeholder="test"/>
                     <option value="1">Concentration</option>
                     <option value="2">Graphic Design</option>    
                      <option value="2">Photography</option>  
                      <option value="2">Design Interior</option>            
                 </select> 
             </div> 
        </div>
        <div class="col-md-3">
       	 	<div class="row">
                <select name="i_type" size="1" class="form-control select_search category_search"/>
                     <option value="1">Location</option>
                     <option value="2">Jakarta</option>       
                     <option value="2">Bandung</option>       
                     <option value="2">Surabaya</option>       
                 </select> 
             </div> 
        </div>
         <div class="col-md-3">
       	 	<div class="row">
                <select name="i_type" size="1" class="form-control select_search category_search"/>
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
for($is=1;$is<=12;$is++){
?>
    <div class="box-showcase">
        <div class="box-showcaseInner">
            <img src="<?= base_url(); ?>assets/images/showcase/<?= $is ?>.jpg" />
            <div class="titlebox-showcase">An old greenhouse</div>
        </div>
        <div class="box-showcaseDesc">
             <div class="box-showcaseDesc_name">Project Name Project Name Project Name Project Name Project Name</div>
            <div class="box-showcaseDesc_by">By Designer</div>
        </div>
    </div>
<?php
}
?>  

</div>