<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Select Villages        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                edit Select Villages                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('SelectVillage',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>village_id</label>";		echo $this->Form->input('village_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>village_name</label>";		echo $this->Form->input('village_name',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>village_code</label>";		echo $this->Form->input('village_code',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>union_id</label>";		echo $this->Form->input('union_id',array('label' => false,'class' => 'form-control'));
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

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SelectVillage.village_id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SelectVillage.village_id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Select Villages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Select Unions'), array('controller' => 'select_unions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Select Union'), array('controller' => 'select_unions', 'action' => 'add')); ?> </li>
    </ul>
</div>
