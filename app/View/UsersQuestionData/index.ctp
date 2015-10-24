<style>
    table
    {
        overflow:scroll;
    }
</style>
<div class="row">;
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo __('Users Question Answers'); ?></h1>
        <?php echo $this->Html->link(__('See Full Map'), array('action' => 'map'), array('class' => 'btn btn-primary pull-right')); ?>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo $this->Form->create("UsersQuestionData", array("type" => "get", 'class' => 'form-horizontal', 'role' => 'form', "action" => "index"));
            echo '<div class="col-lg-12"><div class="col-lg-8">';
            echo "<div class='form-group col-lg-4'> <label>Select Survey </label>";
            echo $this->Form->input('questionSets', array('label' => false, 'div' => false, 'class' => 'form-control', 'empty' => 'Select Survey',
                'default' => $set_qset));
            echo '</div>';
            echo "<div class='form-group col-lg-4 pull-right'> <label>User Name</label>";
            echo $this->Form->input('user_id', array('default' => $set_user, 'div' => false,
                'label' => false, 'class' => 'form-control', 'empty' => 'Select User'));

            echo '</div></div><div class="col-lg-8">';
            echo "<div class='form-group col-lg-4'> <label>Date From</label>";
            echo $this->Form->input('Date_from', array('label' => false, 'div' => false, 'class' => 'form-control datepicker'));
            echo '</div>';
            echo "<div class='form-group  col-lg-4 pull-right'> <label>Date To</label>";
            echo $this->Form->input('Date_To', array('label' => false, 'div' => false, 'class' => 'form-control datepicker'));

            echo '</div></div><div id="duplicateDIV" class="col-lg-8">';
            echo "<div class='form-group form-inline col-lg-4'> <label>Duplicate&nbsp;&nbsp;</label>";
            echo $this->Form->input('duplicate', array('label' => false, 'type' => 'checkbox', 'default' => $duplicate, 'div' => false, 'class' => 'form-control '));
            echo '</div></div></div>';
            ?>
            <div class="col-lg-8">
                <input type="submit" class="fa fa-plus btn btn-success pull-right"  value="Search"/> 
            </div></form> 
        </div>
    </div>
    <br>
    <?php if (isset($usersQuestionData)) : ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-heading">
                        <?php echo __('All Users Question answers'); ?>      </div>       
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>

                                        <th><?php echo $this->Paginator->sort('user_id'); ?></th>

                                        <!--<th>Location</th>-->

                                        <th  style="font-size:12px;"><?php echo $this->Paginator->sort('insert_time'); ?></th> 
                                        <th  style="font-size:12px;"><?php echo $this->Paginator->sort('water_code'); ?></th>
                                        <?php foreach ($questions as $questions): ?>
                                            <th  style="font-size:12px;"><?= $questions ?></th>
                                        <?php endforeach; ?>
                                        <th>Verified?</th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usersQuestionData as $usersQuestionData): ?>
                                        <tr>
                                            <!--<td><?php // echo h($usersQuestionData['UsersQuestionData']['id']);              ?>&nbsp;</td>-->
                                            <td>
                                                <?php echo $this->Html->link($usersQuestionData['User']['user_name'], array('controller' => 'users', 'action' => 'view', $usersQuestionData['User']['id'])); ?>
                                            </td>
                                            <!--                                        <td>
                                            <?php //echo $this->Html->link($usersQuestionData['QuestionSet']['qsn_set_name'], array('controller' => 'question_sets', 'action' => 'view', $usersQuestionData['QuestionSet']['id'])); ?>
                                                                                </td>-->

                                            <!--                                            <td><a href="https://www.google.com/maps/place/
                                            <?php //echo $usersQuestionData['UsersQuestionData']['geo_lat']; ?>,
                                            <?php //echo $usersQuestionData['UsersQuestionData']['geo_lon']; ?>" target="_blank">
                                            <?php //echo $usersQuestionData['UsersQuestionData']['geo_lat']; ?>,
                                            <?php // echo $usersQuestionData['UsersQuestionData']['geo_lon']; ?></a> </td>-->

                                            <td style="font-size:12px;"><?php echo h($usersQuestionData['UsersQuestionData']['insert_time']); ?>&nbsp;</td>
                                            <td style="font-size:12px;" flg='water_code'><?php echo h($usersQuestionData['UsersQuestionData']['water_code']); ?>&nbsp;</td>

                                            <?php foreach ($usersQuestionData['QuestionAnswers'] as $val): ?>

                                                <td><?=
                                                    // need to change this on production
                                                    ((strpos($val, 'image/') !== false) ?
                                                            '<img height="80" src="/PSU/SurveyAPI/get_image_answer_id/' . $val . '"/>' : $val);
                                                    ?></td>
                                            <?php endforeach; ?>
                                            <td><?=
                                                ($usersQuestionData['User']['id'] == $this->Session->read('Auth.User.User.id') ||
                                                $this->Session->read('Auth.User.User.superuser') == 1) ?
                                                        (($usersQuestionData['UsersQuestionData']['is_verify'] == 0) ?
                                                                '<button class="btn btn-warning btn-sm btnVerify" tag="' . $usersQuestionData['UsersQuestionData']['id'] . '">Verify</button>' : "Verified") : ""
                                                ?>&nbsp;</td>
                                            <td class="actions">
                                                <?php //echo $this->Html->link(__('View'), array('action' => 'view', $usersQuestionData['UsersQuestionData']['id']));   ?>

                                                <?php
                                                ?>

                                                <?php
                                                if (//$usersQuestionData['User']['id'] == $this->Session->read('Auth.User.User.id') ||
                                                        $this->Session->read('Auth.User.User.superuser') == 1) :
                                                    if ($usersQuestionData['UsersQuestionData']['is_verify'] == 0) :
                                                        echo '<button class="btn btn-sm btn-info answers"  data-toggle="modal" data-target="#myModal" flg ="' . $usersQuestionData['UsersQuestionData']['id'] . '" >Answers</button>' ;
                                                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersQuestionData['UsersQuestionData']['id']), array('class' => 'btn btn-sm btn-warning'));
                                                        $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersQuestionData['UsersQuestionData']['id']), array('class' => 'btn btn-sm btn-danger'), __('Are you sure you want to delete # %s?', $usersQuestionData['UsersQuestionData']['id']));
                                                    endif;
                                                endif;
                                                ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <p>
                                <?php
                                echo $this->Paginator->counter(array(
                                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                                ));
                                ?>                        </p>
                            <div class="paging">
                                <?php
                                echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                                echo $this->Paginator->numbers(array('separator' => ''));
                                echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Answers</h4>
            </div>
            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getUsers(user) {

        if ($("#UsersQuestionDataQuestionSets").val() != 0) {
            $('#duplicateDIV').show();
            $.get(website + "UIAPI/get_users_for_survey/" +
                    $("#UsersQuestionDataQuestionSets  option:selected").val(), function (data) {
                $('#UsersQuestionDataUserId').html(data);
                if (user !== 0) {
//            alert(user);
                    $('#UsersQuestionDataUserId option[value="' + user + '"]').attr('selected', "selected");
                }
            });
        } else
            $('#duplicateDIV').hide();

    }
    $(function () {
        $("#UsersQuestionDataQuestionSets").change(function () {
            getUsers();
        });
    });
    $(document).ready(function () {
        $('#duplicateDIV').hide();
        $('.btnVerify').click(function () {
            var btn = $(this);
            $.get(website + "UIAPI/verify_answer/" + btn.attr('tag'), function (data) {
                if (data == 'success') {
                    btn.hide(800);
                    btn.parent().text('Verified');
                }

            });
        });

        //getUsers( < ? = $set_user ? > );
        getUsers(<?php echo $set_user; ?>);
        $(".answers").click(function () {
            var res = $(this).attr('flg');
            $('.modal-body').html("");
            $.get(website + "SurveyAPI/get_answers/" + res, function (data) {
                data = JSON.parse(data);
//                console.log(data.length);
//                $('.modal-body').append('<p><b>Image:</b><img src="' + website + "SurveyAPI/get_image_answer_id/" + data[0].UsersQuestionData.id + '" /></p>');
                for (i = 0; i < data.length; i++) {
//                    console.log(data[i]);
                    $('.modal-body').append('<h3><b>Question:</b> ' + data[i].Question.qsn_desc + '</h3>');
                    if (data[i].QuestionAnswer.qsn_answer.indexOf("image/") > -1)
                        $('.modal-body').append('<p><b>Answer:</b> ' +
                                '<img width="200" src="/PSU/SurveyAPI/get_image_answer_id/' +
                                data[i].QuestionAnswer.qsn_answer + '"/>' + '</p>');
                    else
                        $('.modal-body').append('<p><b>Answer:</b> ' + data[i].QuestionAnswer.qsn_answer +
                                "<a href='/PSU/QuestionAnswers/edit/" + data[i].QuestionAnswer.id + "' target='_blank' class='btn btn-sm'>Edit</a>" +
                                '</p>');
//                    $('.modal-body').append('<p><b>water_code:</b> ' + data[i].UsersQuestionData.water_code + '</p>');
//                    $('.modal-body').append('<p><b>Lat:</b> ' + data[i].UsersQuestionData.geo_lat + '</p>');
//                    $('.modal-body').append('<p><b>Lon:</b> ' + data[i].UsersQuestionData.geo_lon + '</p>');

                }

            });
        });
    });
</script>