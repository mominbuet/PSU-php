<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->charset(); ?>
        <title>
            Policy Support Unit :: Online Dashboard for Mobile Survey Monitoring
            <?php //echo $this->fetch('title'); ?>
        </title>
		<link href="/PSU/images/favicon.ico" type="image/x-icon" rel="icon">
        <?php
        //echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('sb-admin-2');
        echo $this->Html->css('metisMenu');

        echo $this->Html->css('simonstyle');

        echo $this->Html->script('jquery.min');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('bootstrap.min');
        $logindata = $this->Session->read("LoginSession");

        ?>
        <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

    </head>
    <body role="document">

        <div id="div_modal" class="affix-top middle_loading" style="position:fixed;">
            <div>
                <img  />
                Please Wait...</div>
        </div>
        <script type="text/javascript">
            jQuery.ajaxSetup({
                beforeSend: function () {
                    $('#div_modal').show();
                },
                complete: function () {
                    $('#div_modal').hide();
                },
                success: function () {
                }
            });</script>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img style="float:left" src="/PSU/img/psu_logo.png" alt="PSU Logo" />
                    <a class="navbar-brand" href="/PSU/Pages/">Policy Support Unit</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!--                    <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-messages">
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <strong>Some User 1</strong>
                                                            <span class="pull-right text-muted">
                                                                <em>Yesterday</em>
                                                            </span>
                                                        </div>
                                                        <div>I am working on the survey.........</div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <strong>Some User 2</strong>
                                                            <span class="pull-right text-muted">
                                                                <em>Yesterday</em>
                                                            </span>
                                                        </div>
                                                        <div>Working here.......</div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a class="text-center" href="#">
                                                        <strong>Read All Messages</strong>
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                             /.dropdown-messages 
                                        </li>
                                         /.dropdown 
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-tasks">
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Survey 1</strong>
                                                                <span class="pull-right text-muted">40% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                    <span class="sr-only">40% Complete (success)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Survey 2</strong>
                                                                <span class="pull-right text-muted">20% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                    <span class="sr-only">20% Complete</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <p>
                                                                <strong>Survey 3</strong>
                                                                <span class="pull-right text-muted">60% Complete</span>
                                                            </p>
                                                            <div class="progress progress-striped active">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                    <span class="sr-only">60% Complete (warning)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                    
                                                <li>
                                                    <a class="text-center" href="#">
                                                        <strong>See All Tasks</strong>
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                             /.dropdown-tasks 
                                        </li>
                                         /.dropdown 
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-alerts">
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <i class="fa fa-comment fa-fw"></i> New Message
                                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="#">
                                                        <div>
                                                            <i class="fa fa-tasks fa-fw"></i> New Survey
                                                            <span class="pull-right text-muted small">4 minutes ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a class="text-center" href="#">
                                                        <strong>See All Alerts</strong>
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                             /.dropdown-alerts 
                                        </li>-->
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!--                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                                        </li>
                                                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                                        </li>
                                                        <li class="divider"></li>-->
                            <li><a  href='/PSU/Pages/login/1'><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <p style="float: right;color:#fff;width:12%;margin-top: 1%;border-style: none;border-color: #fff;">User:: <?php echo $logindata["LoginSession"]["user_name"] ;?></p>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="/PSU/Pages"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>User Management<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="/PSU/Users">Users</a></li>
                                    <li><a href="/PSU/Groups">User Groups</a></li>
                                    <li><a href="/PSU/UserGroups">User Group Assignment</a></li>
                                    <li><a href="/PSU/Devices">Device </a></li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <!--                            <li>
                                                            <a href="/PSU/QuestionSets"><i class="fa fa-bar-chart-o fa-fw"></i> Surveys<span class="fa arrow"></span></a>
                                                            <ul class="nav nav-second-level" id="survey_menu">
                                                                <li><a href="#">Survey 1</a></li>
                            
                                                            </ul>
                                                             /.nav-second-level 
                                                        </li>-->

                            <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i>Survey Activities <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li><a href="/PSU/QuestionSets">Surveys</a></li>
                                    <?php if ($this->Session->read('Auth.User.User.superuser') == '1'): ?>
                                    <!--                                        <li><a href="/PSU/QuestionSets/Add">Add Survey</a></li>-->

                                    <?php endif; ?>
                                    <li><a href="/PSU/QuestionGroups">Assign Survey</a></li>
                                    <li><a href="/PSU/UsersQuestionData">User Data</a></li>
                                </ul>
                            </li>
                            <!--                            <li>
                                                            <a href="/PSU/QuestionTypes/"><i class="fa fa-question fa-fw"></i>Question Type</a>
                                                        </li>-->
                            <!--li>
                                <a href="/PSU/ValidationRules/"><i class="fa fa-lock fa-fw"></i>Validation Rules</a>
                            </li>-->
                            <li>
                                <!--<a href="#"><i class="fa fa-table fa-fw"></i> Reports</a>-->
                                <a href="#"><i class="fa fa-table fa-fw"></i> Reports<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!--<li><a href="/PSU/report_manager/reports">Report Generation</a></li>-->
                                    <li><a href="/PSU/UsersQuestionData/summaryreport">Report on Survey</a></li>
                                    <!--                                    <li><a href="/PSU/UsersQuestionData/chartreport">Pie Chart Report</a></li>-->
                                    <li><a href="/PSU/UsersQuestionData/surveychart">Survey Chart</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="/PSU/UserMessages/index"><i class="fa fa-envelope-square fa-fw"></i> Messages</a>
                            </li>

                            <li>
                                <a href="/PSU/UsersQuestionData/map"><i class="fa fa-map-marker fa-fw"></i> Map</a>
                            </li>
                            <?php if ($this->Session->read('Auth.User.User.superuser') == '1'): ?>
                            <li>
                                <a href="/PSU/AndroidApps/"><i class="fa fa-file-o fa-fw"></i> File Upload</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fire fa-fw"></i>Setup Data <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <!--li><a href="/PSU/SelectDivisions">Division</a></li-->
                                    <li><a href="/PSU/SelectDistricts">District</a></li>
                                    <li><a href="/PSU/SelectUpzillas">Upzilla</a></li>
                                    <li><a href="/PSU/SelectUnions">Union</a></li>
                                    <!--li><a href="/PSU/SelectVillages">Villages</a></li-->
                                    <li><a href="/PSU/SelectWaterPointTypes">Water Point Types</a></li>
                                    <li><a href="/PSU/SelectOwnerships">Ownership Types</a></li>
                                    <li><a href="/PSU/SelectLandTypes">Land Types</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="/PSU/UserHistory"><i class="fa fa-history fa-fw"></i> User Log</a>
                            </li>
                            <li>
                                <a href="/PSU/Pages/login/1"><i class="fa fa-files-o fa-fw"></i> logout</a>
                            </li>
                            <!--                            <li>
                                                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                                            <ul class="nav nav-second-level">
                                                                <li>
                                                                    <a href="blank.html">Blank Page</a>
                                                                </li>
                                                                <li>
                                                                    <a href="login.html">Logout</a>
                                                                </li>
                                                            </ul>
                                                             /.nav-second-level 
                                                        </li>-->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>


            <div id="page-wrapper">
                <?= $this->Session->flash() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <?php
        echo $this->Html->script('metisMenu.min');
        echo $this->Html->script('sb-admin-2');
        ?>
        <script>
            $(document).ready(function () {
                $('#div_modal').hide();
                $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});


//                $.get(website + "SurveyAPI/get_survey", function(data) {
//                    var obj = JSON.parse(data);
//                    if (obj.status == "SUCCESS") {
//                        $("#survey_menu").html();
//                        $("#survey_menu").append("<li><a href='" + website + "QuestionSets/index'>View All</a></li>");
//                        qs = obj.result;
//                        //console.log(JSON.stringify(obj.result));
//                        $.each(qs, function(ind, obj) {
//                            // console.log(ind);
//                            if (ind > 6)
//                                return true;
//                            else {
//                                $("#survey_menu").prepend("<li><a href='" + website + "QuestionSets/View/" + qs[ind].QuestionSet.id + "'>" + qs[ind].QuestionSet.qsn_set_name + "</a></li>");
//                            }
//                        });
//                    }
//                    else {
//                        alert(obj.message);
//                    }
//
//                });
            });
        </script>
    </body>
</html>