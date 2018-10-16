<?php
	require_once('layoutPage1.php');
	headers($pageTitle);
?>
<div class="container" style="margin-top: 10%; margin-bottom: 10%;">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Admin Login</strong></h3>
                </div>
                <div class="panel-body">
                <?php $attributes = array('id' => 'adminForm','name'=>'myform');?>
                    <?php echo form_open('admin/login_action',$attributes);  
                    echo validation_errors();?>  
                    <!--<form role="form" action="login.php" method="post" name="frm">-->
                        <fieldset>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Name or Email:</label>
                            <span style="color: red;">*</span>
                                <?php echo form_input(array('id' => 'username', 'name' => 'username','type'=>'text',
                                'placeholder'=>'Enter your email','class'=>'form-control LoginAdmin')); ?>
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                             <label for="password">Password:</a></label>
                             <span style="color: red;">*</span>
                              <?php echo form_input(array('id' => 'password', 'name' => 'password','type'=>'password','class'=>'LoginAdmin',
                                'placeholder'=>'Enter your Password','class'=>'form-control LoginAdmin')); ?>
                                <span class="error"></span>
                               
                            </div>
                            <div class="col-sm-10 col-sm-offset-2 pull-right">
                            <?php echo form_submit(array('id' => 'adminLogin', 'value' => 'Login','class'=>' btn btn-primary checkAdmin')); ?>
                             <input type="reset" name="reset" class =" btn btn-danger" value="Reset"/>
                            <?php echo form_close(); ?>
                            </div>
                        </fieldset> 
                    </form>
                </div>
            </div>
        </div>    
    </div>   
</div>   
<?php
footer();
?>