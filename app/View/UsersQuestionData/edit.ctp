<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Users Question Data        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Master Entry
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('UsersQuestionData', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> ";
                            echo $this->Form->input('qsn_set_master_id', array('label' => false,'type'=>'hidden', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\">";
                            echo $this->Form->input('id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>user_id</label>";
                            echo $this->Form->input('user_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';

                            echo "<div class=\"form-group\"> <label>Latitude</label>";
                            echo $this->Form->input('geo_lat', array('label' => false, 'disabled','class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Longitude</label>";
                            echo $this->Form->input('geo_lon', array('label' => false,'disabled', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Water Point Code</label>";
                            echo $this->Form->input('water_code', array('label' => false,'disabled', 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Tubewell Code</label>";
                            echo '<input type="text" class="form-control" id="tubewell_code" maxlength="3" />';
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>District</label>";
                            echo $this->Form->input('district_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Upzilla</label>";
                            echo $this->Form->input('upzilla_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Union</label>";
                            echo $this->Form->input('union_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
//                            echo "<div class=\"form-group form-inline\"> <label>Insert Time</label>";
//                            echo $this->Form->input('insert_time', array('label' => false, 'class' => 'form-control'));
//                            echo '</div>';

                            ?>
                            <input type="submit" class="fa fa-plus btn btn-success" value="Edit"/> </form>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <script>
        function upzilla_change(){
            $('#UsersQuestionDataWaterCode').val($("#UsersQuestionDataWaterCode").val().substr(0, 11) +
                        $("#UsersQuestionDataUpzillaId").val() + $("#UsersQuestionDataWaterCode").val().substr(13, $("#UsersQuestionDataWaterCode").val().length));
                $.get(website + "UIAPI/get_union_for_upzilla_districts_by_code/" +
                        $("#UsersQuestionDataDistrictId  option:selected").val()+"/"+ $("#UsersQuestionDataUpzillaId  option:selected").val(), function (data) {
                    $('#UsersQuestionDataUnionId').html(data);
                    $('#UsersQuestionDataWaterCode').val($("#UsersQuestionDataWaterCode").val().substr(0, 13) +
                        $("#UsersQuestionDataUnionId").val() + $("#UsersQuestionDataWaterCode").val().substr(15, $("#UsersQuestionDataWaterCode").val().length));
                });
        }
        $(document).ready(function () {
            $('#tubewell_code').change(function(){
                $('#UsersQuestionDataWaterCode').val(
                        $("#UsersQuestionDataWaterCode").val().substr(0,$("#UsersQuestionDataWaterCode").val().length-3)+
                        $('#tubewell_code').val());
            });
            $("#UsersQuestionDataDistrictId").change(function () {
                $('#UsersQuestionDataWaterCode').val($("#UsersQuestionDataWaterCode").val().substr(0, 9) +
                        $("#UsersQuestionDataDistrictId").val() + $("#UsersQuestionDataWaterCode").val().substr(11, $("#UsersQuestionDataWaterCode").val().length));
                $.get(website + "UIAPI/get_upzilla_for_districts_by_code/" +
                        $("#UsersQuestionDataDistrictId  option:selected").val(), function (data) {
                    $('#UsersQuestionDataUpzillaId').html(data);
//                    $.get(website + "UIAPI/get_union_for_upzilla_districts_by_code/" +
//                            $("#UsersQuestionDataDistrictId  option:selected").val(), function (data) {
//                        $('#UsersQuestionDataUnionId').html(data);
//                    });
                     upzilla_change();
                });

            });
            $("#UsersQuestionDataUpzillaId").change(function () {
                upzilla_change();
            });
            $("#UsersQuestionDataUnionId").change(function () {
                $('#UsersQuestionDataWaterCode').val($("#UsersQuestionDataWaterCode").val().substr(0, 13) +
                        $("#UsersQuestionDataUnionId").val() + $("#UsersQuestionDataWaterCode").val().substr(15, $("#UsersQuestionDataWaterCode").val().length));
            });
        });

    </script>