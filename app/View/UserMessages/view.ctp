<div class="userMessages view">
<h2><?php echo __('User Message'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userMessage['UserMessage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userMessage['User']['user_name'], array('controller' => 'users', 'action' => 'view', $userMessage['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userMessage['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $userMessage['QuestionSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message Text'); ?></dt>
		<dd>
			<?php echo h($userMessage['UserMessage']['message_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message Date'); ?></dt>
		<dd>
			<?php echo h($userMessage['UserMessage']['message_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Optional Data'); ?></dt>
		<dd>
			<?php echo h($userMessage['UserMessage']['optional_data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Message'); ?></dt>
		<dd>
			<?php echo h($userMessage['UserMessage']['full_message']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Message'), array('action' => 'edit', $userMessage['UserMessage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Message'), array('action' => 'delete', $userMessage['UserMessage']['id']), array(), __('Are you sure you want to delete # %s?', $userMessage['UserMessage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Message'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Sets'), array('controller' => 'question_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Set'), array('controller' => 'question_sets', 'action' => 'add')); ?> </li>
	</ul>
</div>
