<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Unions        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Unions                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('SelectUnion', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> ";
                            echo $this->Form->input('union_id', array('label' => false, 'type' => 'hidden', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>union_name</label>";
                            echo $this->Form->input('union_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>upzilla_id</label>";
                            echo $this->Form->input('upzilla_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>union_code</label>";
                            echo $this->Form->input('union_code', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
                            echo '</div>';
                            ?>
                            <input type="submit" class="fa fa-plus btn btn-success" value="Update"/> 
							<input type="button" style="margin-left:3%;" class="fa btn btn-success" value="Cancel" onclick="javascript:history.back();" />
							</form>                        
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
