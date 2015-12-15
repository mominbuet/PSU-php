<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Groups'); ?></h1>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Merge Groups</button>
        <?php echo $this->Html->link(__("Add Groups"), array("action" => "add"), array("class" => "btn btn-info pull-right")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Insert Group</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"> 
                        <label>Group Name</label>
                        <?php echo $this->Form->input('group_name', array('label' => false, 'id' => 'group_name', 'class' => 'form-control')); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnMerge" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Merge</button>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Groups'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr><th style="width:4%"><input type="checkbox" class="form-control" id="checkAll"  /></th>
                                    <th><?php echo $this->Paginator->sort('group_name'); ?></th>
                                    <th>Question Sets Assigned</th>
                                    <th>Groups Assigned</th>
                                    <th><?php echo $this->Paginator->sort('is_active'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($groups as $group): ?>
                                    <tr>
                                        <td><input type="checkbox" class="form-control chkUser" value="<?php echo $group['Group']['id'] ?>" /></td>
                                        <td><?php echo h($group['Group']['group_name']); ?>&nbsp;</td>
                                        <td><?= sizeof($group['QuestionGroup']) ?></td>
                                        <td><?= sizeof($group['UserGroup']) ?></td>
                                        <td><?php echo h($group['Group']['is_active']); ?>&nbsp;</td>
                                        <td class="actions">

                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-warning'));
                                            ?>
                                            <?php if ($this->Session->read('Auth.User.User.superuser') == '1'): ?>
                                                <?php
                                                echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array('class' => 'btn btn-danger'), __('Deleting %s will delete all the group and question set assignment!', $group['Group']['group_name']));
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
<script>
    $(document).ready(function () {
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#btnMerge").click(function () {
                var sThisVal = "";
                $('.chkUser').each(function (index, obj) {
                    if (this.checked)
                        sThisVal += $(this).val() + ",";
                });
                //console.log(website + "UserGroups/assignUser/" + $('#group_id :selected').val() + "/" + sThisVal);
                $.get(website + "UserGroups/mergeGroups/" + $('#group_name').val() + "/" + sThisVal, function (data) {
                    alert(data);
                    location.reload();
                });
            });
    });
</script>