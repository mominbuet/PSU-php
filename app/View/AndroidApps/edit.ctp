<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Apps        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Apps/files                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('AndroidApp', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> ";
                            echo $this->Form->input('id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Version Name</label>";
                            echo $this->Form->input('app_name', array('label' => false, 'class' => 'form-control','type'=>'text'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Version</label>";
                            echo $this->Form->input('version', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Comment</label>";
                            echo $this->Form->input('comment', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Type</label>";
                            echo $this->Form->input('type', array('label' => false,'type'=>'select','class' => 'form-control',
                                'options'=>array('No type','apk'=>"Android",'video'=>'Video','pdf'=>'manual') ));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>File</label>";
                            echo $this->Form->input('file', array('label' => false,'type'=>'file', ));
                            echo '</div>';
                            
                            ?>
<!--                            <div class="form-group"><label>Type</label>
                                <select class="form-control" name="data[AndroidApps][type]"><option value="">No type</option>
                                    <option value="apk">Android app</option>
                                    <option value="pdf">User manual</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>-->
                            <input type="submit" class="fa fa-plus btn btn-success" value="Add/Edit"/> </form>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
