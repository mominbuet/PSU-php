<div class="selectUnions view">
<h2><?php echo __('Select Union'); ?></h2>
	<dl>
		<dt><?php echo __('Union Id'); ?></dt>
		<dd>
			<?php echo h($selectUnion['SelectUnion']['union_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Name'); ?></dt>
		<dd>
			<?php echo h($selectUnion['SelectUnion']['union_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Select Upzilla'); ?></dt>
		<dd>
			<?php echo $this->Html->link($selectUnion['SelectUpzilla']['upzilla_name'], array('controller' => 'select_upzillas', 'action' => 'view', $selectUnion['SelectUpzilla']['upzilla_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Code'); ?></dt>
		<dd>
			<?php echo h($selectUnion['SelectUnion']['union_code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Select Union'), array('action' => 'edit', $selectUnion['SelectUnion']['union_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Select Union'), array('action' => 'delete', $selectUnion['SelectUnion']['union_id']), array(), __('Are you sure you want to delete # %s?', $selectUnion['SelectUnion']['union_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Unions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Union'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Select Upzillas'), array('controller' => 'select_upzillas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Upzilla'), array('controller' => 'select_upzillas', 'action' => 'add')); ?> </li>
	</ul>
</div>
