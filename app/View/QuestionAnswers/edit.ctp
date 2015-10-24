<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Answer Edit    </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php echo $this->Form->create('QuestionAnswer',array('class'=>'form-horizontal', 'role'=>'form')); ?>
                            <?php
                            echo "<div class=\"form-group\"> ";		echo $this->Form->input('id',array('label' => false,'class' => 'form-control'));
                            echo '</div>';

                            ?>

                           
                            <?php
                            echo "<div class=\"form-group\"> <label>Answer</label>";		echo $this->Form->input('qsn_answer',array('label' => false,'class' => 'form-control'));
                            echo '</div>';

                            ?>
                            <input type="submit" class="fa fa-plus btn btn-success" value="Edit"/> </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
