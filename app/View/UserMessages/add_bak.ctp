<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User Messages        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Send Message
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('UserMessage', array('class' => 'form-horizontal', 'role' => 'form')); ?>


                            <?php
                            echo "<div class=\"form-group\"> <label>question_set_id</label>";
                            echo $this->Form->input('question_set_id', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>user_id</label>";
                            echo $this->Form->input('user_id', array('empty'=>'Select Survey','label' => false, 'class' => 'form-control'));
                            echo '</div>';

                            echo "<div class=\"form-group\"> <label>Message Subject</label>";
                            echo $this->Form->input('message_text', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Full Message</label>";
                            ?>
                            <!--<textarea cols="8" rows="4" class="form-control" name="data[UserMessage][full_message]"></textarea>-->
                            <?php
                            echo $this->Form->input('full_message', array('label' => false, 'class' => 'form-control','type'=>'textarea'));
                            echo '</div>';
                            echo "<div class=\"form-group\"> <label>Optional Text</label>";
                            echo $this->Form->input('optional_data', array('label' => false, 'class' => 'form-control'));
                            echo '</div>';
                            ?>
                            <input type="submit" class="fa fa-plus btn btn-success" value="Add/Edit"/> </form>                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<script>
    function getUsers() {

        if ($("#UserMessageQuestionSetId").val() != 0) {
            $.get(website + "UIAPI/get_users_for_survey/" +
                    $("#UserMessageQuestionSetId option:selected").val(), function(data) {
                $('#UserMessageUserId').html(data);
//                if (user !== 0) {
//                    $('#UsersQuestionDataUserId option[value="' + user + '"]').attr('selected', "selected");
//                }
            });
        }

    }
    $(function() {
        $("#UserMessageQuestionSetId").change(function() {
            getUsers();
        });
    });
</script>