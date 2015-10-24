
<?php echo $this->Html->css('jstree_style'); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Survey</h1>
        <?php // echo $this->Html->link(__('Add New Survey'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
        <div class="btn-group btn-group-lg" style="width:100%;">
            <button class="btn btn-primary fa fa-backward"  onclick="backStep()"> Back</button>
            <button class="btn btn-info fa fa-plus" id="addSurvey" onclick="addSurvey()"> Add Survey</button>
            <button class="btn btn-primary fa fa-plus" id="addFolder" onclick="addFolder()"> Add Folder</button>
            <button class="btn btn-info fa fa-edit" id="editSurvey" onclick="editSurvey()"> Edit</button>
            <button class="btn btn-primary fa fa-anchor" onclick="showSurvey()" id="showSurvey"> Questions</button>
            <button class="btn btn-info fa fa-users"  data-toggle="modal" data-target="#myModal" > Assign User</button>
            <button class="btn btn-primary fa fa-info-circle"  onclick="showInfo()" > Information</button>
            <button class="btn btn-info fa fa-minus" onclick="removeItem()"> Delete</button>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12" id="divInfo" style ="margin-top: 20px;"></div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12" id="tmpView" style ="margin-top: 20px;">
<!--        <div class="col-lg-4 " ><i class="fa fa-2x fa-folder-open"></i>Folder</div>
        <div class="col-lg-4 " ><i class="fa fa-2x fa-file"></i>Folder</div>
        <div class="col-lg-4 " ><i class="fa fa-2x fa-folder"></i>Folder</div>
        <div class="col-lg-4"  style="background: #0a0"><i class="fa fa-3x fa-file"></i><span >Survey</span></div>-->
    </div>

</div>
<?php // debug($treeJson);?>
<div class="row" style="margin-top: 20px;" id="log"></div>
<script type="text/javascript">
    var inFolder = null;
    var data = '<?= $treeJson; ?>';
    data = JSON.parse(data);
    var isSurveyMap = [];
    $(document).ready(function() {
        var pastDIV = null;


//        console.log(data);
        var item = 0;
        $.each(data, function(ind, obj) {
            isSurveyMap[obj.id] = obj.is_survey;
            if (obj.parent == "#") {
                if (obj.is_survey == 0)
                    $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="folder" tagid="' + obj.id + '" ><i class="fa fa-3x fa-folder-open"></i>' + obj.text + '</div>');
                else
                    $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="survey" tagid="' + obj.id + '"  ><i class="fa fa-3x fa-file"></i>' + obj.text + '</div>');
                item++;
            }
            else if (item === 0 && obj.is_survey == 0) {
                $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="folder" tagid="' + obj.id + '" ><i class="fa fa-3x fa-folder-open"></i>' + obj.text + '</div>');
                item++;
            }
        });
        $("#log").html("Item count: " + item);
        $("div").on("dblclick", ".glk", function() {
            if ($(this).attr("tag") == "folder") {
                $("#tmpView").html("");
                $("#divInfo").html("");
                var item = 0;
                var folder = $(this);
                $.each(data, function(ind, obj) {
                    if (obj.parent == folder.attr("tagid")) {

                        if (obj.is_survey == 0)
                            $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="folder" tagid="' + obj.id + '" ><i class="fa fa-3x fa-folder-open"></i>' + obj.text + '</div>');
                        else
                            $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="survey" tagid="' + obj.id + '"  ><i class="fa fa-3x fa-file"></i>' + obj.text + '</div>');
                        item++;
                    }
                    if (obj.id == folder.attr("tagid"))
                        inFolder = obj.parent;
                });


                $("#log").html("Item count: " + item);
            }

            //console.log(inFolder);
        });
        $("div").on("click", ".glk", function() {
//            if ($(this).attr("tag") == "folder")
//                alert($(this).attr("tagid"));
//            else{
            if (pastDIV !== null)
                pastDIV.attr("style", "margin-top: 20px;");
            pastDIV = $(this);
            $(this).attr("style", "margin-top: 20px;background: #0a0;");
            selectedIndex = $(this).attr("tagid");
            if(isSurveyMap[selectedIndex]!=0){
                $("#addFolder").attr("disabled", true);
                $("#addSurvey").attr("disabled", true);
                $("#showSurvey").removeAttr("disabled");
            }
            else{
                $("#addFolder").removeAttr("disabled");
                $("#showSurvey").attr("disabled", true);
                $("#addSurvey").removeAttr("disabled");
            }
//            console.log("test" + selectedIndex);

//            }
        });

    });
    function showInfo() {
        $.get(website + "UIAPI/getInfo/" + selectedIndex, function(data) {
            $("#divInfo").html(data);
        });
    }
    function backStep() {
        var item = 1;
        var tmp_inFolder = 0;
        if (inFolder != null) {
            $("#tmpView").html("");
            item = 0;
        }
        $.each(data, function(ind, obj) {

            if (obj.parent == inFolder) {

                if (obj.is_survey == 0)
                    $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="folder" tagid="' + obj.id + '" ><i class="fa fa-3x fa-folder-open"></i>' + obj.text + '</div>');
                else
                    $("#tmpView").append('<div style ="margin-top: 20px;" class="col-lg-4 glk" tag="survey" tagid="' + obj.id + '"  ><i class="fa fa-3x fa-file"></i>' + obj.text + '</div>');
                item++;
            } else if (obj.id == inFolder) {
                tmp_inFolder = obj.parent;
            }

        });

        inFolder = (tmp_inFolder != 0) ? tmp_inFolder : inFolder;
        $("#log").html("Item count: " + item);
    }

    var selectedIndex = "", selectedNode;
    function showSurvey() {
        if (selectedNode != "") {
            window.location = website + "Questions/index/" + selectedIndex;
        } else
            alert("Please select a survey to open");
    }
    function editSurvey() {
        if (selectedNode != "") {
            window.location = website + "QuestionSets/edit/" + selectedIndex;
        } else
            alert("Please select a survey to edit");
    }
    function removeItem() {
        if (selectedIndex != "") {
            $.post(website + "SurveyAPI/deleteAjax/" + selectedIndex, function(data) {
                
                if (data == "Success"){
                    alert("Successfully deleted data");
                    window.location = website + "QuestionSets/";
                    
                }
            });

        } else
            alert("Please select an item");
    }
    function assignGroup() {
//        console.log($("#group_id option:selected").val()+"---"+selectedIndex);
        $.get(website + "UIAPI/assignUser/" + $("#group_id option:selected").val() + "/" +
                selectedIndex, function(data) {
                    alert("Assigned");
                });
    }
    function addSurvey() {
        if (selectedIndex != "")
            window.location = website + "QuestionSets/add/1/" + selectedIndex;
//        alert(selectedIndex);
    }
    function addFolder() {
        if (selectedIndex != "")
            if (selectedNode == null)
                window.location = website + "QuestionSets/add/0/" + selectedIndex;
            else
                alert("Please select a folder");
//        alert(selectedIndex);
    }
    var prevNode;
</script>
<div class="row">
    <div class="col-lg-12">
        <div id="jsTreeSample" class="jstree-default">

        </div>
    </div>
</div>
<!--<div class="row" style="display: none;">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Surveys
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                                    <th><?php echo $this->Paginator->sort('qsn_set_name'); ?></th>
                                    <th><?php echo $this->Paginator->sort('qsn_set_description'); ?></th>
                                    <th>Geo Location</th>
                                    <th>Active from</th>
                                    <th>Active to</th>
                                    <th class="actions"><?php echo __('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($questionSets as $questionSet): ?>
                                    <tr>
                                        <td><?php echo h($questionSet['QuestionSet']['id']); ?>&nbsp;</td>
                                        <td><?php echo h($questionSet['QuestionSet']['qsn_set_name']); ?>&nbsp;</td>
                                        <td><?php echo h($questionSet['QuestionSet']['qsn_set_detail']); ?>&nbsp;</td>
                                        <td><?php echo ($questionSet['QuestionSet']['geolocation']); ?>&nbsp;</td>
                                        <td><?php echo ($questionSet['QuestionSet']['active_from']); ?>&nbsp;</td>
                                        <td><?php echo ($questionSet['QuestionSet']['active_to']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php //echo $this->Html->link(__('View'), array('action' => 'view', $questionSet['QuestionSet']['id'])); ?>
                                            <?php
                                            echo $this->Html->link(__('Questions'), array('controller' => 'Questions', 'action' => 'index', $questionSet['QuestionSet']['id']), array('class' => "btn btn-info"));
                                            ?>
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionSet['QuestionSet']['id']), array('class' => "btn btn-warning"));
                                            ?>

                                            <?php
                                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionSet['QuestionSet']['id']), array('class' => "btn btn-danger"), __('Are you sure you want to delete # %s?', $questionSet['QuestionSet']['qsn_set_name'])
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <p>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?>	</p>
                <div class="paging">
                    <?php
                    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                    echo $this->Paginator->numbers(array('separator' => ''));
                    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">User</h4>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class=\"form-group\"> <label>Group</label>";
                echo $this->Form->input('group_id', array('label' => false, 'class' => 'form-control', 'options' => $group_id));
                echo '</div>';
                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"   onclick="assignGroup()">Assign</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('jstree.min'); ?>