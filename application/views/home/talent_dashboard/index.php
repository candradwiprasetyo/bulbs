<div class="col-md-12" style="padding:0px;" >
    
        <div class="col-md-9">
       	 	<div class="row">
                 <div class="navbar_category">
                 	<div class="container">
                    	<div class="navbar_category_menu">&nbsp;</div>
                    	<div class="navbar_category_menu">Activity</div>
                        <div class="navbar_category_menu">Profile</div>
                        <div class="navbar_category_menu">Following</div>
                        <div class="navbar_category_menu">Followers</div>
                        <div class="navbar_category_menu" style="color:#06C">Upload Work</div>
                    </div>
                 </div>
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

<section class="portfolio" id="portfolio">
 		

      
      <div class="title text-center wow animated fadeInUp">
   
<div class="grid"> <div class="portfoliocontent">
				<?php
                for($i=1;$i<=12;$i++){
					$nama_por = array(
								'',
								'Amanah Fashion',
								'Amanah Fashion',
								'Elkabumi Caraka Daya',
								'Internet Taqwa',
								'POIN Online Purchase Order Inventory Online',
								'Sapar',
								'AIA Insurance',
								'Wimbi Store',
								'Daun Pandan Catering',
								'BPM',
								'Prima Mandiri Trans',
								'Agenda Kota'
								);
					$ket_por = array(
								'',
								'Online Store',
								'Online Store',
								'Company Profile',
								'Portal Website',
								'Purchase Order Inventory Online Purchase Order Inventory Online',
								'Portal Website',
								'Event Management',
								'Online Store',
								'Restaurant and Catering Website',
								'Portal Website',
								'Truck Management',
								'Portal Website'
								);
				?>
              	
				<figure class="effect-milo <?php if($i > 10){ echo " webdesign"; }else if($i > 5){ echo " webdevelopment"; }else{ echo " desktopapp"; }?>">
				<a  class="fancybox" href="<?= base_url(); ?>assets/images/showcase/<?= $i ?>.jpg" data-fancybox-group="gallery"  title="Lorem ipsum dolor sit amet"><img src="<?= base_url(); ?>assets/images/showcase/<?= $i ?>.jpg" alt="img<?= $i ?>"/>
					<figcaption>
						
                        <div class="portofolio_putih">
                        <div class="portofolio_putih_title"><?= "Project Name Lorem Ipsum
Line 2 of Project Name" ?></div>
                       
                        
                        <div class="portofolio_kiri">by Designer Name</div>
                       
                       
						</div>
                        <span class="figure_date">13 Nov 2014</span>
						<p class="portofolio_icon">
                   
                        </p>
						
					</figcaption>	   
          	</a>
				</figure>           
                <?php
				}
			   ?>
			</div>
        </div>
            </div>
        </div>
            </section>
            <div style="clear:both;"></div>