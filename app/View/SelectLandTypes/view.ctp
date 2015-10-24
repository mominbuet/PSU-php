<div class="selectLandTypes view">
<h2><?php echo __('Select Land Type'); ?></h2>
	<dl>
		<dt><?php echo __('Land Use Id'); ?></dt>
		<dd>
			<?php echo h($selectLandType['SelectLandType']['land_use_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land Use Name'); ?></dt>
		<dd>
			<?php echo h($selectLandType['SelectLandType']['land_use_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land Use Code'); ?></dt>
		<dd>
			<?php echo h($selectLandType['SelectLandType']['land_use_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Land Type'), array('action' => 'edit', $selectLandType['SelectLandType']['land_use_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Land Type'), array('action' => 'delete', $selectLandType['SelectLandType']['land_use_id']), array(), __('Are you sure you want to delete # %s?', $selectLandType['SelectLandType']['land_use_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Land Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Land Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
