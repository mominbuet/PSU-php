<?php

Configure::write('ReportManager.displayForeignKeys', 0);
Configure::write('ReportManager.globalFieldIgnoreList', array(
    'id',
    'created',
    'modified',
    'image_url',
    'is_active',
    'password'
));
Configure::write('ReportManager.modelIgnoreList', array(
    'AppModel',
    'SelectMisc',
    'SelectOwnership',
//    'SelectUpzilla',
//    'SelectUnion',
//    'SelectVillage',
//    'SelectWaterPointType',
    'SelectLandType',
    'ValidationRule'
));
Configure::write('ReportManager.modelRenameList', array(
    'QuestionSet'=>'Survey',
    'UsersQuestionData'=>'User\'s Answers',
    'QuestionAnswer'=>'User\'s Detail Answer',
    'SelectUpzilla'=>"Upzilla",
    'SelectUnion'=>"Union",
    'SelectDistrict'=>"District",
    'SelectDivision'=>"Division",
    'UserGroup'=>"User Assigned to Group",
    'SelectWaterPointType'=>"Water Point Type",
    'SelectVillage'=>"Village",
    
));
Configure::write('ReportManager.modelFieldIgnoreList', array(
    'MyModel' => array(
        'field1' => 'field1',
        'field2' => 'field2',
        'field3' => 'field3'
    )
));
Configure::write('ReportManager.reportPath', 'tmp' . DS . 'reports' . DS);
Configure::write('ReportManager.labelFieldList', array(
    '*' => array(
        'field1' => 'my field 1 label description',
        'field2' => 'my field 2 label description',
        'field3' => 'my field 3 label description'
    ),
    'MyModel' => array(
        'field1' => 'my MyModel field 1 label description'
    )
));
?>