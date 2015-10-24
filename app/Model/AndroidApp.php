<?php

App::uses('AppModel', 'Model');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AndroidApp extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'app_name';
    var $actsAs = array(
        'FileModel' => array(
            'file_field' => array('file'),
            'file_db_file' => array('android'),
            'custom_dir' => array('file'),
            'use_model_name' => true
        )
    );
}