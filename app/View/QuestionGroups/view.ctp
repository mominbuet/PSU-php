<div class="questionGroups view">
<h2><?php echo __('Question Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionGroup['QuestionGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionGroup['Group']['group_name'], array('controller' => 'groups', 'action' => 'view', $questionGroup['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionGroup['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $questionGroup['QuestionSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active From'); ?></dt>
		<dd>
			<?php echo h($questionGroup['QuestionGroup']['active_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active To'); ?></dt>
		<dd>
			<?php echo h($questionGroup['QuestionGroup']['active_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($questionGroup['QuestionGroup']['is_active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question Group'), array('action' => 'edit', $questionGroup['QuestionGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question Group'), array('action' => 'delete', $questionGroup['QuestionGroup']['id']), array(), __('Are you sure you want to delete # %s?', $questionGroup['QuestionGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Sets'), array('controller' => 'question_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Set'), array('controller' => 'question_sets', 'action' => 'add')); ?> </li>
	</ul>
</div>
