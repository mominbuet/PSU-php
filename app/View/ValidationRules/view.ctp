<div class="validationRules view">
<h2><?php echo __('Validation Rule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($validationRule['ValidationRule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rule Name'); ?></dt>
		<dd>
			<?php echo h($validationRule['ValidationRule']['rule_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Validation Rule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($validationRule['ParentValidationRule']['rule_name'], array('controller' => 'validation_rules', 'action' => 'view', $validationRule['ParentValidationRule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($validationRule['QuestionType']['qsn_type'], array('controller' => 'question_types', 'action' => 'view', $validationRule['QuestionType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Validation Rule'), array('action' => 'edit', $validationRule['ValidationRule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Validation Rule'), array('action' => 'delete', $validationRule['ValidationRule']['id']), array(), __('Are you sure you want to delete # %s?', $validationRule['ValidationRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Validation Rules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Validation Rule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Validation Rules'), array('controller' => 'validation_rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Validation Rule'), array('controller' => 'validation_rules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Types'), array('controller' => 'question_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Type'), array('controller' => 'question_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Validation Rules'); ?></h3>
	<?php if (!empty($validationRule['ChildValidationRule'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Rule Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Qsn Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($validationRule['ChildValidationRule'] as $childValidationRule): ?>
		<tr>
			<td><?php echo $childValidationRule['id']; ?></td>
			<td><?php echo $childValidationRule['rule_name']; ?></td>
			<td><?php echo $childValidationRule['parent_id']; ?></td>
			<td><?php echo $childValidationRule['qsn_type_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'validation_rules', 'action' => 'view', $childValidationRule['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'validation_rules', 'action' => 'edit', $childValidationRule['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'validation_rules', 'action' => 'delete', $childValidationRule['id']), array(), __('Are you sure you want to delete # %s?', $childValidationRule['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Validation Rule'), array('controller' => 'validation_rules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
