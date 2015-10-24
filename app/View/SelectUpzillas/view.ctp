<div class="selectUpzillas view">
<h2><?php echo __('Select Upzilla'); ?></h2>
	<dl>
		<dt><?php echo __('Upzilla Id'); ?></dt>
		<dd>
			<?php echo h($selectUpzilla['SelectUpzilla']['upzilla_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upzilla Name'); ?></dt>
		<dd>
			<?php echo h($selectUpzilla['SelectUpzilla']['upzilla_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Select District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectUpzilla['SelectDistrict']['district_name'], array('controller' => 'select_districts', 'action' => 'view', $selectUpzilla['SelectDistrict']['district_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($selectUpzilla['SelectUpzilla']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upzilla Code'); ?></dt>
		<dd>
			<?php echo h($selectUpzilla['SelectUpzilla']['upzilla_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Upzilla'), array('action' => 'edit', $selectUpzilla['SelectUpzilla']['upzilla_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Upzilla'), array('action' => 'delete', $selectUpzilla['SelectUpzilla']['upzilla_id']), array(), __('Are you sure you want to delete # %s?', $selectUpzilla['SelectUpzilla']['upzilla_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Upzillas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Upzilla'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Districts'), array('controller' => 'select_districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select District'), array('controller' => 'select_districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
