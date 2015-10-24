<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Select Land Types        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                edit Select Land Types                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('SelectLandType',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>land_use_id</label>";		echo $this->Form->input('land_use_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>land_use_name</label>";		echo $this->Form->input('land_use_name',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>land_use_code</label>";		echo $this->Form->input('land_use_code',array('label' => false,'class' => 'form-control'));
		echo '</div>';
	?>
<input type="submit" class="fa fa-plus btn btn-success" value="Add/Edit"/> </form>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SelectLandType.land_use_id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SelectLandType.land_use_id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Select Land Types'), array('action' => 'index')); ?></li>
    </ul>
</div>
