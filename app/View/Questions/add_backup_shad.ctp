<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Question to "<?php echo $questionSets["QuestionSet"]["qsn_set_name"]; ?>"</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Inserted question list:
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-striped" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Survey</th>
                                    <th><?php echo $this->Paginator->sort('qsn_desc'); ?></th>
                                    <th><?php echo $this->Paginator->sort('qsn_type_id'); ?></th>
<!--                                    <th><?php // echo $this->Paginator->sort('qsu_order');     ?></th>-->
                                    <th><?php echo $this->Paginator->sort('qsn_rules'); ?></th>
                                    <!--<th class="actions"><?php // echo __('Actions');     ?></th>-->
                                </tr>
                            </thead>

                            <tbody id="sortable">
                                <?php
                                $i = 1;
                                foreach ($questions as $question):
                                    ?>
                                    <tr flag="<?php echo $question['Question']['id']; ?>">
                                        <td><i class="fa fa-bars"><?php echo $i++; ?> &nbsp;</i></td>
                                        <td>
                                            <?php echo $this->Html->link($question['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $question['QuestionSet']['id'])); ?>
                                        </td>
                                        <td><?php echo h($question['Question']['qsn_desc']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link($question['QuestionType']['qsn_type'], array('controller' => 'qsn_types', 'action' => 'view', $question['QuestionType']['id'])); ?>
                                        </td>
    <!--                                        <td><?php // echo h($question['Question']['qsu_order']);     ?>&nbsp;</td>-->
                                        <td>
                                            <?php echo $this->Html->link($question['ValidationRule']['rule_name'], array('controller' => 'question_sets', 'action' => 'view', $question['ValidationRule']['id'])); ?>
                                        </td>
                                        <!--<td class="actions"></td>-->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add questions
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php echo $this->Form->create('Question', array('class' => 'form-horizontal', 'role' => 'form')); ?>
                            <?php
                            echo $this->Form->input('qsn_set_id', array("label" => false, "type" => "hidden",
                                "value" => $questionSets["QuestionSet"]["id"]));
                            ?>
                            <div class="form-group">
                                <label>Question</label>
                                <?php
                                echo $this->Form->input('qsn_desc', array('label' => false,
                                    'id' => 'qsn_desc', 'class' => 'form-control'));
                                ?>
                                <p class="help-block">Enter the question here...</p>
                            </div>
                            <div class="form-group">
                                <label>Question help text</label>
                                <?php
                                echo $this->Form->input('qsn_help', array('label' => false,
                                    'id' => 'qsn_help', 'class' => 'form-control'));
                                ?>
                                <p class="help-block">Enter the help here...</p>
                            </div>

                            <div class="form-group">
                                <label>Question type</label>
                                <?php
                                echo $this->Form->input('qsn_type_id', array('label' => false,
                                    'id' => 'qsn_type_id', 'class' => 'form-control'));
                                ?>
                                <p class="help-block">Enter the description here...</p>
                            </div>
                            <div class="form-group" id="extraDiv" >
                                <label>Add selections</label>
                                <div class="col-md-8">
                                    <div  id="txtThings" class="col-md-6">
                                        <input type="text" class="form-control" name="data[SelectMisc][]" ></input>
                                    </div> 
                                    <div class="col-md-2" id="btns">
                                        <button id="btnAddMore" class="fa fa-plus " style="height: 34px;" ></button>
                                    </div>
                                </div>
                                <br>
                                <p class="help-block">Enter the options here...</p>
                            </div>
                            <div class="form-group form-inline">
                                <label>Required?</label>
                                <?php echo $this->Form->input('is_ans_required', array('label' => false, 'type' => 'checkbox', 'class' => 'form-control')); ?>
                                <p class="help-block">Is this field required?</p>
                            </div>
                            <div class="form-group form-inline" id="validblock">
                                
                                <div class="col-md-4">
                                    <select class="form-control" name="data[Question][validity_rule_id]" id="validpar">
                                        <option value="">Select Validation</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control col-md-2" placeholder="What" name="data[Question][validation_text]">
                                <input type="text" class="form-control col-md-4" placeholder="Error text here" name="data[Question][validation_error_text]">
                                <p class="help-block">Validate the field</p>
                            </div>
                            <!--                                <div class="form-group">
                                                                <label>Question Rule</label>
                            <?php // echo $this->Form->input('validity_rule_id', array('label' => false, 'empty' => true, 'id' => 'qsn_rules', 'class' => 'form-control'));   ?>
                                                                <p class="help-block">Enter the rule(optional) here...</p>
                                                            </div>-->

                            <!--div class="form-group">
                                <label>Question Order</label-->
                            <?php // echo $this->Form->input('qsu_order', array('type'=>'hidden', 'label' => false, 'value' => 10 + $questions[$i - 2]['Question']['qsu_order'], 'id' => 'qsu_order', 'class' => 'form-control')); ?>
                            <!--p class="help-block">Enter any numeric code or the order of the question here</p>
                        </div-->
                            <input type="submit" class="fa fa-plus btn btn-success" value="Add Question"/> 
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
<script type="text/javascript">
    $(document).ready(function() {

        $('#extraDiv').hide();
        var obj = <?php echo json_encode($data_array); ?>;
        var elems = 0;
        $('#btnAddMore').click(function(event) {
            event.preventDefault();
            $('input[name="data[SelectMisc][]"]').each(function(index) {
                if (this.value == "") {
                    alert("Please insert the options correctly");
                    return false;
                }
                else {
                    elems++;
                    $('#txtThings').prepend('<input type="text" class="form-control" id ="things' + elems + '" name="data[SelectMisc][]" />');
                    $('#btns').append('<button  style="height: 34px;" id="btnRemoveElem' + elems + '" class="fa fa-minus rmbelem" flag="' + elems + '"'
                            + ' onclick="$(\'#things' + elems + '\').remove();$(this).remove();"></button>');
                }
            });

            //return false;

        });

        $('#qsn_type_id').on('change', function() {
            $.get(website + "UIAPI/getValidation1/" + $('#qsn_type_id option:selected').val(), function(data) {
                $("#validpar").html(data);
            });
            val = this.value + "id";
            //console.log(val + "  " + obj[this.value + "id"]);
            if (obj[this.value + "id"] == "1") {
                $('#extraDiv').slideDown("slow", function() {
                    //alert('found');
                });
            }
            else {
                $('#extraDiv').slideUp("slow");
            }
        });
//        $('.rmbelem').on('click', function() {
//            alert($(this).attr('flag'));
//            $("#things" + $(this).attr('flag')).remove();$(this).remove();
//        });
//        {
//            alert($(this).attr('flag'));
//            $("#things" + $(this).attr('flag')).remove();
//            $(this).remove();
//        }
//        );
//        function removeElem(elem1,elem2){
//        //alert(elem);
//        $("#things" + elem1).remove();
//        $(elem2).remove();
//        return false;
//    }
    });

</script>

