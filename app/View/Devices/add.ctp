<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Devices        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                add Devices                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('Device', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> <label>Device ID</label>";
                            echo $this->Form->input('device_visible_id', array('label' => false, 'class' => 'form-control','type'=>'text'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Device IMEI</label>";
                            echo $this->Form->input('device_imei', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Phone Number</label>";
                            echo $this->Form->input('device_phn_number', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Last Contact</label>";
                            echo $this->Form->input('device_last_contact', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Last Location</label>";
                            echo $this->Form->input('device_last_location', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Version</label>";
                            echo $this->Form->input('version', array('label' => false, 'class' => 'form-control'));
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

        <li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
