
<script type="text/javascript">
    firstLevel = "<?php echo Router::url('/'); ?>";
</script>
<?php

?>
<?php // echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js')); ?>
<?php echo $this->Html->script('/ReportManager/js/index.js'); ?>
<?php echo $this->Html->css('/ReportManager/css/report_manager'); ?>
<div class="reportManager index">
    <h2><?php echo __d('report_manager','Report Manager',true);?></h2>
    <?php
        
        echo '<div id="repoManLeftCol" class="col-lg-4">';
        echo $this->Form->create('ReportManager',array('class'=>'form-horizontal'));
        echo '<fieldset>';
        echo '<legend>'. __d('report_manager','New report',true). '</legend>';        
        echo $this->Form->input('model',array(
            'type'=>'select',  
            'class'=>'form-control',
            'label'=>__d('report_manager','Model',true),
            'options'=>$models,
            'empty'=>__d('report_manager','--Select--',true)
            ));
        
        echo '<div id="ReportManagerOneToManyOptionSelect">';
        echo $this->Form->input('one_to_many_option',array(
            'type'=>'select',
            'class'=>'form-control',
            'label'=>__d('report_manager','Relation',true),
            'options'=>array(),
            'empty'=>__d('report_manager','<None>',true)
            ));
        echo '</div>';
        echo $this->Form->input('new',array(
            'type'=>'hidden',
            'value'=>'1'
            ));        
        echo '</fieldset>';
        echo $this->Form->submit(__d('report_manager','New',true),array('name'=>'new' ,'class'=>'btn btn-primary pull-right'));
        echo $this->Form->end();
        echo '</div>';
        
        echo '<div id="repoManMiddleCol">';
        
        echo $this->Html->tag('h2',__d('report_manager','OR',true));
        
        echo '</div>';
        
        echo '<div id="repoManRightCol" class="col-lg-6">';
        echo $this->Form->create('ReportManager',array('class'=>'form-horizontal'));
        echo '<fieldset>';
        echo '<legend>' . __d('report_manager','Load report',true) . '</legend>';        
        
        echo '<div id="ReportManagerSavedReportOptionContainer">';
        echo $this->Form->input('saved_report_option',array(
            'type'=>'select',
            'label'=>__d('report_manager','Saved reports',true),
            'options'=>$files,
            'class'=>'form-control',
            'empty'=>__d('report_manager','--Select--',true)
            ));
        echo '</div>';
        echo $this->Form->input('load',array(
            'type'=>'hidden',
            'value'=>'1'
            ));        
        echo '<button class="btn btn-danger deleteReport2" type="button" >' . __d('report_manager','Delete',true) . '</button>';
        echo '</fieldset>';
        echo $this->Form->submit(__d('report_manager','Load',true),array('name'=>'load','class'=>'btn btn-primary pull-right'));
        echo $this->Form->end();
        echo '</div>';
    ?>
</div>