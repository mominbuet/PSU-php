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

            <!--            <div class="col-lg-4">
                            <label>Column2</label>
                            <select id="column2" class="form-control">
                                <option value="">Select Survey First</option>
                            </select>
                        </div>-->
        </div>
        <button class="btn btn-success col-lg-offset-8 " id="GenerateReport">Generate</button>
    </div>
    <div class="row panel ">
        <div class="panel panel-default col-lg-12">
            <div class="">
                <i class="fa fa-bar-chart-o fa-fw"></i> Chart
            </div>
            <div class="panel-body" style="display:none">
                <div id="morris-donut-chart"></div>
                <a href="#" class="btn btn-default btn-block">View Details</a>
            </div>
            <div class="panel-body">
                <div id="high-chart" style="min-width: 410px; height: 400px; margin: 0 auto"></div>
                <!--<a href="#" class="btn btn-default btn-block">View Details</a>-->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <?php
    echo $this->Html->script('raphael-min');
    echo $this->Html->script('morris.min');
    ?>
    <script type="text/javascript">
        function genHighBarChart(xkeys, data) {
            console.log(data);
            $('#high-chart').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Chart'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: xkeys,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Count'
                    }
                },
//                plotOptions: {
//                    column: {
//                        pointPadding: 0.2,
//                        borderWidth: 0
//                    }
//                },
                series: [{'data':data}]
            });
        }
        
        $(document).ready(function () {
            $("#survey_id").on("change", function () {
                $.get(website + "SurveyAPI/generate_table/" + $("#survey_id option:selected").val(), function (data1) {
                    setTimeout(function () {
                        //                    window.location = website + "report_manager/reports/wizard/new/" + $("#survey_id option:selected").val() + "s";
                        $.get(website + "UIAPI/getColumns/" + $("#survey_id option:selected").val(), function (data) {

                            $("#column2").html(data);
                            $("#column1").html(data);
                            $("#div_modal").hide();

                        });
                    }, 1000);
                    $("#div_modal").show();

                });
            });

            $("#GenerateReport").on("click", function () {
                $.get(website + "SurveyAPI/chartdata2/" + $("#survey_id option:selected").val( ) + "/" +
                        $("#column1 option:selected").text() + "/" +
//                        $("#column2 option:selected").text() + "/" +
                        $("#options option:selected").val()
                        , function (data) {
                            $("#high-chart").html("");
                            $("#morris-donut-chart").html("");
                            data = JSON.parse(data);

                            if ($("#charttype option:selected").val() == 'bar') {
                                var xkeys = new Array();

                                var chartdata = new Array();
                                var highChartData = new Array();
                                $.each(data, function (index, item) {
                                    chartdata.push({y: data[index]['key'], x: data[index]['value']});
                                   
                                    highChartData.push(parseInt(data[index]['value'] ));
                                    xkeys.push(data[index]['key']);
                                    
                                });
//                                console.log(highChartData[0]);
                                genHighBarChart(xkeys, highChartData);
//                                Morris.Bar({
//                                    element: 'morris-donut-chart',
//                                    data: chartdata,
//                                    xkey: 'y',
//                                    ykeys: ['x'],
//                                    labels: [$("#column1 option:selected").text(), $("#column2 option:selected").text()],
//                                    stacked: true
//                                });
                            } else {
                                var chartdata = new Array();
                                var chartdata2 = new Array();
                                $.each(data, function (index, item) {
                                    chartdata.push({label: data[index]['key'], value: data[index]['value']});
                                    chartdata2.push({name: data[index]['key'], y: parseInt(data[index]['value'])});
                                });
                                $('#high-chart').highcharts({
                                    chart: {
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: false,
                                        type: 'pie'
                                    },
                                    title: {
                                        text: 'Pie Chart'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: true,
                                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                style: {
                                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                                }
                                            }
                                        }
                                    },
                                    series: [{
                                        name: '',
                                        colorByPoint: true,
                                        data: chartdata2
                                    }]
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