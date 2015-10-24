<div class="row">
    <div class="col-lg-12">

        <?php
        echo '<div class="col-lg-12"><div class="col-lg-8">';
        echo "<div class='form-group col-lg-4'> <label>Survey Name</label>";
        echo $this->Form->input('survey_id', array('options' => $surveys, "name" => "survey_id", 'empty' => 'Select Survey',
            'label' => false,
            'class' => 'form-control'));
        echo '</div></div>';
        ?>
        <button class="btn btn-success pull-right " id="GenerateReport">Generate</button>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#GenerateReport").on("click", function() {
            $.get(website + "SurveyAPI/generate_table/" + $("#survey_id option:selected").val(), function(data) {
                setTimeout(function() {
                    var win = window.open(website + "report_manager/reports/wizard/new/" + $("#survey_id option:selected").val() + "s", '_blank');
                    if (win)
                        win.focus();
                    else
                        window.location.href  = website + "report_manager/reports/wizard/new/" + $("#survey_id option:selected").val() + "s";
                }, 1500);
                //alert("Please wait as we compile your report, if error occurs please refresh the page.");

            });
        });
    });
</script>