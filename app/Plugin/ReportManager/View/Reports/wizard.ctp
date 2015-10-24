
<script type="text/javascript">
    myLabelNext = "<?php echo __d('report_manager','Next',true) ?>";
    myLabelPrevious = "<?php echo __d('report_manager','Previous',true) ?>";
    myLabelFinish = "<?php echo __d('report_manager','Finish',true) ?>";
</script> 
<?php echo $this->Html->css('/ReportManager/css/report_manager'); ?>
<?php echo $this->Html->css('/ReportManager/css/smart_wizard'); ?>
<?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js')); ?>
<?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js')); ?>
<?php echo $this->Html->script(array('/ReportManager/js/jquery.smartWizard-2.0.js','/ReportManager/js/default.js')); ?>
<?php echo $this->Form->create('Report',array('target'=>'blank'));?>
<div id="wizard" class="swMain">
  <ul>
    <li><a href="#step-1">
          <label class="stepNumber">1</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 1',true); ?><br />
             <small><?php echo __d('report_manager','Select fields',true); ?></small>
          </span>
      </a></li>
    <li><a href="#step-2">
          <label class="stepNumber">2</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 2',true); ?><br />
             <small><?php echo __d('report_manager','Set the filter & Alias',true); ?></small>
          </span>
      </a></li>
    <li><a href="#step-3">
          <label class="stepNumber">3</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 3',true); ?><br />
             <small><?php echo __d('report_manager','Select order',true); ?></small>
          </span>                   
       </a></li>
    <li><a href="#step-4">
          <label class="stepNumber">4</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 4',true); ?><br />
             <small><?php echo __d('report_manager','Select style',true); ?></small>
          </span>                   
       </a></li>       
  </ul>

  <div id="step-1">   
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 1 Fields',true); ?></h2>
        <div class="reportManager index">
        <?php  
        echo $this->Element('fields_dnd_table_header',array(
            'plugin'=>'ReportManager',
            'title'=>__d('report_manager','Report Manager'),
            'sortableClass'=>'sortable1'));
        
        if ( isset($this->data[$modelClass]) ) // load from file
            $currentModelSchema = $this->data[$modelClass];
        else // new report
            $currentModelSchema = $modelSchema;
        
        echo $this->Element('fields_dnd',array(
            'plugin'=>'ReportManager',
            'modelClass'=>$modelClass,
            'modelSchema'=>$currentModelSchema));
        foreach ($associatedModelsSchema as $key => $value) {
            if ( $associatedModels[$key] == 'hasMany' || $associatedModels[$key] == 'hasAndBelongsToMany' )
                continue;
            
            if ( isset($this->data[$key]) ) // load from file
                $currentModelSchema = $this->data[$key];
            else // new report
                $currentModelSchema = $value;
            
            echo $this->Element('fields_dnd',array(
                'plugin'=>'ReportManager',
                'modelClass'=>$key,
                'modelSchema'=>$currentModelSchema));
        }
        echo $this->Element('fields_dnd_table_close',array('plugin'=>'ReportManager'));
        if ( $oneToManyOption != null ) {
            echo $this->Element('fields_dnd_table_header',array(
                'plugin'=>'ReportManager',
                'title'=>$oneToManyOption,
                'sortableClass'=>'sortable2'));
            
            if ( isset($this->data[$oneToManyOption]) ) // load from file
                $currentModelSchema = $this->data[$oneToManyOption];
            else // new report
                $currentModelSchema = $associatedModelsSchema[$oneToManyOption];
            
            echo $this->Element('fields_dnd',array(
                'plugin'=>'ReportManager',
                'modelClass'=>$oneToManyOption,
                'modelSchema'=>$currentModelSchema)
                );
            echo $this->Element('fields_dnd_table_close',array('plugin'=>'ReportManager'));
        }
        ?>

        </div>
  </div>
  <div id="step-2">
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 2 Filter',true); ?></h2> 
        <?php      
        echo $this->Element('logical_operator');
        echo $this->Element('filter',array('plugin'=>'ReportManager','modelClass'=>$modelClass,'modelSchema'=>$modelSchema));
        foreach ($associatedModelsSchema as $key => $value) {
            if ( $associatedModels[$key] != 'hasMany' && $associatedModels[$key] != 'hasAndBelongsToMany' )            
                echo $this->Element('filter',array('plugin'=>'ReportManager','modelClass'=>$key,'modelSchema'=>$value));
        }
        ?> 
  </div>                      
  <div id="step-3">
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 3 Order',true); ?></h2>   
        <?php
        echo $this->Element('order_direction');
        echo $this->Element('order',array('plugin'=>'ReportManager','modelClass'=>$modelClass,'modelSchema'=>$modelSchema));
        foreach ($associatedModelsSchema as $key => $value) {
            if ( $associatedModels[$key] != 'hasMany' && $associatedModels[$key] != 'hasAndBelongsToMany' )            
                echo $this->Element('order',array('plugin'=>'ReportManager','modelClass'=>$key,'modelSchema'=>$value));
        }
        ?> 
  </div>
  <div id="step-4">
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 4 Style',true); ?></h2>   
        <?php
        echo $this->Element('report_style',array('plugin'=>'ReportManager','oneToManyOption'=>$oneToManyOption));
        ?> 
  </div>    
</div>
<?php echo $this->Element('one_to_many_option',array('plugin'=>'ReportManager','oneToManyOption'=>$oneToManyOption)); ?> 
<?php echo $this->Form->end() ;?>