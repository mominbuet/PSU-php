<div class="devices view">
<h2><?php echo __('Device'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($device['Device']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Visible Id'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_visible_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Imei'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_imei']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Phn Number'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_phn_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Last Contact'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_last_contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Last Location'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_last_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($device['Device']['version']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array(), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($device['User'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $device['User']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
	<?php echo $device['User']['user_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
	<?php echo $device['User']['password']; ?>
&nbsp;</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
	<?php echo $device['User']['first_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
	<?php echo $device['User']['last_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Msisdn'); ?></dt>
		<dd>
	<?php echo $device['User']['msisdn']; ?>
&nbsp;</dd>
		<dt><?php echo __('Device Id'); ?></dt>
		<dd>
	<?php echo $device['User']['device_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
	<?php echo $device['User']['is_active']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit User'), array('controller' => 'users', 'action' => 'edit', $device['User']['id'])); ?></li>
			</ul>
		</div>
	</div>
	