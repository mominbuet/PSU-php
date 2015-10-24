<div class="selectVillages view">
<h2><?php echo __('Select Village'); ?></h2>
	<dl>
		<dt><?php echo __('Village Id'); ?></dt>
		<dd>
			<?php echo h($selectVillage['SelectVillage']['village_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Village Name'); ?></dt>
		<dd>
			<?php echo h($selectVillage['SelectVillage']['village_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Village Code'); ?></dt>
		<dd>
			<?php echo h($selectVillage['SelectVillage']['village_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Select Union'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectVillage['SelectUnion']['union_name'], array('controller' => 'select_unions', 'action' => 'view', $selectVillage['SelectUnion']['union_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Village'), array('action' => 'edit', $selectVillage['SelectVillage']['village_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Village'), array('action' => 'delete', $selectVillage['SelectVillage']['village_id']), array(), __('Are you sure you want to delete # %s?', $selectVillage['SelectVillage']['village_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Villages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Village'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Unions'), array('controller' => 'select_unions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Union'), array('controller' => 'select_unions', 'action' => 'add')); ?> </li>
	</ul>
</div>
