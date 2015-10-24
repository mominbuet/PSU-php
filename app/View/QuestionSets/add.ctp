<?php // debug($is_survey);   ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New <?= ($is_survey == 1) ? "survey" : "folder"; ?> under <?= $parentID['QuestionSet']['qsn_set_name']; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create a new <?= ($is_survey == 1) ? "survey" : "folder"; ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form id="newSurveyForm" class="form-horizontal" role="form" method="POST">
                                <?php echo $this->Form->input('parent_id', array('type' => 'hidden', 'value' => $parentID['QuestionSet']['id'])) ?>
                                <?php echo $this->Form->input('is_survey', array('type' => 'hidden', 'value' => $is_survey)) ?>
                                <div class="form-group">
                                    <label>Title</label>
                                    <?php echo $this->Form->input('qsn_set_name', array('label' => false, 'class' => 'form-control ')); ?>
                                    <p class="help-block">Enter the title here...</p>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <?php echo $this->Form->input('qsn_set_detail', array('type' => 'textarea', 'label' => false, 'class' => 'form-control ')); ?>
                                    <p class="help-block">Enter the description here...</p>
                                </div>
                                 
                                <?php if ($is_survey == 1): ?>
                                <div class="form-group">
                                    <label>Import Question from</label>
                                    <?php echo $this->Form->input('master_id', array('options'=>$master_id,'empty'=>'Please select if you want to import all questions','label' => false, 'class' => 'form-control ')); ?>
                                    <p class="help-block">Enter the master question set name here</p>
                                </div>
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
                                            <tr>
                                                <td>Geo Location</td> 
                                                <td><?php echo $this->Form->input('geolocation', array('type' => 'checkbox', 'label' => false)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Water point identification</td> 
                                                <td><?php echo $this->Form->input('need_water_point_identification', array('type' => 'checkbox', 'label' => false)); ?></td>
                                            </tr>
                                        </table>


                                    </div>
                                    <div class="form-group form-inline">
                                        <label>Active from</label>
                                        <?php echo $this->Form->input('active_from', array('type' => 'date', 'label' => false, 'class' => 'form-control ')); ?>

                                    </div>
                                    <div class="form-group form-inline">
                                        <label>Active to</label>
                                        <?php echo $this->Form->input('active_to', array('type' => 'date', 'label' => false, 'class' => 'form-control ')); ?>

                                    </div>
                                <?php endif; ?>
                                <input type="submit" class="fa fa-plus btn btn-success" value="Create <?= ($is_survey == 1) ? "Survey" : "Folder"; ?>"/> 
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
<script>
//    $(document).ready(function() {
//        $('#newSurveyForm').on('submit', function() {
//            //alert("here" + $('input[name="description"]').val());
//            $.post(website + "SurveyAPI/add_survey",
//                    $('#newSurveyForm').serialize(),
//                    function(data) {
//                        data = JSON.parse(data);
//                        if (data.status == "SUCCESS") {
//                            //console.log(JSON.stringify(data));
//                            alert("Successfully inserted question set.");
//                            $("#survey_menu").addClass("in");
//                            $("#survey_menu").prop("aria-expanded", "true");
//                            $("#survey_menu").prepend("<li><a href='#'>" + data.result.QuestionSet.qsn_set_name + "</a></li>");
//                        }
//                    });
//            $('#newSurveyForm').reset();
//            return false;
//        });
//    });
</script>