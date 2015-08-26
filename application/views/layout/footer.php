</div>

<div class="col-md-12" style="padding:0px; ">
<div class="col-md-9" style="padding:0px; ">
<div class="navbar navbar-default navbar-static-top" role="navigation" style="height:60px !important; min-height:60px !important; background:#2a5da8 !important; font-family:'Roboto-Regular'">
      
        <div class="navbar-header">
          <a class="navbar-brand footer-copyright" href="<?=site_url('')?>">COPYRIGHT 2015 8BULBS. ALL RIGHTS RESERVED</a>
        </div>
        <div class="navbar-collapse collapse " style="float:right">
         
         <ul class="nav navbar-nav ">
         <?php
         $q_fm = mysql_query("select * from pages");
		 while($r_fm = mysql_fetch_array($q_fm)){
		 ?>
            <li><a href="<?=site_url("footer_menu/?id=".$r_fm['page_id'])?>" class="footer-menu"><?= $r_fm['page_name']?></a></li>
          
            <?php
		 	}
			?>
          </ul>
          
        </div><!--/.nav-collapse -->
     
    </div>
</div>

<div class="col-md-3" style="padding:0px;">
	<div class="navbar navbar-default navbar-static-top" role="navigation" style="background:#477cbd; height:60px !important; min-height:60px !important;">
     
         <a href="#"><div class="footer-icon" style="margin-left:30px;">FB</div></a>
         <a href="#"><div class="footer-icon">TW</div></a>
         <a href="#"><div class="footer-icon">IG</div></a>
     
    </div>
</div>
</div>

<div style="clear:both;"></div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/docs.min.js') ?>"></script>
    <!-- select -->
	<script type="text/javascript" src="<?= base_url('assets/js/select/bootstrap-select.js') ?>"></script>
   
    
    <!-- slider -->
    
    <!-- FlexSlider -->
	  <script defer src="<?= base_url('assets/js/slider/jquery.flexslider.js') ?>"></script>
    
      <script type="text/javascript">
        $(function(){
          SyntaxHighlighter.all();
        });
        $(window).load(function(){
          $('.flexslider').flexslider({
            animation: "slider",
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
		
		$('.btn-toggle').click(function() {
			$(this).find('.btn').toggleClass('active');  
			
			if ($(this).find('.btn-primary').size()>0) {
				$(this).find('.btn').toggleClass('btn-primary');
			}
			if ($(this).find('.btn-danger').size()>0) {
				$(this).find('.btn').toggleClass('btn-danger');
			}
			if ($(this).find('.btn-success').size()>0) {
				$(this).find('.btn').toggleClass('btn-success');
			}
			if ($(this).find('.btn-info').size()>0) {
				$(this).find('.btn').toggleClass('btn-info');
			}
			
			$(this).find('.btn').toggleClass('btn-default');
			   
		});
		
		
		
      </script>
      
  </body>
</html>
