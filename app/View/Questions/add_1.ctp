<style>
    .survey-editor {
        padding-bottom: 36px;
        transition: all 0.3s ease 0s;
    }
    ul {
        list-style: outside none none;
        margin-bottom: 0;
        margin-top: 0;
        padding-left: 0;
    }
    .survey-editor__null-top-row {
        position: relative;
    }
    .survey-editor__message {
        color: #888;
        text-align: center;
    }
    .survey-editor__message {
        background: none repeat scroll 0 0 #fff;
        border: 2px solid #d9dde1;
        font-size: 13px;
        font-style: italic;
        font-weight: 600;
        padding: 20px;
    }
    .btn--addrow {
        background-color: transparent;
        height: 84px;
        width: 52px;
    }
    .no-touch .btn--addrow {
        left: -40px;
        padding: 30px 0 0 11px;
        position: absolute;
        top: -42px;
        z-index: 100;
    }
    .touch .btn--addrow {
        height: 36px;
        margin-top: 5px;
        padding-left: 10px;
    }
    .btn--addrow .fa {
        background-color: #bec9d0;
        border-radius: 5px;
        display: block;
        height: 24px;
        line-height: 24px;
        width: 24px;
    }
    .btn--addrow:hover {
        background-color: transparent;
    }
    .row__questiontypes--namer {
        height: 68px;
        padding: 15px 10px;
    }
    .row__questiontypes {
        background: none repeat scroll 0 0 #fff;
        border: 2px solid #3fa2ee;
        margin: 4px 0;
        padding: 20px 0 0;
    }
    *::-moz-selection {
        background: none repeat scroll 0 0 #b3d4fc;
        text-shadow: none;
    }
    .row__questiontypes--namer button {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background: none repeat scroll 0 0 #39bf6e;
        border-color: -moz-use-text-color -moz-use-text-color #2d9856;
        border-image: none;
        border-style: none none solid;
        border-width: medium medium 2px;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
        margin-left: 2%;
        padding: 8px;
        text-align: center;
        width: 20%;
    }
    .row__questiontypes--namer button, .row__questiontypes--namer input {
        float: left;
    }
    .row__questiontypes--namer input {
        border-color: #78c4fd;
        width: 78%;
    }
    .row__questiontypes__close {
        background-color: #c5cacf;
        border: 0 none;
        border-radius: 3px;
        color: #fff;
        font-family: "Open Sans";
        font-weight: 600;
        line-height: 1em;
        padding: 1px 3px;
        position: absolute;
        right: 8px;
        top: 8px;
    }
    .row__questiontypes__close:hover {
        background-color: #8d97a1;
    }
    row__questiontypes__list:after, .row__questiontypes__list:before {
        border: medium solid transparent;
        bottom: 100%;
        content: " ";
        height: 0;
        left: 50%;
        pointer-events: none;
        position: absolute;
        width: 0;
    }
    .row__questiontypes__list:after {
        border-color: rgba(255, 255, 255, 0) rgba(255, 255, 255, 0) #fff;
        border-width: 8px;
        margin-left: -8px;
    }
    .row__questiontypes__list:before {
        border-color: rgba(217, 221, 225, 0) rgba(217, 221, 225, 0) #3fa2ee;
        border-width: 11px;
        margin-left: -11px;
    }
    .questiontypelist__row {
        float: left;
        padding-right: 1px;
        width: 25%;
    }

    .row__questiontypes__list:after, .row__questiontypes__list:before {
        border: medium solid transparent;
        bottom: 100%;
        content: " ";
        height: 0;
        left: 50%;
        pointer-events: none;
        position: absolute;
        width: 0;
    }
    .questiontypelist__item {
        background: none repeat scroll 0 0 #e9edf0;
        border: 2px solid #e9edf0;
        color: #35495d;
        cursor: pointer;
        font-family: "Open Sans";
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 1px;
        padding: 10px 5px;
    }
    .questiontypelist__item:hover {
        border-color: #3fa2ee;
        color: #3fa2ee;
    }
    .fa.fa-lato-decimal:before {
        content: "1.0";
        font-size: 0.9em;
    }
    .fa.fa-lato-calculate:before, .fa.fa-lato-decimal:before, .fa.fa-lato-integer:before, .fa.fa-lato-text:before {
        font-family: "Open Sans";
        font-weight: 600;
        letter-spacing: -0.02em;
    }
    .fa.fa-lato-text:before {
        content: "abc";
    }
    .fa.fa-lato-calculate:before, .fa.fa-lato-decimal:before, .fa.fa-lato-integer:before, .fa.fa-lato-text:before {
        font-family: "Open Sans";
        font-weight: 600;
        letter-spacing: -0.02em;
    }
    .fa.fa-lato-integer:before {
        content: "123";
        font-size: 0.9em;
    }
    .fa.fa-lato-calculate:before, .fa.fa-lato-decimal:before, .fa.fa-lato-integer:before, .fa.fa-lato-text:before {
        font-family: "Open Sans";
        font-weight: 600;
        letter-spacing: -0.02em;
    }
    .fa.fa-lato-calculate:before {
        content: "1+1";
        font-size: 0.9em;
    }
    .fa.fa-lato-calculate:before, .fa.fa-lato-decimal:before, .fa.fa-lato-integer:before, .fa.fa-lato-text:before {

        font-weight: 600;
        letter-spacing: -0.02em;
    }
    input.row__questiontypes__new-question-name {
        border: 0 none;
        border-radius: 0;
        font-weight: 600;
        padding: 0 40px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <h1>Add Question to </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create a new survey
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">

                            <ul class="-form-editor survey-editor__list ui-sortable">
                                <li class="survey-editor__null-top-row empty">
                                    <p class="survey-editor__message well">
                                        <b>This form is currently empty.</b><br>
                                        You can add questions, notes, prompts, or other fields by clicking on the "+" sign below.
                                    </p>
                                    <div class="survey__row__spacer  expanding-spacer-between-rows expanding-spacer-between-rows--depr" 
                                         id="secondForm">
                                        <div class="btn btn--block btn--addrow js-expand-row-selector add-row-btn add-row-btn--depr">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                        <div class="line expanded" style="height: inherit;"><div class="row__questiontypes row__questiontypes--namer">
                                                <form action="javascript:void(0);" class="row__questiontypes__form">
                                                    <input type="text" class="js-cancel-sort">
                                                    <button> + Add Question </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row__questiontypes row-fluid clearfix">
                                            <button type="button" class="row__questiontypes__close js-close-row-selector shrink pull-right close close-button close-button--depr" aria-hidden="true">×</button>
                                            <input value="" class="row__questiontypes__new-question-name js-cancel-sort" type="text">
                                            <div class="row__questiontypes__list clearfix"><div class="questiontypelist__row"><div class="questiontypelist__item" data-menu-item="select_one">
                                                        <i class="fa fa-dot-circle-o fa-fw"></i>
                                                        Select One
                                                    </div><div class="questiontypelist__item" data-menu-item="decimal">
                                                        <i class="fa fa-lato-decimal fa-fw"></i>
                                                        Decimal
                                                    </div><div class="questiontypelist__item" data-menu-item="geopoint">
                                                        <i class="fa fa-map-marker fa-fw"></i>
                                                        GPS
                                                    </div><div class="questiontypelist__item" data-menu-item="note">
                                                        <i class="fa fa-bars fa-fw"></i>
                                                        Note
                                                    </div></div><div class="questiontypelist__row"><div class="questiontypelist__item" data-menu-item="select_multiple">
                                                        <i class="fa fa-list-ul fa-fw"></i>
                                                        Select Many
                                                    </div><div class="questiontypelist__item" data-menu-item="date">
                                                        <i class="fa fa-calendar fa-fw"></i>
                                                        Date
                                                    </div><div class="questiontypelist__item" data-menu-item="image">
                                                        <i class="fa fa-picture-o fa-fw"></i>
                                                        Photo
                                                    </div><div class="questiontypelist__item" data-menu-item="barcode">
                                                        <i class="fa fa-barcode fa-fw"></i>
                                                        Barcode
                                                    </div></div><div class="questiontypelist__row"><div class="questiontypelist__item" data-menu-item="text">
                                                        <i class="fa fa-lato-text fa-fw"></i>
                                                        Text
                                                    </div><div class="questiontypelist__item" data-menu-item="time">
                                                        <i class="fa fa-clock-o fa-fw"></i>
                                                        Time
                                                    </div><div class="questiontypelist__item" data-menu-item="audio">
                                                        <i class="fa fa-volume-up fa-fw"></i>
                                                        Audio
                                                    </div><div class="questiontypelist__item" data-menu-item="acknowledge">
                                                        <i class="fa fa-check-square-o fa-fw"></i>
                                                        Acknowledge
                                                    </div></div><div class="questiontypelist__row"><div class="questiontypelist__item" data-menu-item="integer">
                                                        <i class="fa fa-lato-integer fa-fw"></i>
                                                        Number
                                                    </div><div class="questiontypelist__item" data-menu-item="datetime">
                                                        <i class="fa fa-calendar clock-over fa-fw"></i>
                                                        Date &amp; time
                                                    </div><div class="questiontypelist__item" data-menu-item="video">
                                                        <i class="fa fa-video-camera fa-fw"></i>
                                                        Video
                                                    </div><div class="questiontypelist__item" data-menu-item="calculate">
                                                        <i class="fa fa-lato-calculate fa-fw"></i>
                                                        Calculate
                                                    </div></div></div>
                                        </div>
                                        <div style="height: 0px;" class="line"></div>
                                    </div>
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Question Sets'), array('controller' => 'question_sets', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Question Set'), array('controller' => 'question_sets', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Qsn Types'), array('controller' => 'qsn_types', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Qsn Type'), array('controller' => 'qsn_types', 'action' => 'add')); ?> </li>
    </ul>
</div>
