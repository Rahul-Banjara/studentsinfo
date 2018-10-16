<?php 
 require_once('layoutPage.php');
 headers($pageTitle);  
?>
<?php 
    if($this->session->userData('username')){
?>
<div class="row" style="padding-top: 8%;">
	<div class=" col-md-5 col-md-offset-4">
		<h3 style="color: green;">Notice  has been successfully Sent To the  Department </h3><br/>
				<h3 style="color: red;">Your Notice is </h3><br/><?php echo $message; ?>
				&nbsp; &nbsp;<a href="<?php echo base_url().'index.php/admin/AdminDashboard';?>">Ok</a>
	</div>
</div>
<?php }  
else{
	redirect('/admin');
}
?> 