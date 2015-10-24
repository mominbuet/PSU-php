<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Survey  Groups'); ?></h1>
        
        <?php echo $this->Html->link(__('Assign Survey to Group'), array('action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Survey Groups'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('question_set_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('active_from'); ?></th>
                                    <th><?php echo $this->Paginator->sort('active_to'); ?></th>
                                    <th><?php echo $this->Paginator->sort('is_active'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($questionGroups as $questionGroup): ?>
                                    <tr>
                                        
                                        <td><?php echo h($questionGroup['QuestionGroup']['id']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($questionGroup['Group']['group_name'], array('controller' => 'groups', 'action' => 'view', $questionGroup['Group']['id'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link($questionGroup['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $questionGroup['QuestionSet']['id'])); ?>
                                        </td>
                                        <td><?php echo h($questionGroup['QuestionGroup']['active_from']); ?>&nbsp;</td>
                                        <td><?php echo h($questionGroup['QuestionGroup']['active_to']); ?>&nbsp;</td>
                                        <td><?php echo h($questionGroup['QuestionGroup']['is_active']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php //echo $this->Html->link(__('View'), array('action' => 'view', $questionGroup['QuestionGroup']['id'])); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionGroup['QuestionGroup']['id']), array('class' => 'btn btn-warning')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionGroup['QuestionGroup']['id']), array('class' => 'btn btn-warning'), __('Are you sure you want to delete # %s?', $questionGroup['QuestionGroup']['id'])); ?>
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

