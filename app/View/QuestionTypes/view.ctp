<div class="qsnTypes view">
<h2><?php echo __('Qsn Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qsnType['QsnType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qsn Type'); ?></dt>
		<dd>
			<?php echo h($qsnType['QsnType']['qsn_type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Qsn Type'), array('action' => 'edit', $qsnType['QsnType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Qsn Type'), array('action' => 'delete', $qsnType['QsnType']['id']), array(), __('Are you sure you want to delete # %s?', $qsnType['QsnType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Qsn Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qsn Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($qsnType['Question'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Qsn Set Id'); ?></th>
		<th><?php echo __('Qsn Desc'); ?></th>
		<th><?php echo __('Qsn Type Id'); ?></th>
		<th><?php echo __('Is Ans Required'); ?></th>
		<th><?php echo __('Qsn Rules'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($qsnType['Question'] as $question): ?>
		<tr>
			<td><?php echo $question['id']; ?></td>
			<td><?php echo $question['qsn_set_id']; ?></td>
			<td><?php echo $question['qsn_desc']; ?></td>
			<td><?php echo $question['qsn_type_id']; ?></td>
			<td><?php echo $question['is_ans_required']; ?></td>
			<td><?php echo $question['qsn_rules']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'questions', 'action' => 'view', $question['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'questions', 'action' => 'edit', $question['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'questions', 'action' => 'delete', $question['id']), array(), __('Are you sure you want to delete # %s?', $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
