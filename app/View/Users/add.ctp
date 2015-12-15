
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User Registration     </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add new users    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> <label>UserName</label>";
                            echo $this->Form->input('user_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Password</label>";
                            echo $this->Form->input('password', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
							echo "<div class=\"form-group\"> <label>Retype Password</label>";
                            echo $this->Form->input('re_password', array('label' => false, 'type' =>'password', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>First name</label>";
                            echo $this->Form->input('first_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Last Name</label>";
                            echo $this->Form->input('last_name', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';

                            echo "<div class=\"form-group form-inline\"> <label>Active</label>&nbsp;&nbsp;&nbsp;";
                            echo $this->Form->input('is_active', array('type' => 'checkbox', 'label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            
                            ?>
                            <?php if ($this->Session->read('Auth.User.User.superuser') == '1'):
                                echo "<div class=\"form-group form-inline\"> <label>SuperUser</label>&nbsp;&nbsp;&nbsp;";
                                echo $this->Form->input('superuser', array('type' => 'checkbox', 'label' => false, 'class' => 'form-control'));
                                echo '</div>';
                            endif; ?>
                            <?php
                            if (sizeof($devices) != 0) {
                                echo "<div class=\"form-group\"> <label>Device ID</label>";
                                echo $this->Form->input('device_id', array('option' => $devices, 'empty' => '<--Unassigned-->', 'label' => false, 'class' => 'form-control'));
                                echo '</div>';
                                echo '<input type="submit" class="fa fa-plus btn btn-success" value="Add"/> <input type="button" style="margin-left:3%;" class="fa btn btn-success" value="Cancel" onclick="javascript:history.back();" />';
                            } else
                                echo 'Please add Device before inserting the user';
                            ?>
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
