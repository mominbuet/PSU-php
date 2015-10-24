<div class="selectDivisions view">
<h2><?php echo __('Select Division'); ?></h2>
	<dl>
		<dt><?php echo __('Division Id'); ?></dt>
		<dd>
			<?php echo h($selectDivision['SelectDivision']['division_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division Name'); ?></dt>
		<dd>
			<?php echo h($selectDivision['SelectDivision']['division_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division Code'); ?></dt>
		<dd>
			<?php echo h($selectDivision['SelectDivision']['division_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Division'), array('action' => 'edit', $selectDivision['SelectDivision']['division_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Division'), array('action' => 'delete', $selectDivision['SelectDivision']['division_id']), array(), __('Are you sure you want to delete # %s?', $selectDivision['SelectDivision']['division_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Divisions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Division'), array('action' => 'add')); ?> </li>
	</ul>
</div>
