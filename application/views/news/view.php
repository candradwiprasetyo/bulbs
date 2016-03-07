<div class="col-md-12" style="padding:0px;" >
      <img src="<?= base_url(); ?>assets/images/news/<?= $data_news['news_img'] ?>" class="img_banner_project">
</div>

<div class="col-md-12">
    <div class="row">
        <div class="project_desc" style="background:#fff;">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9">
                                <div class="profile_name"><?= $data_news['news_name'] ?></div>
                                <div class="profile_location">by <?= $data_news['user_first_name']." ".$data_news['user_last_name'] ?></div>
                                <div class="profile_description_title">Project Info</div>
                                <div class="profile_description_content">
                               <?= $data_news['news_description'] ?>
                                </div>
                                 <a href="javascript: history.back()" class="btn btn-primary">Back</a>
                        </div>

                        <div class="col-md-3">
                            <div class="profile_name">&nbsp;</div>
                            <div class="profile_location">Published on <?php echo $this->access->format_date($data_news['news_date']);  ?></div>
                            <!--<div class="profile_description_title">Posted In News</div>-->
                            <div class="profile_description_content">
                              
                            </div>
                        </div>

                    </div>
                </div>

                <div style="clear:both; height:30px;"></div>
				<!--
                 <div class="form-group">
                     <div class="row">
                        <div class="col-md-12">
                            <img src="<?= base_url(); ?>assets/images/project2.jpg" class="img_banner_project">
                        </div>
                     </div>
                </div>

                -->

                 <div style="clear:both; height:50px;"></div>



            </div>
        </div>
    </div>
</div>
