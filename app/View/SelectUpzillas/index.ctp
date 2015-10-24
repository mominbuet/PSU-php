<div class="row" style="padding-bottom: 20px">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Select Upzillas'); ?></h1>
        <?php echo $this->Html->link(__("Add Upzilla"), array("action" => "add"), array("class" => "btn btn-info pull-right")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row" style="padding-bottom: 20px">
    <?php
    echo $this->Form->create("SelectUpzilla", array('class' => 'form-horizontal'));
    echo '<div class="col-lg-12">';
    echo "<div class=' col-lg-3'> <label>Upzilla Code </label>";
    echo $this->Form->input('upzilla_code', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
    echo '</div>';
    echo "<div class='col-lg-3 col-lg-offset-1' > <label>Upzilla Name</label>";
    echo $this->Form->input('upzilla_name', array('label' => false, 'class' => 'form-control'));
    echo '</div>';
    
    echo '<div class="col-lg-3 pull-right"><label>Select District</label>';
    echo $this->Form->input('district_id',array('label' => false,'class' => 'form-control', 'empty' => 'Select District'));
    echo '</div></div><div class="col-lg-12">';
    echo $this->Form->submit(__('Submit'), array('class' => "fa fa-plus btn btn-success pull-right"));
    echo '</div>';
    echo $this->Form->end();
    ?>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Select Upzillas'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <!--<th><?php // echo $this->Paginator->sort('upzilla_id'); ?></th>-->
                                    <th><?php echo $this->Paginator->sort('upzilla_name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('district_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('is_active'); ?></th>
                                    <th><?php echo $this->Paginator->sort('upzilla_code'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($selectUpzillas as $selectUpzilla): ?>
                                    <tr>
                                        <!--<td><?php // echo h($selectUpzilla['SelectUpzilla']['upzilla_id']); ?>&nbsp;</td>-->
                                        <td><?php echo h($selectUpzilla['SelectUpzilla']['upzilla_name']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($selectUpzilla['SelectDistrict']['district_name'], array('controller' => 'select_districts', 'action' => 'view', $selectUpzilla['SelectDistrict']['district_id'])); ?>
                                        </td>
                                        <td><?php echo h($selectUpzilla['SelectUpzilla']['is_active']); ?>&nbsp;</td>
                                        <td><?php echo h($selectUpzilla['SelectUpzilla']['upzilla_code']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php //echo $this->Html->link(__('View'), array('action' => 'view', $selectUpzilla['SelectUpzilla']['upzilla_id'])); ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $selectUpzilla['SelectUpzilla']['upzilla_id']), array('class' => 'btn btn-warning')); ?>
                                            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete',
                                                $selectUpzilla['SelectUpzilla']['upzilla_id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $selectUpzilla['SelectUpzilla']['upzilla_id'])); ?>
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
                            echo $this->Paginator->numbers(array('separator' => ' '));
                            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

