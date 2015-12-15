<?php
echo $this->Html->css('jquery-ui.min');
echo $this->Html->script('jquery-ui.min');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Questions</h1>

        <?php
        echo $this->Html->link(__('Add more to this Survey'), array('action' => 'add', $setID), array('class' => 'btn btn-info pull-right'));
        ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Questions :
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered " id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th>Survey</th>
                                    <th><?php echo $this->Paginator->sort('qsn_desc'); ?></th>
                                    <th><?php echo $this->Paginator->sort('qsn_type_id'); ?></th>
<!--                                    <th><?php // echo $this->Paginator->sort('qsu_order');  ?></th>-->
                                    <th>Section</th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                <?php $i = 1;
                                foreach ($questions as $question):
                                    ?>
                                    <tr flag="<?php echo $question['Question']['id']; ?>">
                                        <td><i class="fa fa-bars"><?php echo $i++; ?> &nbsp;</i></td>
                                        <td>
    <?php echo $this->Html->link($question['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $question['QuestionSet']['id'])); ?>
                                        </td>
                                        <td><?php echo h($question['Question']['qsn_desc']); ?>&nbsp;</td>
                                        <td>
    <?php echo $this->Html->link($question['QuestionType']['qsn_type'], array('controller' => 'qsn_types', 'action' => 'view', $question['QuestionType']['id'])); ?>
                                        </td>
                                        <!--<td><?php // echo h($question['Question']['qsu_order']);  ?>&nbsp;</td>-->
                                        <td>
    <?= $question['QuestionSection']['section_name'] ?>
                                        </td>
                                        <td class="actions">

                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $question['Question']['id'], $setID), array('class' => 'btn btn-warning'));
                                            ?>
                                            <?php
                                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-danger')
                                                    , __('Are you sure you want to delete # %s?', $question['Question']['id']));
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
                            ?>	</p>
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
    $(function() {
        $("#sortable").sortable({
            revert: true
        });
        $("#dataTables-example tbody tr").draggable({
            connectToSortable: "#sortable",
            helper: true,
            revert: "invalid"
        });
        $("#dataTables-example tbody tr").droppable({
            drop: function(event, ui) {
                var inventor = ui.draggable.attr('flag');
                alert(inventor);
                //$(this).find("input").val(inventor);
            }
        });
//    $( "ul, li" ).disableSelection();
    });
</script>