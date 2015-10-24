<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Upzilla        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Upzilla               <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('SelectUpzilla', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> ";
                            echo $this->Form->input('upzilla_id', array('label' => false,'type'=>'hidden', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>upzilla_name</label>";
                            echo $this->Form->input('upzilla_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>district_id</label>";
                            echo $this->Form->input('district_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Is Active</label>";
                            echo $this->Form->input('is_active', array('type' => 'checkbox', 'class' => 'form-control', 'label' => false));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>upzilla_code</label>";
                            echo $this->Form->input('upzilla_code', array('label' => false, 'type'=>'text','class' => 'form-control'));
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
