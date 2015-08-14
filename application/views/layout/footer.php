

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/docs.min.js') ?>"></script>
    
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
      </script>
      
  </body>
</html>
