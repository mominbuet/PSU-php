
<?php echo $this->Html->css('morris');
echo $this->Html->css('timeline');
?>
<div class="row">
    <div class="col-lg-12">
        <div style="float:left"><h1 class="page-header">Dashboard</h1></div>
		<div style="float:right"><a href="<?php echo $this->webroot.'files/psu.apk'?>">Download Mobile APP</a></div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $answerCount ?></div>
                        <div>New Survey Entries!</div>
                    </div>
                </div>
            </div>
            <a href="./UsersQuestionData/">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $qsetCount ?></div>
                        <div>Surveys</div>
                    </div>
                </div>
            </div>
            <a href="./QuestionSets/">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= $usersCount ?></div>
                        <div>Active Users</div>
                    </div>
                </div>
            </div>
            <a href="./Users/">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row" style="display: none;">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Survey Entries

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Date wise Survey Entries

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Survey No</th>
                                        <th>Date</th>
                                        <th>User Count</th>
                                        <th>Entries</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>01/21/2015</td>
                                        <td>154</td>
                                        <td>547</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>01/22/2015</td>
                                        <td>158</td>
                                        <td>744</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>01/23/2015</td>
                                        <td>145</td>
                                        <td>502</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.col-lg-4 (nested) -->
                    <div class="col-lg-8">
                        <div id="morris-bar-chart"></div>
                    </div>
                    <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <!--        <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> Notifications Panel
                    </div>
                     /.panel-heading 
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <i class="fa fa-comment fa-fw"></i> New Entry
                                <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-twitter fa-fw"></i> 3 New Users
                                <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                </span>
                            </a>
                            <a href="#" class="list-group-item">
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                </span>
                            </a>
        
                        </div>
                         /.list-group 
                        <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                    </div>
                     /.panel-body 
                </div>-->
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Today's Entry count
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <a href="#" class="btn btn-default btn-block">View Details</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>
    <!-- /.col-lg-4 -->
</div>
<div class="row">
    <div id="map-canvas" style="width: 100%;height: 100%;margin: 0px;padding: 10px; position: absolute"></div>



<script>
    var inputs = <?php echo json_encode($usersQuestionData); ?>;
//    $(document).ready(function () {
//        $("#btnSubmit").on("click", function () {
//            if ($("#survey_id  option:selected").val() != 0) {
//                if ($("#user_id  option:selected").val() == 0)
//                    window.location.replace(website + "UsersQuestionData/map/" + $("#survey_id  option:selected").val());
//                else
//                    window.location.replace(website + "UsersQuestionData/map/" + $("#survey_id  option:selected").val() +
//                            "/" + $("#user_id  option:selected").val());
//            } else
//                alert("Please select a Survey first.");
//        });
//    });
    function initialize() {
//        console.log(inputs);
//        var locations = [
//            ['Bondi Beach', -33.890542, 151.274856, 4],
//            ['Coogee Beach', -33.923036, 151.259052, 5],
//            ['Cronulla Beach', -34.028249, 151.157507, 3],
//            ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
//            ['Maroubra Beach', -33.950198, 151.259302, 1]
//        ];
        var mapOptions = {
            zoom: 10,
            center: new google.maps.LatLng(23.7806365, 90.4193257)
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
//        for (i = 0; i < locations.length; i++) {
//            marker = new google.maps.Marker({
//                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//                map: map
//            });
//
//            google.maps.event.addListener(marker, 'click', (function(marker, i) {
//                return function() {
//                    infowindow.setContent(locations[i][0]);
//                    infowindow.open(map, marker);
//                }
//            })(marker, i));
//        }
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var markers = [];
        for (i = 0; i < inputs.data.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(inputs.data[i].UsersQuestionData.geo_lat, inputs.data[i].UsersQuestionData.geo_lon),
                animation: google.maps.Animation.DROP,
                map: map,
                title: inputs.data[i].QuestionSet.qsn_set_name + ""
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    var contentString = "<h5>" + inputs.data[i].QuestionSet.qsn_set_name + "</h5>" +
                            "<table class='table table-responsive'>" +
                            "<tr><td>User:</td><td> " + inputs.data[i].User.user_name + "</td><tr>" +
                            "<tr><td>Time:</td><td> " + inputs.data[i].UsersQuestionData.insert_time + "</td><tr>";
                    $.getJSON(website + "SurveyAPI/get_answers/" + inputs.data[i].UsersQuestionData.id,
                            function (data) {
                                $.each(data, function (key, val) {
//                                    console.log(key);
//                                    console.log(val);
//                                    items.push("<p>" + val +" : "+ "</p>");
                                    contentString += "<tr><td>" + val.Question.qsn_desc + ":</td><td> " +
                                            ((val.QuestionAnswer.qsn_answer.lastIndexOf("image/") >-1)?
                                                    '<img width="100" src="/PSU/SurveyAPI/get_image_answer_id/'+val.QuestionAnswer.qsn_answer+'"/>'
                                                    : val.QuestionAnswer.qsn_answer)
                                            +"</td></tr>";

                                });
                                infowindow.setContent(contentString);
                                infowindow.open(map, marker);
                            });



//                    if (marker.getAnimation() != null) {
//                        marker.setAnimation(null);
//                    } else {
//                        marker.setAnimation(google.maps.Animation.BOUNCE);
//                    }
                }
            })(marker, i));
            markers.push(marker);
        }
        var mcOptions = {gridSize: 50, maxZoom: 15};
        var markerCluster = new MarkerClusterer(map, markers, mcOptions);
    }

    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
                '&signed_in=true&callback=initialize';
        document.body.appendChild(script);
    }

    window.onload = loadScript;

</script>
<?php echo $this->Html->script('marker_clusterer'); ?>
</div>
<?php
echo $this->Html->script('raphael-min');
echo $this->Html->script('morris.min');
echo $this->Html->script('morris-data');
?>
<script type="text/javascript" >

</script>