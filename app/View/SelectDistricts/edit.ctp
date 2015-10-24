<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Districts        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Districts                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('SelectDistrict', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                            <?php // echo $this->Form->input('district_id', array('label' => false, 'type' => 'hidden')); ?>

                            <?php
                            echo "<div class=\"form-group\"> ";
                            echo $this->Form->input('district_id', array('label' => false,'type' => 'hidden', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>district_name</label>";
                            echo $this->Form->input('district_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>division_id</label>";
                            echo $this->Form->input('division_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>district_code</label>";
                            echo $this->Form->input('district_code', array('label' => false, 'type' => 'text', 'class' => 'form-control'));
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
