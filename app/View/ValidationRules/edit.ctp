<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Validation Rules        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                edit Validation Rules                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('ValidationRule',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>id</label>";		echo $this->Form->input('id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>rule_name</label>";		echo $this->Form->input('rule_name',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>parent_id</label>";		echo $this->Form->input('parent_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>qsn_type_id</label>";		echo $this->Form->input('qsn_type_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
	?>
<input type="submit" class="fa fa-plus btn btn-success" value="Add/Edit"/> </form>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ValidationRule.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ValidationRule.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Validation Rules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Validation Rules'), array('controller' => 'validation_rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Validation Rule'), array('controller' => 'validation_rules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Types'), array('controller' => 'question_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Type'), array('controller' => 'question_types', 'action' => 'add')); ?> </li>
    </ul>
</div>
