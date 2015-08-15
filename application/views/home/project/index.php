<div class="col-md-12" style="padding:0px;" >
      <img src="<?= base_url(); ?>assets/images/project.jpg" class="img_banner_project">
</div>

<div class="col-md-12">
    <div class="row">
        <div class="project_desc">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                                <div class="profile_name">Tanamera Coffee Serpong</div>
                                <div class="profile_location">by Aldo Felix Studio</div>
                                <div class="profile_description_title">Project Info</div>
                                <div class="profile_description_content">
                                                   Aldo Felix Studio is a consultancy ore di culpa nonem. Cuptaque pelita veribusam volorrum vollam, nam id unturit, vid
            eatio. Lore milit voluptat arum re lam quate volum quiatis et arum harioreris a dolume remperi simet re, net lametur re
            mosandem int pro con eaquodipsus volor atum fuga. Otatet quaepel igentia nitas maionse quatqui ducidi doluptatio
            vel id etur maiores exerero rescipsandam am ra quat. Alistiis dolupta tecupta tiuntotatiae nonse doloris moluptatus
            magnia delen pro con.
                                </div>
                        </div>

                        <div class="col-md-3">
                            <div class="profile_name">&nbsp;</div>
                            <div class="profile_location">Published on May 19, 2015</div>
                            <div class="profile_description_title">Project Concentrations</div>
                            <div class="profile_description_content">
                                <div>
                                    <div class="circle_project" style="background-color:#d05a51"></div>Interior Design
                                </div>
                                <div>
                                    <div class="circle_project" style="background-color:#92a495"></div>Architecture
                                </div>
                                <div>
                                    <div class="circle_project" style="background-color:#3a58db"></div>Graphic Design
                                </div>
                                <span class="blue_text">Show All</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div style="clear:both; height:30px;"></div>

                 <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                            <img src="<?= base_url(); ?>assets/images/project2.jpg" class="img_banner_project">
                        </div>
                     </div>
                </div>

                 <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                    
                            <img src="<?= base_url(); ?>assets/images/project3.jpg" class="img_banner_project">
                        </div>
                    </div>
                </div>

                 <div style="clear:both; height:50px;"></div>



            </div>
        </div>
    </div>
</div>

<div class="col-md-12" style="padding:0px;" >
   
        <div class="project_view_profile_page">
            <div class="container">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <div class="row">
                            <img src="<?= base_url(); ?>assets/images/profile_photo.jpg" class="project_view_photo">
                            </div>
                        </div>
                        <div class="col-md-11">
                           
                                <div class="profile_name">Aldo Felix Studio</div>
                                <div class="profile_location" style="margin-bottom:10px;">Jakarta – Indonesia</div>
                                <div class="blue_text">View Full Profile </div>
                               
                        </div>

                    </div>
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
                                
                                   <div class="profile_name">Related Projects</div>
                                   
                             </div>
                        </div>
      
      
    <div class="col-md-12" ><div class="row">
<div class="grid" style="text-align:left !important"> <div class="portfoliocontent">
                <?php
                for($i=1;$i<=4;$i++){
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
                
                <figure class="effect-milo <?php if($i > 10){ echo " webdesign"; }else if($i > 5){ echo " webdevelopment"; }else{ echo " desktopapp"; }?>" style="width:22.7% !important">
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

            
        
           
            <div style="clear:both; height:50px;"></div>
   </div>
</div>
                
            </div>
        </div>
    </div>
</div>