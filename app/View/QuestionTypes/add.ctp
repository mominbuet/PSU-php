<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Question Type</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Create a new question type
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php  echo $this->Form->create('QuestionType',array("role"=>"form")); ?>
                           
                                <div class="form-group">
                                    <label>Question Type</label>
                                    <?php echo $this->Form->input('qsn_type',array("label"=>false,'class'=> 'form-control'));?>
                                    <p class="help-block">Enter the Type here...</p>
                                </div>
                                <input type="submit" class="fa fa-plus btn btn-success" value="Add"/> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
