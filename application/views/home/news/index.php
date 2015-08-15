

<div class="col-md-12">
    <div class="row">
        <div class="project_desc">
            <div class="container">
                <div class="col-md-12">
                
                	
                             <div class="col-md-12" >
                                 <div class="row">
                                   <div class="profile_name" style="margin-bottom:10px;">Featured Posts</div>
                                  </div>
                             </div>
                   
                       
                        
                    <div class="row">
                        <div class="col-md-6">
                               <img src="<?= base_url(); ?>assets/images/project2.jpg" style="width:100%;" />
                        </div>

                        <div class="col-md-6">
                           
                            <div class="news_date"><strong>Workshop</strong> Published on 13 Ju</div>
                             <div class="profile_name">Fashion Photography Workshop
with Andre Wiredja</div>
                                <div class="profile_location">&nbsp;</div>
                               
                                <div class="profile_description_content">
                                                   Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid
            eatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re
            mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio
            vel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus
            magnia delen pro con.
                                </div>
                                <div  class="blue_text">Read More</div>
                        </div>

                    </div>
                </div>

                <div style="clear:both; height:30px;"></div>

               

            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="project_desc">
            <div class="container">
               
                         <div class="form-group">
                             <div class="col-md-12" >
                                
                                   <div class="profile_name">Recent Posts</div>
                                   
                             </div>
                        </div>
      
      
    <div class="col-md-12" ><div class="row">
<div class="grid" style="text-align:left !important"> <div class="portfoliocontent">
                <?php
                for($i=1;$i<=8;$i++){
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
                
                <figure class="effect-milo <?php if($i > 10){ echo " webdesign"; }else if($i > 5){ echo " webdevelopment"; }else{ echo " desktopapp"; }?>" style="width:22% !important; height:280px !important;">
                <a  class="fancybox" href="<?= base_url(); ?>assets/images/showcase/<?= $i ?>.jpg" data-fancybox-group="gallery"  title="Lorem ipsum dolor sit amet"><img src="<?= base_url(); ?>assets/images/showcase/<?= $i ?>.jpg" alt="img<?= $i ?>"/>
                    <figcaption>
                        
                        <div class="portofolio_putih">
                        <div class="portofolio_putih_title"><?= "Project Name Lorem Ipsum
Line 2 of Project Name" ?></div>
                       
                        
                        <div class="portofolio_kiri">In Event</div>
                        <div class="portofolio_kanan">13 June</div>
                       
                       
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

            
        
           
            <div style="clear:both; height:50px;"></div>
   </div>
</div>
                
            </div>
        </div>
    </div>
</div>