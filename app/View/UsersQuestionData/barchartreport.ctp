
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Generate Chart'); ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo $this->Form->create(null, array('url' => array('controller' => 'UsersQuestionData', 'action' => 'chartreport'),
                "type" => "get", 'class' => 'form-horizontal', 'role' => 'form'));
            echo '<div class="col-lg-12"><div class="col-lg-8">';
            echo "<div class='form-group col-lg-4'> <label>X</label>";
            echo $this->Form->input('column1', array('default' => $set_col1, 'options' => $column1,
                'label' => false, 'class' => 'form-control'));
            echo '</div>';
            echo "<div class='form-group col-lg-4 pull-right'> <label>Y(Count)</label>";
            echo $this->Form->input('column2', array('label' => false, 'class' => 'form-control', 'empty' => 'All',
                'default' => $set_col2, 'options' => $column2));
            echo '</div>';
            echo '</div>';
            ?>
            <div class="col-lg-12">
                <input id="genBarChart" type="submit" class="fa fa-plus btn btn-success pull-right"  value="Generate"/> 
            </div></form> 
        </div>
    </div>

    <div class="panel panel-default col-lg-8">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Chart
        </div>
        <div class="panel-body">
            <div id="bar-chart"></div>
            <a href="#" class="btn btn-default btn-block">View Details</a>
        </div>
        <!-- /.panel-body -->
    </div>
</div>
<?php
echo $this->Html->script('raphael-min');
echo $this->Html->script('morris.min');
?>
<script>
    $(document).ready(function() {
        $("#genBarChart").click(function(e) {
            e.preventDefault();

            $.get(website + "SurveyAPI/chartdata/" + $("#UsersQuestionDataColumn1").val() + "/" +
                    $("#UsersQuestionDataColumn2").val(), function(data) {
                $("#bar-chart").html("");
                data = JSON.parse(data);
                var chartdata = new Array();
                $.each(data, function(index, item) {
//                    consoleObject.keys.log(key+":"+value);
//                    console.log(data[index]['0'].cnt +
//                            "   " + data[index].UsersQuestionData.col);
//                    chartdata.push({label: data[index]['0']['cnt'], value: data[index]['UsersQuestionData']['col']});
                    chartdata.push({y: data[index]['key'], x: data[index]['value']});
                });
                Morris.Bar({
                    element: 'bar-chart',
                    data: chartdata,
                    xkey: 'y',
                    ykeys: ['x'],
                    labels: [$("#UsersQuestionDataColumn1 option:selected").text(), $("#UsersQuestionDataColumn2 option:selected").text()]
//                data: [
//                    {label: "Download Sales", value: 12},
//                    {label: "In-Store Sales", value: 30},
//                    {label: "Mail-Order Sales", value: 20}
//                ]
                });
            });

            return false;
        });


    });
</script>