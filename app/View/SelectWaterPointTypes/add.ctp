<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Select Water Point Types        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                add Select Water Point Types                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('SelectWaterPointType',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>water_point_type_name</label>";		echo $this->Form->input('water_point_type_name',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>water_point_type_codes</label>";		echo $this->Form->input('water_point_type_codes',array('label' => false,'class' => 'form-control'));
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

        <li><?php echo $this->Html->link(__('List Select Water Point Types'), array('action' => 'index')); ?></li>
    </ul>
</div>
