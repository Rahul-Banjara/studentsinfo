<?php
	require_once('layoutPage.php');
	headers($pageTitle);
?>
<div class="container" style="margin-top: 10%; margin-bottom: 10%;">
	<div class="col-md-5 col-md-offset-4">
			 <div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title"><strong>Student Login </strong></h3></div>
				 	<div class="panel-body">
						<form role="form" method ="post" action ="loginAction" id="studentLogin
						">
						<?php echo validation_errors();?>
				 		<div class="form-group">
						 	<label for="exampleInputEmail1">Name or Email</label>
						 	<span style="color: red;">*</span>
							 <?php echo form_input(array('id' => 'username', 'name' => 'username','type'=>'text',
                             'placeholder'=>'Enter your email','class'=>'form-control StudentLogin','required')); ?>
						</div>
					  <div class="form-group">
					    <label for="password">Password</a></label>
					    <span style="color: red;">*</span>
					     <?php echo form_input(array('id' => 'password', 'name' => 'password','type'=>'password',
                                'placeholder'=>'Enter your Password','class'=>'form-control StudentLogin','required')); ?>
					  </div>
						<div class="col-sm-offset-8 col-sm-10 pull-right">
                            <input type="submit" id="loginStudent" class="btn btn-primary LoginStudent" name="studentLogin" value="Login" />
                            <input type="reset" name="reset" class =" btn btn-danger" value="Reset"/>
                       </div>
					</form>
			 	</div>
			</div>
		</div>
	</div>	
<?php
footer(); 
?>		
