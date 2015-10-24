<div class="selectOwnerships view">
<h2><?php echo __('Select Ownership'); ?></h2>
	<dl>
		<dt><?php echo __('Ownership Id'); ?></dt>
		<dd>
			<?php echo h($selectOwnership['SelectOwnership']['ownership_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ownership Name'); ?></dt>
		<dd>
			<?php echo h($selectOwnership['SelectOwnership']['ownership_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ownership Code'); ?></dt>
		<dd>
			<?php echo h($selectOwnership['SelectOwnership']['ownership_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Ownership'), array('action' => 'edit', $selectOwnership['SelectOwnership']['ownership_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Ownership'), array('action' => 'delete', $selectOwnership['SelectOwnership']['ownership_id']), array(), __('Are you sure you want to delete # %s?', $selectOwnership['SelectOwnership']['ownership_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Ownerships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Ownership'), array('action' => 'add')); ?> </li>
	</ul>
</div>
