<div class="row">;
    <div class="col-lg-12">

        <div class="col-lg-4">
            <label>Select Survey </label>
            <?php
            echo $this->Form->input('survey_id', array('default' => $set_survey,
                'options' => $questionSets, "name" => "survey_id",
                'empty' => 'Select Survey',
                'label' => false,
                'class' => 'form-control'));
            ?>
        </div>
        <div class="col-lg-4 pull-right">
            <label>Select User </label>
            <?php
            echo $this->Form->input('user_id', array('default' => $set_user,
                "name" => "user_id",
                'empty' => 'Select User',
                'label' => false,
                'class' => 'form-control'));
            ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="col-lg-12">
        <div class="col-lg-4 pull-right"><button id="btnSubmit" class="btn btn-primary">Submit</button></div>
    </div>
</div>
<?php // debug($usersQuestionData); ?>

<div id="map-canvas" style="width: 100%;height: 100%;margin: 0px;padding: 10px; position: absolute"></div>



<script>
    var inputs = <?php echo json_encode($usersQuestionData); ?>;
    $(document).ready(function () {
        $("#btnSubmit").on("click", function () {
            if ($("#survey_id  option:selected").val() != 0) {
                if ($("#user_id  option:selected").val() == 0)
                    window.location.replace(website + "UsersQuestionData/map/" + $("#survey_id  option:selected").val());
                else
                    window.location.replace(website + "UsersQuestionData/map/" + $("#survey_id  option:selected").val() +
                            "/" + $("#user_id  option:selected").val());
            } else
                alert("Please select a Survey first.");
        });
    });
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

