<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Validation Rules        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                add Validation Rules                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('ValidationRule',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>rule_name</label>";		echo $this->Form->input('rule_name',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>parent_id</label>";		echo $this->Form->input('parent_id',array(
    'empty' => 'Select Parent Rule(if any)','label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>qsn_type_id</label>";		echo $this->Form->input('qsn_type_id',array('label' => false,'class' => 'form-control'));
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