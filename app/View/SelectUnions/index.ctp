<div class="row" style="padding-bottom: 20px">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Unions'); ?></h1>
        <?php echo $this->Html->link(__("Add Unions"), array("action" => "add"), array("class" => "btn btn-info col-lg-offset-8")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row" style="padding-bottom: 20px">
    <?php
    echo $this->Form->create("SelectUnion", array('class' => 'form-horizontal'));
    echo '<div class="col-lg-12">';
    echo "<div class=' col-lg-3'> <label>Union Code </label>";
    echo $this->Form->input('union_code', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
    echo '</div>';
    echo "<div class='col-lg-3 col-lg-offset-2 ' > <label>Union Name</label>";
    echo $this->Form->input('union_name', array('label' => false, 'class' => 'form-control'));

    echo '</div></div><div class="col-lg-12">';


    echo '<div class="col-lg-3"><label>Select District</label>';
    echo $this->Form->input('district_id', array('label' => false, 'type' => 'select', 'options' => $districts, 'class' => 'form-control', 'empty' => 'Select District'));
    echo '</div>';
    echo '<div class="col-lg-3 col-lg-offset-2 "><label>Select Upzilla</label>';
    echo $this->Form->input('upzilla_id', array('label' => false, 'type' => 'select', 'options' => $upzillas, 'class' => 'form-control', 'empty' => 'Select Upzilla'));
    echo '</div></div><div class="col-lg-12">';
    echo $this->Form->submit(__('Submit'), array('style'=>'padding-top:10px;','class' => "fa fa-plus btn btn-success col-lg-offset-7"));
    echo '</div>';
    echo $this->Form->end();
    ?>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Unions'); ?>           
                <div class="panel-body">
                    <div class="row table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr class="success">
                                    <th><?php echo $this->Paginator->sort('union_name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('upzilla_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('district_id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('union_code'); ?></th>
                                    <th class="actions"><?php echo __('Edit'); ?></th>
                                    <th class="actions"><?php echo __('Delete'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($selectUnions as $selectUnion): ?>

                                <tr>
                                    <td><?php echo h($selectUnion['SelectUnion']['union_name']); ?>&nbsp;</td>
                                    <td>
                                        <?php echo $this->Html->link($selectUnion['SelectUpzilla']['upzilla_name'], array('controller' => 'select_upzillas', 'action' => 'view', $selectUnion['SelectUpzilla']['upzilla_id'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $this->Html->link($selectUnion['SelectDistrict']['district_name'], array('controller' => 'select_districts', 'action' => 'view', $selectUnion['SelectDistrict']['district_id'])); ?>
                                    </td>
                                    <td><?php echo h($selectUnion['SelectUnion']['union_code']); ?>&nbsp;</td>
                                    <td class="actions">
                                        <?php //echo $this->Html->link(__('View'), array('action' => 'view', $selectUnion['SelectUnion']['union_id'])); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $selectUnion['SelectUnion']['union_id']), array('class' => 'btn btn-warning')); ?>

                                    </td>
                                    <td class="actions">

                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $selectUnion['SelectUnion']['union_id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $selectUnion['SelectUnion']['union_id'])); ?>
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
        $("#SelectUnionDistrictId").change(function () {
            $.get(website + "UIAPI/get_upzilla_for_districts_by_id/" +
                    $("#SelectUnionDistrictId  option:selected").val(), function (data) {
                $('#SelectUnionUpzillaId').html(data);
            });
        });
    });
</script>