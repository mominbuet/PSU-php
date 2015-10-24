<div class="usersQuestionData view">
<h2><?php echo __('Users Question Data'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersQuestionData['User']['user_name'], array('controller' => 'users', 'action' => 'view', $usersQuestionData['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Visible Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['group_visible_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Set'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersQuestionData['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $usersQuestionData['QuestionSet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Lat'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['geo_lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Lon'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['geo_lon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['division_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['district_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thana Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['thana_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['union_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Insert Time'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['insert_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Insert User Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['insert_user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Form Id'); ?></dt>
		<dd>
			<?php echo h($usersQuestionData['UsersQuestionData']['user_form_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Question Data'), array('action' => 'edit', $usersQuestionData['UsersQuestionData']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Question Data'), array('action' => 'delete', $usersQuestionData['UsersQuestionData']['id']), array(), __('Are you sure you want to delete # %s?', $usersQuestionData['UsersQuestionData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Question Data'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Question Data'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Sets'), array('controller' => 'question_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Set'), array('controller' => 'question_sets', 'action' => 'add')); ?> </li>
	</ul>
</div>
