<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User Messages        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                edit User Messages                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('UserMessage',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>id</label>";		echo $this->Form->input('id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>user_id</label>";		echo $this->Form->input('user_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>question_set_id</label>";		echo $this->Form->input('question_set_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>message_text</label>";		echo $this->Form->input('message_text',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>message_date</label>";		echo $this->Form->input('message_date',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>optional_data</label>";		echo $this->Form->input('optional_data',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>full_message</label>";		echo $this->Form->input('full_message',array('label' => false,'class' => 'form-control'));
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

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserMessage.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UserMessage.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List User Messages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Sets'), array('controller' => 'question_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Set'), array('controller' => 'question_sets', 'action' => 'add')); ?> </li>
    </ul>
</div>
