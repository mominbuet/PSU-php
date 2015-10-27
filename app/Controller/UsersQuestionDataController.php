<?php

App::uses('AppController', 'Controller');

/**
 * UsersQuestionData Controller
 *
 * @property UsersQuestionData $UsersQuestionData
 * @property PaginatorComponent $Paginator
 */
class UsersQuestionDataController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Search.Prg');
    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'UsersQuestionData.insert_time' => 'DESC'
        )
    );

    public function recentresponses() {
        $this->set("surveys", $this->UsersQuestionData->QuestionSet->find('list', array(
                    "conditions" => array("is_survey" => 1))));
    }

    public function summaryreport() {
        if ($this->Session->read('Auth.User.User.superuser') != 1)
            $this->set("surveys", $this->UsersQuestionData->QuestionSet->find('list', array(
                        "conditions" => array("is_survey" => 1, 'owner' => $this->Session->read('Auth.User.User.id')))));
        else
            $this->set("surveys", $this->UsersQuestionData->QuestionSet->find('list', array(
                        "conditions" => array("is_survey" => 1))));
    }

    public function map_shad($survey_id = null, $user_id = null) {
        $this->loadModel('QuestionSet');
        $questionSets;
        $userQuestionData = array();
        $joins = array(
            array(
                'table' => "pmtc_question_sets",
                'alias' => 'QuestionSet',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UsersQuestionData.qsn_set_master_id = QuestionSet.id')
            ),
            array(
                'table' => 'pmtc_question_group',
                'alias' => 'QuestionGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
            ),
            array(
                'table' => 'pmtc_groups',
                'alias' => 'Group',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.group_id = Group.id')
            ),
            array(
                'table' => 'pmtc_user_groups',
                'alias' => 'UserGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.group_id = Group.id')
            ),
            array(
                'table' => 'pmtc_users',
                'alias' => 'User',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.user_id = User.id')
            ),
        );
        $conditions = array();
        if ($this->Session->read('Auth.User.User.superuser') == '1') {

            $questionSets = $this->QuestionSet->find('list', array(
                'recursive' => -1,
                'conditions' => array('QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1)));
            if ($survey_id) {
                if ($user_id)
                    $conditions = array('qsn_set_master_id' => $survey_id, 'UsersQuestionData.user_id' => $user_id);
                else
                    $conditions = array('qsn_set_master_id' => $survey_id);
                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                        'recursive' => -1,
                        'joins' => $joins,
                        'conditions' => $conditions,
                        'fields' => array('User.user_name', 'UsersQuestionData.id', 'User.id', 'QuestionSet.id', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
                )));
            }
//            else
//                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
//                        'recursive' => 0,
//                        'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
//                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
//                )));
        } else {

            $questionSets = $this->QuestionSet->find('list', array(
                'recursive' => -1,
                'conditions' => array('User.id' => $this->Session->read('Auth.User.User.id'),
                    'QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1),
                'joins' => $joins));
            if ($survey_id) {
                if ($user_id)
                    $conditions = array('qsn_set_master_id' => $survey_id, 'UsersQuestionData.user_id' => $user_id);
                else
                    $conditions = array('qsn_set_master_id' => $survey_id);
                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                        'recursive' => 0,
                        'conditions' => array('qsn_set_master_id' => $survey_id),
                        'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
                )));
            }
//            else
//                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
//                        'recursive' => 0,
//                        'conditions' => array('qsn_set_master_id' => array_keys($questionSets)),
//                        'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
//                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
//                )));
        }
        if ($survey_id)
            $this->set('set_survey', $survey_id);
        else
            $this->set('set_survey', 0);
        if ($user_id)
            $this->set('set_user', $user_id);
        else
            $this->set('set_user', 0);
//        debug(array_keys($questionSets));
        $users = $this->UsersQuestionData->User->find('list');
        $this->set('usersQuestionData', $userQuestionData);
        $this->set('users', $users);

        $this->set('questionSets', $questionSets);
    }

    public function map($survey_id = null, $user_id = null) {
        $this->loadModel('QuestionSet');
        $questionSets;
        $userQuestionData = array();
        $joins = array(
            array(
                'table' => 'pmtc_users',
                'alias' => 'User',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UsersQuestionData.user_id = User.id')
            ),
            array(
                'table' => 'pmtc_user_groups',
                'alias' => 'UserGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.user_id = User.id')
            ),
            array(
                'table' => 'pmtc_groups',
                'alias' => 'Group',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('UserGroup.group_id = Group.id')
            ),
            array(
                'table' => 'pmtc_question_group',
                'alias' => 'QuestionGroup',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.group_id = Group.id')
            ),
            array(
                'table' => "pmtc_question_sets",
                'alias' => 'QuestionSet',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
            ),
        );
        $conditions = array();
        if ($this->Session->read('Auth.User.User.superuser') == '1') {

            $questionSets = $this->QuestionSet->find('list', array(
                'recursive' => -1,
                'conditions' => array('QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1)));
            if ($survey_id) {
                if ($user_id)
                    $conditions = array('qsn_set_master_id' => $survey_id, 'UsersQuestionData.user_id' => $user_id);
                else
                    $conditions = array('qsn_set_master_id' => $survey_id);
                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                        'recursive' => -1,
                        'joins' => $joins,
                        'conditions' => $conditions,
                        'group' => array('UsersQuestionData.id', 'UsersQuestionData.user_id'),
                        'fields' => array('User.user_name', 'UsersQuestionData.id', 'User.id', 'QuestionSet.id', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
                )));
            }
        } else {

            $questionSets = $this->QuestionSet->find('list', array(
                'recursive' => -1,
                'joins' => array(
                    array(
                        'table' => 'pmtc_question_group',
                        'alias' => 'QuestionGroup',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
                    ), array(
                        'table' => 'pmtc_user_groups',
                        'alias' => 'UserGroup',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('UserGroup.group_id = QuestionGroup.group_id')
                    ),
//                    array(
//                        'table' => 'pmtc_groups',
//                        'alias' => 'Group',
//                        'type' => 'inner',
//                        'foreignKey' => true,
//                        'conditions' => array('UserGroup.group_id = Group.id')
//                    ),
                    array(
                        'table' => 'pmtc_users',
                        'alias' => 'User',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('User.id = UserGroup.user_id')
                    ),
                ),
                'conditions' => array('User.id' => $this->Session->read('Auth.User.User.id'),
                    'QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1)));
            if ($survey_id) {
                if ($user_id)
                    $conditions = array('qsn_set_master_id' => $survey_id, 'UsersQuestionData.user_id' => $user_id);
                else
                    $conditions = array('qsn_set_master_id' => $survey_id);
                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
                        'recursive' => 0, 'joins' => $joins,
                        'conditions' => array('qsn_set_master_id' => $survey_id),
                        'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
                )));
            }
//            else
//                $userQuestionData = array('data' => $this->UsersQuestionData->find('all', array(
//                        'recursive' => 0,
//                        'conditions' => array('qsn_set_master_id' => array_keys($questionSets)),
//                        'fields' => array('User.user_name', 'UsersQuestionData.insert_time', 'UsersQuestionData.geo_lat',
//                            'UsersQuestionData.geo_lon', 'QuestionSet.qsn_set_name')
//                )));
        }
        if ($survey_id)
            $this->set('set_survey', $survey_id);
        else
            $this->set('set_survey', 0);
        if ($user_id)
            $this->set('set_user', $user_id);
        else
            $this->set('set_user', 0);
//        debug(array_keys($questionSets));
        $users = $this->UsersQuestionData->User->find('list');
        $this->set('usersQuestionData', $userQuestionData);
        $this->set('users', $users);

        $this->set('questionSets', $questionSets);
    }

    public function surveychart() {
        $this->set("surveys", $this->UsersQuestionData->QuestionSet->find('list', array(
                    "conditions" => array("is_survey" => 1))));
    }

    public function rawreport() {
//        debug($this->UsersQuestionData->displayField);
        $this->set("associatedModels", $this->UsersQuestionData->getAssociated('belongsTo'));
        $this->set("surveys", $this->UsersQuestionData->QuestionSet->find('list', array(
                    "conditions" => array("is_survey" => 1))));
        $this->set("users", $this->UsersQuestionData->User->find('list'));
        $this->set("districts", $this->UsersQuestionData->SelectDistrict->find('list'));
//        debug($this->UsersQuestionData->SelectUpzilla->find('list')); 
//                array("fields" => array("SelectUpzilla.upzilla_code,SelectUpzilla.upzilla_name"))));
        $this->set("upzilla", $this->UsersQuestionData->SelectUpzilla->find('list'));
    }

    public function barchartreport() {
        $col = array_key_exists('column1', $this->request->query) ? $this->request->query['column1'] : NULL;
        $group_by = array_key_exists('column2', $this->request->query) ? $this->request->query['column2'] : NULL;
        $columns = array("user_id" => "User", "qsn_set_master_id" => "Survey",
            "division_id" => "Division", "district_id" => "District",
            "thana_id" => "Thana", "water_code" => "Water Code");
        $this->set("column1", $columns);
        $this->set("column2", $columns);
        $this->set("set_col2", "");
        $this->set("set_col1", "");
    }

    public function chartreport() {
        $col = array_key_exists('column1', $this->request->query) ? $this->request->query['column1'] : NULL;
        $group_by = array_key_exists('column2', $this->request->query) ? $this->request->query['column2'] : NULL;
        $columns = array("user_id" => "User", "qsn_set_master_id" => "Survey",
            "division_id" => "Division", "district_id" => "District",
            "thana_id" => "Thana", "water_code" => "Water Code");
        $this->set("column1", $columns);
        $this->set("column2", $columns);
        $this->set("set_col2", "");
        $this->set("set_col1", "");
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->loadModel('Questions');
        $this->loadModel('QuestionAnswer');
        $this->UsersQuestionData->recursive = 0;
        $this->Paginator->settings = $this->paginate;
        $questionSetsInput = array_key_exists('questionSets', $this->request->query) ? $this->request->query['questionSets'] : NULL;
        $user_id = array_key_exists('user_id', $this->request->query) ? $this->request->query['user_id'] : NULL;
        $Date_from = array_key_exists('Date_from', $this->request->query) ? $this->request->query['Date_from'] : NULL;
        $Date_To = array_key_exists('Date_To', $this->request->query) ? $this->request->query['Date_To'] : NULL;
        $duplicate = array_key_exists('duplicate', $this->request->query) ? $this->request->query['duplicate'] : NULL;
        $conditions = array();
        if ($questionSetsInput) {
            $conditions = array_merge(array('UsersQuestionData.qsn_set_master_id ' => $questionSetsInput), $conditions);
            $this->set("set_qset", $questionSetsInput);
        } else
            $this->set("set_qset", "");
        if ($duplicate) {
            if ($questionSetsInput) {
                $duplicate_entries = ($this->UsersQuestionData->query("SELECT water_code,count(*) from pmtc_users_question_data where qsn_set_master_id = $questionSetsInput group by water_code having count(*)>1"));
                foreach ($duplicate_entries as $value) {
                    $conditions = array_merge(array('UsersQuestionData.water_code ' => $value['pmtc_users_question_data']['water_code']), $conditions);
                }
            }
            $this->set("duplicate", $duplicate);
        } else
            $this->set("duplicate", "0");
        if ($user_id) {
            $conditions = array_merge(array('UsersQuestionData.user_id ' => $user_id), $conditions);
            $this->set("set_user", $user_id);
        } else
            $this->set("set_user", "");
        if ($Date_from) {
            $conditions = array_merge(array('UsersQuestionData.insert_time >=' => $Date_from), $conditions);
            $this->set("Date_from", $Date_from);
        }
        if ($Date_To) {
            $conditions = array_merge(array('UsersQuestionData.insert_time <=' => $Date_To), $conditions);
            $this->set("Date_To", $Date_To);
        }

        $questionSets;
        if ($this->Session->read('Auth.User.User.superuser') == '1') {
            $questionSets = $this->UsersQuestionData->QuestionSet->find('list', array('conditions' => array('QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1)));
            /* $user_id = $this->UsersQuestionData->Users->find('list');
              $this->set(compact('$user_id')); */
        } else {
            $questionSets = $this->UsersQuestionData->QuestionSet->find('list', array(
                'conditions' => array('User.id' => $this->Session->read('Auth.User.User.id'),
                    'QuestionSet.is_active' => 1,
                    'QuestionSet.is_survey' => 1),
                'joins' => array(
                    array(
                        'table' => 'pmtc_select_district',
                        'alias' => 'SelectDistrict',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectDistrict.district_code = UsersQuestionData.district_id')
                    ), array(
                        'table' => 'pmtc_select_upzilla',
                        'alias' => 'SelectUpzilla',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectUpzilla.district_id = SelectDistrict.district_id and SelectUpzilla.upzilla_code = UsersQuestionData.upzilla_id ')
                    ), array(
                        'table' => 'pmtc_select_union',
                        'alias' => 'SelectUnion',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectUnion.upzilla_id = SelectUpzilla.upzilla_id and SelectUpzilla.upzilla_code = UsersQuestionData.upzilla_id'
                            . ' and SelectUnion.union_code = UsersQuestionData.union_id ')
                    ), array(
                        'table' => 'pmtc_select_land_types',
                        'alias' => 'SelectLandType',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectLandType.land_use_code = UsersQuestionData.land_use_type_id')
                    ), array(
                        'table' => 'pmtc_select_ownerships',
                        'alias' => 'SelectOwnership',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('SelectOwnership.ownership_code = UsersQuestionData.owner_type_id')
                    ),array(
                        'table' => 'pmtc_question_group',
                        'alias' => 'QuestionGroup',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('QuestionGroup.question_set_id = QuestionSet.id')
                    ),
                    array(
                        'table' => 'pmtc_groups',
                        'alias' => 'Group',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('QuestionGroup.group_id = Group.id')
                    ),
                    array(
                        'table' => 'pmtc_user_groups',
                        'alias' => 'UserGroup',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('UserGroup.group_id = Group.id')
                    ),
                    array(
                        'table' => 'pmtc_users',
                        'alias' => 'User',
                        'type' => 'inner',
                        'foreignKey' => true,
                        'conditions' => array('UserGroup.user_id = User.id')
                    )
                )
            ));
        }
        if ($questionSetsInput) {
            $usersQuestionData = array();
            $fields = array('DISTINCT UsersQuestionData.id', 'UsersQuestionData.insert_time', 'UsersQuestionData.water_code',
                'UsersQuestionData.geo_lat', 'UsersQuestionData.geo_lon','SelectOwnership.ownership_name',
                'User.user_name', 'User.id', 'QuestionSet.id', 'SelectDistrict.district_name','SelectUpzilla.upzilla_name','SelectUnion.union_name',
                'QuestionSet.qsn_set_name', 'UsersQuestionData.is_verify','SelectLandType.land_use_name');
            if (!$conditions) {
                $this->Paginator->settings = array(
                    'fields' => $fields,
                    'conditions' => array('UsersQuestionData.qsn_set_master_id' => key($questionSets)),
                    'order' => array('UsersQuestionData.insert_time desc')
                );
                $usersQuestionData = $this->Paginator->paginate('UsersQuestionData');

//            $this->set('usersQuestionData', $this->Paginator->paginate('UsersQuestionData'));
            } else {
                $this->Paginator->settings = array(
                    'fields' => $fields,
                    'conditions' => $conditions,
                    'order' => array('UsersQuestionData.insert_time desc')
                );
                $usersQuestionData = $this->Paginator->paginate('UsersQuestionData');
            }

//            $users = $this->User->find('list');
            $questions = $this->Questions->find('list', array('order' => 'id',
                'fields' => array('id', 'qsn_desc'),
                'conditions' => array('Questions.qsn_set_id' =>
                    ($questionSetsInput) ? $questionSetsInput : key($questionSets))));
//        debug($questionSetsInput);
//        debug($questions);
            foreach ($usersQuestionData as $key => $usersQuestionDataVal) {
                $QuestionAnswers = array();
//debug($usersQuestionDataVal);
                $tmp = $this->QuestionAnswer->find('list', array(
                    'conditions' => array('user_qsn_data_id' => $usersQuestionDataVal['UsersQuestionData']['id'],
//                        'question_id' => $value['Questions']['id']),
                    ),
                    'order' => array('question_id'),
                    'fields' => array('question_id', 'qsn_answer')));
//            debug($tmp);
//            debug($questions);
                foreach ($questions as $k => $value) {

//                debug($k);
                    $QuestionAnswers[] = !array_key_exists($k, $tmp) ? "-" : $tmp[$k]; //'QuestionAnswer'
                }
                $usersQuestionData[$key]['QuestionAnswers'] = $QuestionAnswers;
//            array_merge(array('QuestionAnswers' => $QuestionAnswers), );
//            debug($QuestionAnswers);
            }
//debug($usersQuestionData[10]);
//        debug($questions);
            $this->set(compact('usersQuestionData', $usersQuestionData));
        } else {
            $this->set(compact('usersQuestionData', null));
        }

        $this->set(compact('questionSets', 'questions'));
    }

//    public function find() {
//        $this->Prg->commonProcess();
//        $this->Paginator->settings['conditions'] = $this->UsersQuestionData->parseCriteria($this->Prg->parsedParams());
//        $this->set('UsersQuestionData', $this->Paginator->paginate());
//    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->UsersQuestionData->exists($id)) {
            throw new NotFoundException(__('Invalid users question data'));
        }
        $options = array('conditions' => array('UsersQuestionData.' . $this->UsersQuestionData->primaryKey => $id));
        $this->set('usersQuestionData', $this->UsersQuestionData->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->UsersQuestionData->create();
            if ($this->UsersQuestionData->save($this->request->data)) {
                $this->Session->setFlash(__('The users question data has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users question data could not be saved. Please, try again.'));
            }
        }
        $users = $this->UsersQuestionData->User->find('list');
        $questionSets = $this->UsersQuestionData->QuestionSet->find('list');
        $this->set(compact('users', 'questionSets'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->UsersQuestionData->exists($id)) {
            throw new NotFoundException(__('Invalid users question data'));
        }
        if ($this->request->is(array('post', 'put'))) {
            debug($this->request->data);
            if ($this->UsersQuestionData->save($this->request->data)) {
                $db = ConnectionManager::getDataSource('default');
//            echo $q;
                $db->query("drop table if EXISTS pmtc_" . $this->request->data['UsersQuestionData']['qsn_set_master_id'] . 's');
                $this->Session->setFlash(__('The users question data has been saved.'));

                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The users question data could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UsersQuestionData.' . $this->UsersQuestionData->primaryKey => $id));
            $this->request->data = $this->UsersQuestionData->find('first', $options);
            //debug($this->request->data);
        }
        $users = $this->UsersQuestionData->User->find('list');
        //$qsn_set_master_id = $this->UsersQuestionData->QuestionSet->find('list');
        //$divisions = $this->UsersQuestionData->SelectDivision->find('list');
        $districts = $this->UsersQuestionData->SelectDistrict->find('list', array('fields' => array('district_code', 'district_name')));


        $upzillas = $this->UsersQuestionData->SelectUpzilla->find('list', array('conditions' => array('SelectUpzilla.district_id' => $this->request->data['SelectDistrict']['district_id']),
            'fields' => array('upzilla_code', 'upzilla_name')));

        $unions = $this->UsersQuestionData->SelectUnion->find('list', array('fields' => array('union_code', 'union_name'),
            'joins' => array(
                array(
                    'table' => "pmtc_select_upzilla",
                    'alias' => 'SelectUpzilla',
                    'type' => 'inner',
                    'foreignKey' => true,
                    'conditions' => array('SelectUpzilla.upzilla_id = SelectUnion.upzilla_id')
                )),
            'conditions' => array('SelectUnion.upzilla_id' => $this->request->data['SelectUpzilla']['upzilla_id'],
                'SelectUpzilla.district_id' => $this->request->data['SelectDistrict']['district_id']),
        ));

        $this->set(compact('users', 'districts', 'unions', 'upzillas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null, $qset_id = null, $user_id = null) {
        $this->UsersQuestionData->id = $id;
        if (!$this->UsersQuestionData->exists()) {
            throw new NotFoundException(__('Invalid users question data'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UsersQuestionData->delete()) {
            $this->Session->setFlash(__('The users question data has been deleted.'));
        } else {
            $this->Session->setFlash(__('The users question data could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index',
                    '?' => array('questionSets' => $qset_id, 'user_id' => $user_id)
        ));
    }

}
