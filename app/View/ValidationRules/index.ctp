<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Validation Rules'); ?></h1>
        <?php echo $this->Html->link(__("Add Validation Rules"), array("action" => "add"), array("class" => "btn btn-info pull-right")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Validation Rules'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('rule_name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('parent_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('qsn_type_id'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($validationRules as $validationRule): ?>
                                    <tr>
                                        <td><?php echo h($validationRule['ValidationRule']['id']); ?>&nbsp;</td>
                                        <td><?php echo h($validationRule['ValidationRule']['rule_name']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($validationRule['ParentValidationRule']['rule_name'], array('controller' => 'validation_rules', 'action' => 'view', $validationRule['ParentValidationRule']['id'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $this->Html->link($validationRule['QuestionType']['qsn_type'], array('controller' => 'question_types', 'action' => 'view', $validationRule['QuestionType']['id'])); ?>
                                        </td>
                                        <td class="actions">
                                            <?php //echo $this->Html->link(__('View'), array('action' => 'view', $validationRule['ValidationRule']['id'])); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $validationRule['ValidationRule']['id']), array('class' => 'btn btn-warning')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $validationRule['ValidationRule']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $validationRule['ValidationRule']['id'])); ?>
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

