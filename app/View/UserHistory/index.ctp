<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('User History'); ?></h1>

        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <div class="row">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('user_name'); ?></th>
                                        <th><?php echo $this->Paginator->sort('time'); ?></th>
                                        <th><?php echo $this->Paginator->sort('user_event'); ?></th>
                                        <th><?php echo $this->Paginator->sort('event_details'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($devices as $device): ?>
                                    <tr>
                                        <td><?php echo h($device['UserHistory']['id']); ?>&nbsp;</td>
                                        <td><?php echo h($device['User']['user_name']); ?>&nbsp;</td>
                                        <td><?php echo h($device['UserHistory']['event_time']); ?>&nbsp;</td>
                                        <td><?php echo h($device['UserHistory']['user_event']); ?>&nbsp;</td>
                                        <td><?php echo h($device['UserHistory']['event_details']); ?>&nbsp;</td>
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

