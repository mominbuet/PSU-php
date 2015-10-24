
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('User Groups'); ?></h1>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Assign User</button>
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
                        <?php echo $this->Form->input('group_id', array('label' => false, 'id' => 'group_id', 'class' => 'form-control')); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btnAssign" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Assign</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo __('All User Groups'); ?>                <div class="panel-body">
                        <div class="row">
                            <table class="table table-striped table-responsive" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" class="form-control" id="checkAll"  /></th>
                                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($userGroups as $userGroup): ?>
                                        <tr>
                                            <td><input type="checkbox" class="form-control chkUser" value="<?php echo $userGroup['User']['id'] ?>" /></td>
                                            <td><?php echo h($userGroup['User']['id']); ?>&nbsp;</td>
                                            <td>
                                                <?php echo $this->Html->link($userGroup['User']['user_name'], array('controller' => 'users', 'action' => 'view', $userGroup['User']['id'])); ?>
                                            </td>
                                            <td>

                                                <?php
                                                for ($i = 0; $i < sizeof($userGroup['UserGroup']['id']); $i++):
                                                    echo ($this->Html->link($userGroup['Group']['group_name'], array('controller' => 'groups', 'action' => 'view', $userGroup['Group']['id'])));
                                                    echo ($i == count($userGroup['UserGroup']) - 1) ? '' : '-';
                                                endfor;
                                                ?>
                                            </td>
                                            <td>

                                                <?php
                                                if (sizeof($userGroup['UserGroup']['id'])):
                                                    echo $this->Form->postLink(__('UnAssign'), array('action' => 'delete', $userGroup['UserGroup']['id']), array('class' => 'btn btn-sm btn-danger pull-right'), __('Are you sure you want to unassign group of %s?', $userGroup['User']['user_name']));
                                                endif;
                                                ?>

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
            $("#btnAssign").click(function () {
                var sThisVal = "";
                $('.chkUser').each(function (index, obj) {
                    if (this.checked)
                        sThisVal += $(this).val() + ",";
                });
                //console.log(website + "UserGroups/assignUser/" + $('#group_id :selected').val() + "/" + sThisVal);
                $.get(website + "UserGroups/assignUser/" + $('#group_id :selected').val() + "/" + sThisVal, function (data) {
                    alert(data);
                    location.reload();
                });
            });

        });
    </script>