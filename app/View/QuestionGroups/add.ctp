<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Question Groups        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Assign Question to Group                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo $this->Form->create('QuestionGroup',array('class'=>'form-horizontal', 'role'=>'form')); ?>


	<?php
echo "<div class=\"form-group\"> <label>group_id</label>";		echo $this->Form->input('group_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>question_set_id</label>";		echo $this->Form->input('question_set_id',array('label' => false,'class' => 'form-control'));
		echo '</div>';
/*echo "<div class=\"form-group\"> <label>active_from</label>";		echo $this->Form->input('active_from',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>active_to</label>";		echo $this->Form->input('active_to',array('label' => false,'class' => 'form-control'));
		echo '</div>';
echo "<div class=\"form-group\"> <label>is_active</label>";		echo $this->Form->input('is_active',array('label' => false,'class' => 'form-control'));
		echo '</div>';*/
	?>
<input type="submit" class="fa fa-plus btn btn-success" value="Add"/> </form>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>

