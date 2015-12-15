<h2><?php echo $message; ?></h2>
<p class="error">
    <strong><?php echo __d('cake', 'Error'); ?>: </strong>
    <?php echo __d('cake', 'An Internal Error Has Occurred, it has been logged and emailed to support.<br> You can also mail to Abu Hamid(abuhamid@gmail.com).'); ?>
</p>
<?php
if (Configure::read('debug') > 0):
echo $this->element('exception_stack_trace');
endif;
?>
