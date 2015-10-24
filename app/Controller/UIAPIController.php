<?php

class UIAPIController extends AppController {

    public $components = array('RequestHandler', 'Reuse');

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow();
        $this->autoLayout = FALSE;
        $this->autoRender = FALSE;
    }

    public function set_logout($userID = null) {
        if ($userID) {
            $this->loadModel('UserHistory');
            $this->UserHistory->create();
            $this->UserHistory->save(array('user_id' => $userID,
                'event_details' => "Logged out " . $this->request->header('User-Agent'),
                'ipaddress' => $this->request->clientIp(),
                'event_time' => $this->UserHistory->getDataSource()->expression('NOW()'),
                'user_event' => 'Logged out user in web browser',
            ));
        }
    }

    public function get_options_skip_for_question_edit($questionID = null) {
        if ($questionID) {
            $this->loadModel('SelectMisc');
            echo json_encode($this->SelectMisc->find('list', array('fields' => array('misc_id', 'next_section_id'), 'conditions' => array('question_id' => $questionID))));
        }
    }

    public function get_options_for_question_edit($questionID = null) {
        if ($questionID) {
            $this->loadModel('SelectMisc');
            echo json_encode($this->SelectMisc->find('list', array('conditions' => array('question_id' => $questionID))));
        }
    }

    public function get_upzilla_for_districts_by_code($district_code = null) {
        if ($district_code) {
            $ret = "";
            $this->loadModel("SelectUpzilla");
            $users = $this->SelectUpzilla->find('list', array('fields' => array('upzilla_code', 'upzilla_name'),
                'joins' => array(
                    array(
                        'table' => "pmtc_select_districts",
                        'alias' => 'SelectDistrict',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectUpzilla.district_id = SelectDistrict.district_id')
                    )),
                'conditions' => array('SelectDistrict.district_code' => $district_code)));
//            $this->set('users');

            if (sizeof($users) != 0) {
                foreach ($users as $key => $val) {
                    $ret.='<option value="' . $key . '">' . $val . '</option>';
                }
            }
            echo $ret;
        }
    }

    public function get_union_for_upzilla_districts_by_code($district_code = null, $upzilla_code = null) {
        if ($district_code) {
            $ret = "";
            $this->loadModel("SelectUnion");
            $users = $this->SelectUnion->find('list', array('fields' => array('union_code', 'union_name'),
                'joins' => array(
                    array(
                        'table' => "pmtc_select_upzilla",
                        'alias' => 'SelectUpzilla',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectUpzilla.upzilla_id = SelectUnion.upzilla_id')
                    ), array(
                        'table' => "pmtc_select_districts",
                        'alias' => 'SelectDistrict',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectUpzilla.district_id = SelectDistrict.district_id')
                    )),
                'conditions' => ($upzilla_code) ? array('SelectDistrict.district_code' => $district_code,
                    'SelectUpzilla.upzilla_code' => $upzilla_code) : array('SelectDistrict.district_code' => $district_code)
            ));
//            $this->set('users');

            if (sizeof($users) != 0) {
                foreach ($users as $key => $val) {
                    $ret.='<option value="' . $key . '">' . $val . '</option>';
                }
            }
            echo $ret;
        }
    }

    public function get_users_for_survey($survey_id = null) {
        if ($survey_id) {
//            $this->loadModel("User");
            $users = $this->Reuse->getUsers($survey_id);
//            $this->set('users');
            $ret = "<option value=''>All User</option>";
            if (sizeof($users) != 0) {
                foreach ($users as $key => $val) {
                    $ret.='<option value="' . $key . '">' . $val . '</option>';
                }
            }
            echo $ret;
        }
    }

    public function getMapData($survey_id = null) {

        if ($survey_id) {
            $this->loadModel('UsersQuestionData');
            $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                    'recursive' => 0,
                    'conditions' => array('qsn_set_master_id' => $survey_id),
                    'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                        'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
            )));
            echo json_encode($userQuestionData);
        }
    }

    public function getInfo($qsnSetID = null) {

//        $this->autoLayout = TRUE;
//        $this->autoRender = TRUE;
        if ($qsnSetID) {
            $this->loadModel("QuestionSet");
            $tmp = $this->QuestionSet->find("all", array(
                'recursive' => -1,
                'joins' => array(
                    array(
                        'table' => 'pmtc_question_group',
                        'alias' => 'QuestionGroup',
                        'type' => 'left',
                        'foreignKey' => true,
                        'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
                    ),
                    array(
                        'table' => 'pmtc_groups',
                        'alias' => 'Group',
                        'type' => 'left',
                        'foreignKey' => true,
                        'conditions' => array('QuestionGroup.group_id = Group.id')
                    ),
////                    array(
////                        'table' => 'pmtc_questions',
////                        'alias' => 'Question',
////                        'type' => 'Left',
////                        'foreignKey' => true,
////                        'conditions' => array('Question.qsn_set_id = QuestionSet.id')
////                    ),
////                    array(
////                        'table' => 'pmtc_users_question_data',
////                        'alias' => 'UsersQuestionData',
////                        'type' => 'Left',
////                        'foreignKey' => true,
////                        'conditions' => array('UsersQuestionData.qsn_set_master_id = QuestionSet.id')
////                    )
                ),
                'fields' => array('QuestionSet.*', ' Group.group_name'),
                'conditions' => array('QuestionSet.id' => $qsnSetID)));
            $div = "<div class='col-lg-6' style ='margin-top: 20px;'>";
//            debug($tmp);
            $questionCount = $this->QuestionSet->Question->find("count", array('conditions' => array('Question.qsn_set_id =' => $qsnSetID)));
            $answerCount = $this->QuestionSet->UsersQuestionData->find("count", array('conditions' => array('UsersQuestionData.qsn_set_master_id =' => $qsnSetID)));

            $groupArr = array();
            $group_name = "";
//            debug($tmp);
            foreach ($tmp as $val) {
                if ($val['Group']['group_name'] != null)
                    if (!in_array($val['Group']['group_name'], $groupArr)) {
                        array_push($groupArr, $val['Group']['group_name']);
                        $group_name .= $val['Group']['group_name'] . ",";
                    }
            }
//            debug($groupName);
            $closediv = "</div></div>";
            $res = "";
            $res .= $div . "<div class='col-lg-2'>Name: </div><div class='col-lg-4'><b>" . $tmp[0]["QuestionSet"]["qsn_set_name"] . '</b>' . $closediv;
            $res .= $div . "<div class='col-lg-2'>Description: </div><div class='col-lg-6'><b>" . $tmp[0]["QuestionSet"]["qsn_set_detail"] . '</b>' . $closediv;
            $res .= $div . "<div class='col-lg-2'>Type: </div><div class='col-lg-2'>" . (($tmp[0]["QuestionSet"]["is_survey"] == 1) ? "Survey" : "Folder" ) . $closediv;
            $res .= $div . "<div class='col-lg-2'>Questions: </div><div class='col-lg-2'>" . $questionCount . $closediv;
            $res .= $div . "<div class='col-lg-2'>Active From: </div><div class='col-lg-2'>" . $tmp[0]["QuestionSet"]["active_from"] . $closediv;
            $res .= $div . "<div class='col-lg-2'>Active To: </div><div class='col-lg-2'>" . $tmp[0]["QuestionSet"]["active_to"] . $closediv;
            $res .= $div . "<div class='col-lg-2'>Version: </div><div class='col-lg-2'>" . $tmp[0]["QuestionSet"]["version"] . $closediv;
            $res .= $div . "<div class='col-lg-2'>Survey Committed: </div><div class='col-lg-2'>" . $answerCount . $closediv;
            $res .= $div . "<div class='col-lg-2'>Created: </div><div class='col-lg-2'>" . $tmp[0]["QuestionSet"]["created"] . $closediv;
            $res .= $div . "<div class='col-lg-2'>Groups Assigned: </div><div class='col-lg-2'>" . $group_name . $closediv;
            echo $res;
        }
    }

    public function assignUser($groupID = null, $qsnSetID = null) {
        if ($groupID && $qsnSetID) {
            $this->loadModel("QuestionGroup");
            $this->loadModel("QuestionSet");
            $tmp = $this->QuestionGroup->find("list", array("conditions" => array('group_id' => $groupID, "question_set_id" => $qsnSetID)));
//            debug($tmp);
            if (sizeof($tmp) == 0) {
                $this->QuestionGroup->create();
                $this->QuestionGroup->save(array('group_id' => $groupID, "question_set_id" => $qsnSetID));
            }
            $childs = $this->QuestionSet->find("list", array("fields" => array("id"), "recursive" => 2, "conditions" => array("parent_id" => $qsnSetID)));
            if (sizeof($childs) == 0) {
                return;
            } else {
                foreach ($childs as $value) {
                    $this->assignUser($groupID, $value);
                }
//                return;
            }
            echo "Inserted ";
        }
    }

    public function getValidation1($qsn_type_id = null) {
        $this->loadModel("ValidationRule");
        $columns = $this->ValidationRule->find("list", array('conditions' => array("qsn_type_id" => $qsn_type_id,
                "parent_id" => null)));
        $ret = '<option value="">Select if any</option>';
//        debug($columns);
        foreach ($columns as $key => $value) {

            $tmp = $this->ValidationRule->find("list", array('conditions' => array("parent_id" => $key)));
            if (sizeof($tmp) != 0) {
                $ret.="<optgroup label='$value'>";
                foreach ($tmp as $key2 => $value2) {
                    $ret.="<option value='$key2'>$value2</option>";
                }
                $ret.="</optgroup>";
            } else {
                $ret.="<option value='$key'>$value</option>";
            }
        }
        echo $ret;
    }

    public function getColumns($survey_id = null) {
        $this->loadModel($survey_id);
        $columns = array_keys($this->$survey_id->schema());
        $ret = "";
        foreach ($columns as $value) {
            $ret.="<option>$value</option>";
        }
        echo $ret;
    }

    public function getFilters($survey_id = null) {
        if ($survey_id) {
//            $this->loadModel('UsersQuestionData');
            $this->loadModel('Questions');
//            $belongsTo = $this->UsersQuestionData->getAssociated('belongsTo');
            $qsns = $this->Questions->find("list", array(
                "fields" => array("id", "qsn_desc"),
                "order" => array("qsu_order"),
                "conditions" => array("qsn_set_id" => $survey_id)));
//            $res = array_merge($belongsTo,$qsns);
            echo json_encode($qsns);
        }
    }

    public function getQuestions($survey_id = null) {
        if ($survey_id) {
            $this->loadModel('UsersQuestionData');
            $this->loadModel('Questions');
            $belongsTo = $this->UsersQuestionData->getAssociated('belongsTo');
            $qsns = $this->Questions->find("list", array(
                "fields" => array("id", "qsn_desc"),
                "order" => array("qsu_order"),
                "conditions" => array("qsn_set_id" => $survey_id)));
            $res = array_merge($belongsTo, $qsns);
            echo json_encode($res);
        }
    }

    public function verify_answer($user_qsn_data_id = null) {
        if ($user_qsn_data_id) {
            $this->loadModel('UsersQuestionData');
            $this->UsersQuestionData->read(null, $user_qsn_data_id);
            $this->UsersQuestionData->set(array('is_verify' => 1, 'verify_time' => DboSource::expression('NOW()')));
            if ($this->UsersQuestionData->save())
                echo "success";
            else
                echo "fail";
        }
    }

    public function rawreport() {
        $this->response->disableCache();
        $this->loadModel('UsersQuestionData');
        $this->loadModel('Questions');
        $this->loadModel('SelectDistrict');
        $this->loadModel('SelectUpzilla');
        $this->loadModel('QuestionAnswer');
        $this->UsersQuestionData->recursive = 2;
        $belongsTo = $this->UsersQuestionData->getAssociated('belongsTo');
        $fields = array("Latitude", "Longitude", "Insert Time", "Water Code", "District", "Upzilla", "Image");
        $colums = array();
        $qsns = array();
        foreach ($this->request->data['column'] as $key => $value) {
//            $colums[].=$value;
//            debug($value);
//            array_push($fields, "$value." . $this->QuestionAnswer->UsersQuestionData->$value->displayField);
            if (in_array($value, $belongsTo)) {
                array_push($fields, $value);
                array_push($colums, $value);
            } else {
                array_push($qsns, $value);
            }
        }
        $user_id = array_key_exists('user_id', $this->request->data) ? $this->request->data['user_id'] : NULL;
        $Date_from = array_key_exists('Date_from', $this->request->data) ? $this->request->data['Date_from'] : NULL;
        $Date_To = array_key_exists('Date_To', $this->request->data) ? $this->request->data['Date_To'] : NULL;
        $questionSets = array_key_exists('survey_id', $this->request->data) ? $this->request->data['survey_id'] : NULL;
        $district = array_key_exists('district_id', $this->request->data) ? $this->request->data['district_id'] : NULL;
        $upzilla = array_key_exists('upzilla_id', $this->request->data) ? $this->request->data['upzilla_id'] : NULL;
        $conditions = array();
        if ($questionSets)
            $conditions = array_merge(array('UsersQuestionData.qsn_set_master_id ' => $questionSets), $conditions);
//            $this->set("set_qset", $questionSets);

        if ($user_id)
            $conditions = array_merge(array('UsersQuestionData.user_id ' => $user_id), $conditions);
        if ($district) {
            $district = $this->SelectDistrict->find("first", array("recursive" => -1, "conditions" => array("SelectDistrict.district_id" => $district)));
            $conditions = array_merge(array('UsersQuestionData.district_id ' => $district["SelectDistrict"]["district_code"]), $conditions);
        }
        if ($upzilla) {
            $upzilla = $this->SelectUpzilla->find("first", array("recursive" => -1, "conditions" => array("SelectUpzilla.upzilla_id" => $upzilla)));
//            debug($upzilla["SelectUpzilla"]["upzilla_code"]);
            $conditions = array_merge(array('UsersQuestionData.upzilla_id ' => $upzilla["SelectUpzilla"]["upzilla_code"]), $conditions);
        }
        if ($Date_from)
            $conditions = array_merge(array('UsersQuestionData.insert_time >=' => $Date_from), $conditions);

        if ($Date_To)
            $conditions = array_merge(array('UsersQuestionData.insert_time <=' => $Date_To), $conditions);

        $data = ($this->UsersQuestionData->find("all", array(
//                    'fields' => $fields,
//                                'fields' => "SelectOwnership.*",
//                    "conditions" => array("UsersQuestionData.qsn_set_master_id" => $this->request->data['survey_id']),
                    "conditions" => $conditions,
                    "recursive" => 0,
                    "order" => array('UsersQuestionData.insert_time DESC')
//                    'limit' => 2
        )));
        $questions = array();
//        debug($this->Questions->find("all", array(
//            "fields" => array("qsn_desc", "id"),
//            "order" => array("qsu_order"),
//            "conditions" => array("qsn_set_id" => $questionSets))));
        foreach ($this->Questions->find("all", array(
            "fields" => array("qsn_desc", "id"),
            "order" => array("qsu_order"),
            "conditions" => array("qsn_set_id" => $questionSets))) as $key => $value) {
            $questions [$value["Questions"]["id"]] = $value["Questions"]["qsn_desc"];
//            $this->QuestionAnswer->find("first",array("recursive"=>-1,"conditions"=>array("question_id"=>$value["Questions"]["id"],"user_qsn_data_id"=>11 )))
        }
//        debug($fields);
//        debug($this->request->data['column'][1]);
//        debug($data[0]['UsersQuestionData'][$this->request->data['column'][1]]);
        $result = "<table class='table table-bordered table-stripped'><tr>";
        $result.="<th>#</th>";
        if ($data) {

            foreach ($fields as $k => $v) {
                $result.="<th>$v</th>";
                if ($k == 6)
                    break;
            }

            foreach (array_keys($data[0]) as $val) {
//            debug($val);
                if (in_array($val, $fields)) {
//                    echo $val2;
                    $result.="<th>$val</th>";
                } else {
                    foreach (array_keys($data[0][$val]) as $ky => $val2) {
                        if (in_array($val2, $fields)) {
                            $result.="<th>$val2</th>";
                        }
                    }
                }
            }
            foreach ($questions as $key => $value) {
                if (in_array($value, $qsns)) {
                    $result.="<th>$value</th>";
                }
            }

            $result.="</tr><tbody>";
            $indexTable = 1;
            foreach ($data as $key => $mainvalue) {
                $resulttmp = "";
//                debug($mainvalue["SelectUpzilla"]["upzilla_name"]);
//            if ($key == 0)
//                continue;
                $resulttmp.="<tr class='" . (($indexTable % 2 == 0) ? "success" : "info") . "'><td> " . $indexTable++ . "</td>";
                $distname = '---';
                $upzillaname = "---";
                if ($mainvalue["UsersQuestionData"]["district_id"] != NULL) {
//                    debug($mainvalue["UsersQuestionData"]["district_id"]);
                    $distname = $this->SelectDistrict->find("first", array("recursive" => -1,
                        "conditions" => array("district_code" => $mainvalue["UsersQuestionData"]["district_id"])));
                    $distname = $distname["SelectDistrict"]["district_name"];
                }
                if ($mainvalue["UsersQuestionData"]["upzilla_id"] != NULL) {
                    $upzillaname = $this->SelectUpzilla->find("first", array("recursive" => -1,
                        "conditions" => array("upzilla_code" => $mainvalue["UsersQuestionData"]["upzilla_id"])));
                    $upzillaname = $upzillaname["SelectUpzilla"]["upzilla_name"];
                }
                $resulttmp.="<td> " . $mainvalue["UsersQuestionData"]["geo_lat"] . "</td>";
                $resulttmp.="<td> " . $mainvalue["UsersQuestionData"]["geo_lon"] . "</td>";
                $resulttmp.="<td> " . $mainvalue["UsersQuestionData"]["insert_time"] . "</td>";
                $resulttmp.="<td> " . $mainvalue["UsersQuestionData"]["water_code"] . "</td>";
                $resulttmp.="<td> " . $distname . "</td>";
                $resulttmp.="<td> " . $upzillaname . "</td>";
                $resulttmp.="<td> " . ((!$mainvalue["UsersQuestionData"]["image_url"]) ? "No image" :
                                "<img src='PSU/SurveyAPI/get_image_id/" . $mainvalue["UsersQuestionData"]["id"] . "' height='50'/>") . "</td>"; //changed from absolute to relative url
                foreach ($mainvalue as $key2 => $value) {
                    foreach ($colums as $Cval) {
                        if ($Cval == $key2)
                            $resulttmp.="<td> " . (($mainvalue[$key2][$this->UsersQuestionData->$key2->displayField]) ?
                                            $mainvalue[$key2][$this->UsersQuestionData->$key2->displayField] : "---") . "</td>";
                    }
                }
                $cnd = array();
                $cndText = array();
                if (array_key_exists("qsnConds", $this->request->data)) {
                    foreach ($this->request->data["qsnConds"] as $pkey => $pvalue) {
                        $cndText[$this->request->data["filterIds"][$pkey]] = "qsn_answer " .
                                $this->request->data["qsnConds"][$pkey] .
                                ((!is_numeric($this->request->data["filterVals"][$pkey])) ? "'" : "")
                                . $this->request->data["filterVals"][$pkey] .
                                ((!is_numeric($this->request->data["filterVals"][$pkey])) ? "'" : "");
//                            .((sizeof($this->request->data["qsnConds"])-1==$pkey)?"":" OR ");
                    }
                }
//                
//debug($cnd);
//                $totalList = $this->QuestionAnswer->find("list", array(
//                    "recursive" => -1,
//                    "fields" => "question_id,qsn_answer",
//                    "conditions" => array(
//                        "user_qsn_data_id" => $mainvalue["UsersQuestionData"]["id"],
//                )));
//                debug($cndText);
                $discard = 0;
                foreach ($questions as $key => $value) {
                    if (in_array($value, $qsns)) {
                        $cnd = array_merge($cnd, array("question_id" => $key,
                            "user_qsn_data_id" => $mainvalue["UsersQuestionData"]["id"]));
                        $res = (array_key_exists($key, $cndText) ) ? ($this->QuestionAnswer->query("select qsn_answer
from pmtc_question_answers where user_qsn_data_id = " . $mainvalue["UsersQuestionData"]["id"] .
                                        " and question_id = $key and (select count(*) from pmtc_question_answers where user_qsn_data_id = "
                                        . $mainvalue["UsersQuestionData"]["id"] . " and $cndText[$key] and question_id = $key )>0")) : ($this->QuestionAnswer->query("select qsn_answer
from pmtc_question_answers where user_qsn_data_id = " . $mainvalue["UsersQuestionData"]["id"] .
                                        " and question_id = $key "));
//                        

                        if (sizeof($res) == 0) {
                            $discard = 1;
                            break;
                        } else {
                            $discard = 0;
//                            debug("select qsn_answer
////from pmtc_question_answers where user_qsn_data_id = " . $mainvalue["UsersQuestionData"]["id"] .
//                                    " and question_id = $key and (select count(*) from pmtc_question_answers where user_qsn_data_id = "
//                                    . $mainvalue["UsersQuestionData"]["id"] . " and $cndText[$key] and question_id = $key )>0");

                            $resulttmp.="<td>" . $res[0]["pmtc_question_answers"]["qsn_answer"] . "</td>";
//                            debug($resulttmp);
                        }
//                        $src = array_search($key."",  $this->request->data["filterIds"]);
//                        if ($src>=0 && in_array($key."", $this->request->data["filterIds"])) {
////                            debug($src);
//                            $cnd = array_merge($cnd, array("qsn_answer " .
//                                $this->request->data["qsnConds"][$src] => $this->request->data["filterVals"][$src]));
//                        } 
//                        else {
//                            debug($key);
//                            debug($this->request->data["filterIds"]);
//                        }
//                        else
//                            continue;
//                        $tmp[$key] = $this->QuestionAnswer->find("first", array(
//                            "recursive" => -1,
//                            "fields" => "qsn_answer",
//                            "conditions" => $cnd));
//                        foreach ($this->request->data["qsnConds"] as $pkey => $pvalue) {
//                            if ($totalList[$key] > $this->request->data["filterVals"][$pkey]) {
//                        debug($this->QuestionAnswer->query("select qsn_answer from QuestionAnswer where "
//                                . "question_id = $key and user_qsn_data_id = ".$mainvalue["UsersQuestionData"]["id"]."
//                                    ));
//                        debug($tmp);
//                                if ($tmp != null)
//                        $result.= "<td>" . (($tmp) ? $tmp["QuestionAnswer"]["qsn_answer"] : "") . "</td>";
//                            } else
//                                break;
//                        }
                    }
                }

                if ($discard == 1) {
                    $discard = 0;
                    $indexTable--;
                    continue;
                } else {
//                    debug($resulttmp);
                    $result.=$resulttmp . "</tr>";
                }
//            debug($value);
//            debug($value[$colums[$key]]);
            }
//main echo
            echo $result . "</tbody></table>";
        } else {
            echo "<h2>No data found</h2>";
        }
    }

}
