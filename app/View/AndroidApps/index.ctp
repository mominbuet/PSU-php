<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Versions'); ?></h1>
		
		<a href="<?php echo $this->webroot.'uploads/dbbackups/psu.tgz'?>">Download Database Backup</a>
		
		<?php 
		
		
 
		echo $this->Html->link(__("Add Version"), array("action" => "add"),array("class"=>"btn btn-info pull-right")); ?>    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo __('All Versions'); ?>                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th>Name</th>
                                    <th><?php echo $this->Paginator->sort('version'); ?></th>
                                    <th><?php echo $this->Paginator->sort('comment'); ?></th>
                                    <th><?php echo $this->Paginator->sort('type'); ?></th>
                                    <th><?php echo $this->Paginator->sort('inserted'); ?></th>
                                    <th><?php echo $this->Paginator->sort('file'); ?></th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($AndroidApps as $device): ?>
                                <tr>
                                    <td><?php echo h($device['AndroidApp']['id']); ?>&nbsp;</td>
                                    <td><?php echo h($device['AndroidApp']['app_name']); ?>&nbsp;</td>
                                    <td><?php echo h($device['AndroidApp']['version']); ?>&nbsp;</td>    
                                    <td><?php echo h($device['AndroidApp']['comment']); ?>&nbsp;</td>
                                    <td><?php echo h($device['AndroidApp']['type']); ?>&nbsp;</td>
                                    <td><?php echo h($device['AndroidApp']['inserted']); ?>&nbsp;</td>
                                    <td> <a href='/PSU/SurveyAPI/get_uploaded_file_id/<?php echo $device['AndroidApp']['id']; ?>' >download</a></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $device['AndroidApp']['id']),array('class'=>'btn btn-warning')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $device['AndroidApp']['id']), array('class'=>'btn btn-danger'), __('Are you sure you want to delete # %s?', $device['AndroidApp']['id'])); ?>
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

