<div class="row panel ">
    <div class="col-lg-12" style='padding-top: 10px;'>
        <div class="col-lg-6">
            <div class='form-group col-lg-4' > <label>Survey Name</label>
                <?php
                echo $this->Form->input('survey_id', array('options' => $surveys, "name" => "survey_id", 'empty' => 'Select Survey',
                    'label' => false,
                    'class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group col-lg-4 ">
                <label>Chart Type</label>
                <select id="charttype" class="form-control">
                    <option value="bar">Bar</option>
                    <option value="pie">Pie</option>
                </select>
            </div>
        </div>

    </div>
    <div class="row panel ">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <label>Column1</label>
                <select id="column1" class="form-control">
                    <option value="">Select Survey First</option>
                </select>
            </div>
            <div class="col-lg-4">
                <label>Options</label>
                <select id="options" class="form-control">
                    <option value="count">Count</option>
                    <option value="sum">Sum</option>
                    <option value="avg">Average</option>
                    <option value="perc">Percentage</option>
                </select>
            </div>

            <div class="col-lg-4">
                <label>Column2</label>
                <select id="column2" class="form-control">
                    <option value="">Select Survey First</option>
                </select>
            </div>
        </div>
        <button class="btn btn-success pull-right " id="GenerateReport">Generate</button>
    </div>
    <div class="row panel ">
        <div class="panel panel-default col-lg-8">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Chart
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <a href="#" class="btn btn-default btn-block">View Details</a>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>

    <?php
    echo $this->Html->script('raphael-min');
    echo $this->Html->script('morris.min');
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#survey_id").on("change", function() {
                $.get(website + "SurveyAPI/generate_table/" + $("#survey_id option:selected").val(), function(data1) {
                    setTimeout(function() {
                        //                    window.location = website + "report_manager/reports/wizard/new/" + $("#survey_id option:selected").val() + "s";
                        $.get(website + "UIAPI/getColumns/" + $("#survey_id option:selected").val(), function(data) {
                            
                            $("#column2").html(data);
                            $("#column1").html(data);
                            $("#div_modal").hide();

                        });
                    }, 1000);
                    $("#div_modal").show();

                });
            });
            $("#GenerateReport").on("click", function() {
                $.get(website + "SurveyAPI/chartdata2/" + $("#survey_id option:selected").val( ) + "/" +
                        $("#column1 option:selected").text() + "/" +
                        $("#column2 option:selected").text() + "/" +
                        $("#options option:selected").val()
                        , function(data) {
                            $("#morris-donut-chart").html("");
                            data = JSON.parse(data);
                            if ($("#charttype option:selected").val() == 'bar') {

                                var chartdata = new Array();
                                $.each(data, function(index, item) {
                                    chartdata.push({y: data[index]['key'], x: data[index]['value']});
                                });
                                Morris.Bar({
                                    element: 'morris-donut-chart',
                                    data: chartdata,
                                    xkey: 'y',
                                    ykeys: ['x'],
                                    labels: [$("#column1 option:selected").text(), $("#column2 option:selected").text()]
                                });
                            } else {
                                var chartdata = new Array();
                                $.each(data, function(index, item) {
                                    chartdata.push({label: data[index]['key'], value: data[index]['value']});
                                });
                                Morris.Donut({
                                    element: 'morris-donut-chart',
                                    data: chartdata
                                });
                            }
                        });

            });
        });
    </script>