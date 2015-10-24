<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            echo $this->Form->create(null, array(
                                'url' => array('controller' => 'QuestionSets', 'action' => 'edit'),
                                'type' => 'POST',
                                'id' => "newSurveyForm"
                            ));
                            ?>
                            <?php echo $this->Form->input('id', array('label' => false, 'type' => 'hidden')); ?>
                            <div class="form-group">
                                <label>Survey Title</label>
                                <?php echo $this->Form->input('qsn_set_name', array('label' => false, 'class' => 'form-control')); ?>
                                <p class="help-block">Enter the title here...</p>
                            </div>
                            <div class="form-group">
                                <label>Survey Description</label>
                                <?php echo $this->Form->input('qsn_set_detail', array('type' => 'textarea', 'label' => false, 'class' => 'form-control')); ?>
                                <p class="help-block">Enter the description here...</p>
                            </div>
                            <?php if ($this->request->data["QuestionSet"]["is_survey"] == 1): ?>
                                <div class="form-group">
                                    <label>Version</label>
                                    <?php echo $this->Form->input('version', array('label' => false, 'class' => 'form-control ')); ?>
                                    <p class="help-block">Enter the version name here...</p>
                                </div>
                                <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td>Active</td> 
                                            <td><?php echo $this->Form->input('is_active', array('type' => 'checkbox', 'label' => false)); ?></td>
                                        </tr>
    <!--                                    <tr>
                                            <td>Geo Location</td> 
                                            <td><?php //echo $this->Form->input('geolocation', array('type' => 'checkbox', 'label' => false));   ?></td>
                                        </tr>-->
                                        <tr>
                                            <td>Water point identification</td> 
                                            <td><?php echo $this->Form->input('need_water_point_identification', array('type' => 'checkbox', 'label' => false)); ?></td>
                                        </tr>
                                    </table>


                                </div>
                                <div class="form-group form-inline">
                                    <label>Active from</label>
                                    <?php echo $this->Form->input('active_from', array('type' => 'date', 'label' => false, 'class' => 'form-control')); ?>

                                </div>
                                <div class="form-group form-inline">
                                    <label>Active to</label>
                                    <?php echo $this->Form->input('active_to', array('type' => 'date', 'label' => false, 'class' => 'form-control')); ?>

                                </div>
                            <?php endif; ?>
                            <input type="submit" class="fa fa-plus btn btn-success" value="Edit <?= ($this->request->data["QuestionSet"]["is_survey"]==1)?'Survey':'Folder';?>"/> 
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
