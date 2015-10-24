<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $this->Html->charset(); ?>
        <title>

		<?php echo $this->fetch('title'); ?>
        </title>
	<?php
		echo $this->Html->meta('icon');
                    echo $this->fetch('meta');
                    echo $this->Html->css('bootstrap.min');
                    echo $this->Html->css('font-awesome.min');
                    echo $this->Html->css('sb-admin-2');      
                    echo $this->Html->css('metisMenu');
        echo $this->Html->script('jquery.min');  
        echo $this->Html->script('bootstrap.min'); 
?>

    </head>

<body>
        <div class="alert alert-warning alert-dismissible" role="alert" id="login_error">
            <span id="login_error_text"></span>
            <?php echo $this->Session->flash(); ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" id ="loginform" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="User name" name="user_name" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!--                                    <div class="checkbox">
                                                                            <label>
                                                                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                                                            </label>
                                                                        </div>-->
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-success btn-block" id="btnlogin" value="Login"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    </body>

</html>
