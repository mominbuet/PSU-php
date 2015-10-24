<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('User Messages'); ?></h1>
        <?php echo $this->Html->link(__("Send Messages"), array("action" => "add"), array("class" => "btn btn-info pull-right")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All User Messages'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered" id="dataTables-example">
                            <thead>
                                <tr>
                                    <!--<th><?php // echo $this->Paginator->sort('id'); ?></th>-->
                                    <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('question_set_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('Message Subject'); ?></th>
                                    <th><?php echo $this->Paginator->sort('message_date'); ?></th>
                                    
                                    <th><?php echo $this->Paginator->sort('full_message'); ?></th>
                                    <th><?php echo $this->Paginator->sort('optional_data'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userMessages as $userMessage): ?>
                                <tr class="<?= $userMessage['UserMessage']['viewed']==1?'success':'warning'?>">
                                        <!--<td><?php // echo h($userMessage['UserMessage']['id']); ?>&nbsp;</td>-->
                                        <td>
                                            <?php echo $this->Html->link($userMessage['User']['user_name'], array('controller' => 'users', 'action' => 'view', $userMessage['User']['id'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link($userMessage['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $userMessage['QuestionSet']['id'])); ?>
                                        </td>
                                        <td><?php echo h($userMessage['UserMessage']['message_text']); ?>&nbsp;</td>
                                        <td><?php echo h($userMessage['UserMessage']['message_date']); ?>&nbsp;</td>
                                        
                                        <td><?php echo h($userMessage['UserMessage']['full_message']); ?>&nbsp;</td>
                                        <td><?php echo h($userMessage['UserMessage']['optional_data']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php //echo $this->Html->link(__('View'), array('action' => 'view', $userMessage['UserMessage']['id'])); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userMessage['UserMessage']['id']), array('class' => 'btn btn-warning')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userMessage['UserMessage']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $userMessage['UserMessage']['id'])); ?>
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

