<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Devices'); ?></h1>
        <?php echo $this->Html->link(__("Add Devices"), array("action" => "add"),array("class"=>"btn btn-info pull-right")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Devices'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('device_visible_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('device_imei'); ?></th>
                                    <th><?php echo $this->Paginator->sort('device_phn_number'); ?></th>
                                    <th><?php echo $this->Paginator->sort('device_last_contact'); ?></th>
                                    <th><?php echo $this->Paginator->sort('device_last_location'); ?></th>
                                    <th><?php echo $this->Paginator->sort('version'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($devices as $device): ?>
                                <tr>
                                    <td><?php echo h($device['Device']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($device['Device']['device_visible_id']); ?>&nbsp;</td>
                                    <td><?php echo h($device['Device']['device_imei']); ?>&nbsp;</td>
                                    <td><?php echo h($device['Device']['device_phn_number']); ?>&nbsp;</td>
                                    <td><?php echo h($device['Device']['device_last_contact']); ?>&nbsp;</td>
                                    <td><?php echo h($device['Device']['device_last_location']); ?>&nbsp;</td>
                                    <td><?php echo h($device['Device']['version']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php //echo $this->Html->link(__('View'), array('action' => 'view', $device['Device']['id'])); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $device['Device']['id']),array('class'=>'btn btn-warning')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $device['Device']['id']), array('class'=>'btn btn-danger'), __('Are you sure you want to delete # %s?', $device['Device']['id'])); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <p>
                            <?php
                            echo $this->Paginator->counter(array(
                            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                            ));
                            ?>                        </p>
                        <div class="paging">
                            <?php
                            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                            echo $this->Paginator->numbers(array('separator' => ''));
                            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

