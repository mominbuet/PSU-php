<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All Question Types</h1>
        <?php echo $this->Html->link(__('Add Question Type'), array('action' => 'add'),array('class'=>'btn btn-success pull-right')); ?>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Surveys
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('qsn_type'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
	<?php foreach ($qsnTypes as $qsnType): ?>
                                <tr>
                                    <td><?php echo h($qsnType['QuestionType']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($qsnType['QuestionType']['qsn_type']); ?>&nbsp;</td>
                                    <td class="actions">

			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $qsnType['QuestionType']['id']),array("class"=>"btn btn-sm btn-warning")); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $qsnType['QuestionType']['id']), array("class"=>"btn btn-sm btn-danger"),
                                __('Are you sure you want to delete # %s?', $qsnType['QuestionType']['id'])); ?>
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
    