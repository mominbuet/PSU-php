<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['QuestionSet']['id'], array('controller' => 'question_sets', 'action' => 'view', $question['QuestionSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qsn Desc'); ?></dt>
		<dd>
			<?php echo h($question['Question']['qsn_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qsn Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['QsnType']['id'], array('controller' => 'qsn_types', 'action' => 'view', $question['QsnType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Ans Required'); ?></dt>
		<dd>
			<?php echo h($question['Question']['is_ans_required']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qsn Rules'); ?></dt>
		<dd>
			<?php echo h($question['Question']['qsn_rules']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), array(), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Sets'), array('controller' => 'question_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Set'), array('controller' => 'question_sets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qsn Types'), array('controller' => 'qsn_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qsn Type'), array('controller' => 'qsn_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
