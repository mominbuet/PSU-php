<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('User History'); ?></h1>

        <!-- /.col-lg-12 -->
    </div>
    <div class="row" style="padding-bottom: 20px">
    
        <?php
    echo $this->Form->create(null, array('url' => array('controller'=>'UserHistory','action'=>'index'),"type" => "get",'class' => 'form-horizontal'));
    echo '<div class="col-lg-12">';

    echo '<div class="col-lg-3"><label>Select User</label>';
    echo $this->Form->input('user_name', array('label' => false, 'default' => $set_user_name, 'type' => 'select', 'options' => $users, 'class' => 'form-control', 'empty' => 'Select User'));
    echo '</div></div><div class="col-lg-12">';
    echo '<div class="col-lg-3  "><label>Date from</label>';
    echo $this->Form->input('time_from', array('label' => false, 'type' => 'text', 'default' => $set_time_from, 'class' => 'form-control datepicker',));
    echo '</div><div class="col-lg-3 col-lg-offset-2 "><label>Date to</label>';
    echo $this->Form->input('time_to', array('label' => false, 'type' => 'text', 'default' => $set_time_to, 'class' => 'form-control datepicker',));
    
    echo '</div></div><div class="col-lg-12" style="padding-top:10px">';
    echo $this->Form->submit(__('Submit'), array('style'=>'padding-top:10px;','class' => "fa fa-plus btn btn-success col-lg-offset-7"));
    echo '</div>';
    echo $this->Form->end();
    ?>

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
                                        <th><?php echo $this->Paginator->sort('ipaddress'); ?></th>
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
                                        
                                        <td><a href="http://www.infosniper.net/index.php?ip_address=<?php echo $device['UserHistory']['ipaddress']?>&map_source=1&overview_map=1&lang=1&map_type=1&zoom_level=7" target="_blank">
                                                <?php echo h($device['UserHistory']['ipaddress']); ?></a></td>
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

