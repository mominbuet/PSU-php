<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Groups        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                add Groups                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('Group', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo '<div class=\"form-group\"> <label>group_name</label>';
                            echo $this->Form->input('group_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            
                            echo $this->Form->input('is_active', array('type'=>'checkbox','label' => false, 'class' => 'form-control', 'style' => 'width:20%'));
							?>
							<label style="float:left;margin-left:10%">is_active</label>
							
                            <div style="clear:both;margin-top:1%">
                            <input type="submit" class="fa fa-plus btn btn-success" value="Add"/> 
							<input type="button" style="margin-left:3%;" class="fa btn btn-success" value="Cancel" onclick="javascript:history.back();" />
							</form>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
