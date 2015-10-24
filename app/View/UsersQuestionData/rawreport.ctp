<?php // debug($upzilla);                                  ?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Filters</h3>
        <button class="btn btn-success pull-right " id="GenerateReport">Generate</button>
        <?php
        echo '<div class="col-lg-12"><div class="col-lg-8">';
        echo "<div class='form-group col-lg-4'> <label>Survey Name</label>";
        echo $this->Form->input('survey_id', array('options' => $surveys, "name" => "survey_id", 'empty' => 'Select Survey',
            'label' => false,
            'class' => 'form-control'));
        echo '</div>';
        echo "<div class='form-group col-lg-4 pull-right'> <label>User Name</label>";
        echo $this->Form->input('user_id', array('options' => $users, 'empty' => 'Select User',
            'label' => false, 'class' => 'form-control'));
        echo '</div></div>';
        echo '<div class="col-lg-8">';
        echo "<div class='form-group col-lg-4'> <label>District</label>";
        echo $this->Form->input('District', array('label' => false,'options' => $districts,'empty' => 'Select District',
            'class' => 'form-control'));
        echo '</div>';
        echo "<div class='form-group col-lg-4 pull-right'> <label>Upzilla</label>";
        echo $this->Form->input('Upzilla', array('label' => false, 'options' => $upzilla,'empty' => 'Select Upzilla',
            'class' => 'form-control'));
        echo '</div></div>';
        echo '<div class="col-lg-8">';
        echo "<div class='form-group col-lg-4'> <label>Date From</label>";
        echo $this->Form->input('Date_from', array('label' => false, 'class' => 'form-control datepicker'));
        echo '</div>';
        echo "<div class='form-group col-lg-4 pull-right'> <label>Date To</label>";
        echo $this->Form->input('Date_To', array('label' => false, 'class' => 'form-control datepicker'));
        echo '</div></div>';
        echo  '</div>'
        ?>
        <div class="col-lg-8">
        <!--<input type="submit" class="fa fa-plus btn btn-success pull-right"  value="Search"/>--> 
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-lg-10" id="QuestionFilters">

    </div>
</div>
<div class="row">
    <div class="col-lg-10" id="controlDiv">
        <div class='form-group col-lg-5'> <label>Column <b>1</b></label>
            <?php
            echo $this->Form->input('column', array("name" => "column[]", "id" => "1", "type" => "select",
                'label' => false, 'class' => 'form-control'));
            ?>
        </div>
        <button id="addmore" class="btn btn-sm pull-right fa fa-plus" ></button>
    </div>

</div>
<div class="row">
    <div id="reportDiv" class="col-lg-12">

    </div>
</div>
<script type="text/javascript">
    var i = 2;
    $(document).ready(function() {
        var filters_for_ques;
        var choices = [];
        var filterIds = [];
        var filtervals = [];
        var qsnConds = [];
        $("#survey_id").change(function() {
            $.get(website + "UIAPI/getQuestions/" + $(this).val())
                    .done(function(data) {
                        choices = [];
                        qsnConds = [];
                        filtervals = [];
                        filterIds = [];
                        $("#reportDiv").html("Loading...");
                        for (var ind = 2; ind < i; ind++) {
                            $("div[tag='data[column]']").remove();
                        }
                        i = 2;
//                        var obj = JSON.parse(data);
                        $("#1").html("");
                        $.each(JSON.parse(data), function(ind, obj) {
                            $("#1").append("<option value='" + ind + "'>" + obj + "</option>");
                        });

                    });
            $.get(website + "UIAPI/getFilters/" + $(this).val())
                    .done(function(data) {
                        $("#QuestionFilters").html("");
                        filters_for_ques = JSON.parse(data);
                        $.each(filters_for_ques, function(ind, obj) {
//                            console.log(ind);

                            $("#QuestionFilters").append("<div class='form-group  form-inline'>" +
                                    "<table><tr><td><label>" + JSON.parse(data)[ind] + "</label></td>" +
                                    '<td><input  style="margin-left: 25px;" class="form-control" name="not' + ind + '"  id="not' + ind + '" type="checkbox"> NOT</td>' +
                                    "<td><select name='cond" + ind + "' id='cond" + ind + "' class='form-control' style='margin-left: 25px;'>" +
                                    "<option value='='>equal </option>" +
                                    "<option value='>='>=></option>" +
                                    "<option value='<='><=</option>" +
                                    "<option value='>'>></option>" +
                                    "<option value='<'><</option>" +
                                    "<option value='LIKE'>LIKE</option>" +
                                    "</select></td>" +
                                    "<td><input type='text' id='val" + ind + "' tag='" + ind + "' name='val" + ind + "' style='margin-left: 25px;' class='form-control'/></rd>" +
                                    "</tr></table></div>");

                        });
                    });
        });
        $("#GenerateReport").on("click", function() {

            for (var ind = 1; ind < i; ind++) {
                if (choices.indexOf($("#" + ind + " option:selected").text() < 0))
                    choices.push($("#" + ind + " option:selected").text());
            }
            $("input[name*='val']").each(function(index) {
                if ($(this).val() != "") {
                    var work = $(this).attr("tag");
                    qsnConds.push($("select[name='cond" + work + "'] option:selected").val())
                    filterIds.push(work);
                    filtervals.push($("input[name='val" + work + "']").val());
//                    console.log(work + " " + $("select[name='cond" + work + "'] option:selected").val() +" "+
//                            $("input[name='val" + work + "']").val());
                }
            })
//            console.log(choices);
            $.post(website + "UIAPI/rawreport", {'column[]': choices,
                'qsnConds[]': qsnConds,
                'filterIds[]': filterIds,
                'filterVals[]': filtervals,
                'survey_id': $("#survey_id option:selected").val(),
                'district_id': $("#District option:selected").val(),
                'upzilla_id': $("#Upzilla option:selected").val(),
                'user_id': $("#user_id option:selected").val(),
                'Date_from': $("#Date_from").val(),
                'Date_To': $("#Date_To").val()})
                    .done(function(data) {
                        $("#reportDiv").html(data);
                        choices = [];
                        filterIds = [];
                        filtervals = [];
                        qsnConds = [];
                    })
        });
        $("#reportDiv").append("Loading....");
        $("#addmore").on("click", function() {
            $("#controlDiv").append("<div class='form-group col-lg-5' tag='data[column]'> <label>Column <b>" + (i) + " </b></label>" +
                    '<select id="' + (i++) + '" name="data[column]" class="form-control" >' + $("#1").html() + "</select>"
                    + "</div>");

        });
    });
</script>