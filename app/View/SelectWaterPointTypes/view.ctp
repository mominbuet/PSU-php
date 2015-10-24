<div class="selectWaterPointTypes view">
<h2><?php echo __('Select Water Point Type'); ?></h2>
	<dl>
		<dt><?php echo __('Water Point Type Id'); ?></dt>
		<dd>
			<?php echo h($selectWaterPointType['SelectWaterPointType']['water_point_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Water Point Type Name'); ?></dt>
		<dd>
			<?php echo h($selectWaterPointType['SelectWaterPointType']['water_point_type_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Water Point Type Codes'); ?></dt>
		<dd>
			<?php echo h($selectWaterPointType['SelectWaterPointType']['water_point_type_codes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Water Point Type'), array('action' => 'edit', $selectWaterPointType['SelectWaterPointType']['water_point_type_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Water Point Type'), array('action' => 'delete', $selectWaterPointType['SelectWaterPointType']['water_point_type_id']), array(), __('Are you sure you want to delete # %s?', $selectWaterPointType['SelectWaterPointType']['water_point_type_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Water Point Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Water Point Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
