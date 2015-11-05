<!DOCTYPE html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript"> 
$(document).ready(function() {
    $('#submit').click(function() {
alert('test');
/*


        var msg = $('#message').val();

        $.post("<?= site_url('message_tmp') ?>", {message: msg}, function() {
            $('#content').load("<?= site_url('message_tmp/view/ajax') ?>");
            $('#message').val('');
        });*/
    });
});
</script>
</head>
<body>
<div id="form">    
    <?php echo form_open('message_tmp/add'); ?>
    <input type="text" id="message" name="message" />
    <?php echo form_submit('submit', 'Update', "class='button'"); ?>
    <?php echo form_close(); ?>
</div>
 <br />
 <br />
<div id="content">
<?php $this->load->view('message_tmp/message_list') ?>   
</div>

</body>
</html>