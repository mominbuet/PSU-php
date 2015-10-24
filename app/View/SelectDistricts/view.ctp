<div class="selectDistricts view">
<h2><?php echo __('Select District'); ?></h2>
	<dl>
		<dt><?php echo __('District Id'); ?></dt>
		<dd>
			<?php echo h($selectDistrict['SelectDistrict']['district_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District Name'); ?></dt>
		<dd>
			<?php echo h($selectDistrict['SelectDistrict']['district_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Select Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectDistrict['SelectDivision']['division_name'], array('controller' => 'select_divisions', 'action' => 'view', $selectDistrict['SelectDivision']['division_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District Code'); ?></dt>
		<dd>
			<?php echo h($selectDistrict['SelectDistrict']['district_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select District'), array('action' => 'edit', $selectDistrict['SelectDistrict']['district_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select District'), array('action' => 'delete', $selectDistrict['SelectDistrict']['district_id']), array(), __('Are you sure you want to delete # %s?', $selectDistrict['SelectDistrict']['district_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Districts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select District'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Divisions'), array('controller' => 'select_divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Division'), array('controller' => 'select_divisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
