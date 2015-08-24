<?php
$q_fmp = mysql_query("select * from pages where page_id = '".$_GET['id']."'");
$r_fmp = mysql_fetch_array($q_fmp);
?>
<div class="container">
	<div class="row">
         <div class="col-md-12">
         <br />
            <div class="new_title"><?= $r_fmp['page_name']?></div>
          </div>
    </div>
    <div class="row">
         <div class="col-md-12">
      		<?= $r_fmp['page_content'] ?>
         </div>
     </div>
     
</div>