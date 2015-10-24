<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $questionSet['QuestionSet']['qsn_set_name']; ?></h1>

        
<?php // echo $this->Html->link(__('Edit Question Set'), array('action' => 'edit', $questionSet['QuestionSet']['id']),array('class'=>'btn btn-success pull-right')); ?> 
<?php echo $this->Html->link(__('All Sets'), array('action' => 'index'),array('class'=>'btn btn-info pull-right')); ?> 
<?php echo $this->Html->link(__('Questions'), array('controller'=>'Questions','action' => 'index',$questionSet['QuestionSet']['id']),
        array('class'=>'btn btn-warning pull-right')); ?> 
        <?php echo $this->Form->postLink(__('Delete Survey'), array('action' => 'delete', $questionSet['QuestionSet']['id']), 
                array('class'=>'btn btn-danger pull-right')
                , __('Are you sure you want to delete # %s?', $questionSet['QuestionSet']['id'])); ?> 
    </div>
    <!-- /.col-lg-12 -->
</div>
<h2><?php echo __('Details'); ?></h2>
<dl>
    <dt><?php echo __('Id'); ?></dt>
    <dd>
			<?php echo h($questionSet['QuestionSet']['id']); ?>
        &nbsp;
    </dd>
    <dt><?php echo __('Qsn Set Name'); ?></dt>
    <dd>
			<?php echo h($questionSet['QuestionSet']['qsn_set_name']); ?>
        &nbsp;
    </dd>
    <dt><?php echo __('Qsn Set Detail'); ?></dt>
    <dd>
			<?php echo h($questionSet['QuestionSet']['qsn_set_detail']); ?>
        &nbsp;
    </dd>
</dl>
</div>
