<ol>
<?php 
if (!empty($message) and (is_array($message)))
 foreach ($message as $message):
?>
    <li><?= $message->message ?></li>
<?php endforeach ?>
</ol>