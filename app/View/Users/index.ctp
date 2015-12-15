
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Users'); ?>
            <?php
            echo $this->Html->link(__('Add User'), array('action' => 'add'), array('class' => 'btn btn-info pull-right'));
            ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="panel-heading">
                <?php echo __('All Users'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('user_name'); ?></th>
                                    <!--<th><?php //echo $this->Paginator->sort('password');  ?></th>-->
                                    <th><?php echo $this->Paginator->sort('first_name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('last_name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('msisdn'); ?></th>
                                    <th>User Type</th>
                                    <th>Groups Assigned</th>
                                    <th>Survey Entries</th>
                                    <th><?php echo $this->Paginator->sort('is_active'); ?></th>
                                    <th><?php echo $this->Paginator->sort('created_by'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <!-- td><?php echo h($user['User']['id']); ?>&nbsp;</td -->
                                    <td><?php echo h($user['User']['user_name']); ?>&nbsp;</td>
                                    <!--                                        <td><?php //echo h($user['User']['password']);  ?>&nbsp;</td>-->
                                    <td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
                                    <td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
                                    <td><?php echo h($user['User']['msisdn']); ?>&nbsp;</td>
                                    <td><?php echo (h($user['User']['superuser']) == 1) ? "Super User" : "General" ; ?>&nbsp;</td>
                                    <td><?= sizeof($user['UserGroup']) ?></td>
                                    <td><?= sizeof($user['UsersQuestionData']) ?></td>
                                    <td><?php echo h($user['User']['is_active']); ?>&nbsp;</td>
                                    
                                    <td><?php echo h($user['CreatedBy']['first_name']." ".$user['CreatedBy']['last_name']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php // echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                                        
                                        <?php if ($this->Session->read('Auth.User.User.superuser') == '1' || $this->Session->read('Auth.User.User.id')==$user['User']['created_by']): ?>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class' => 'btn btn-sm btn-warning')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class' => 'btn btn-sm btn-danger'), __('This will delete the group assignment of %s!', $user['User']['user_name']));
                                        ?>
                                        <?php endif; ?>
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

