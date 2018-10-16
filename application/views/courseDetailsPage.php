<?php
	require_once('layoutPage.php');
	headers($pageTitle);
?>
	<div class="slider">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">
    				<div class="item active">
      				<img src = "<?= base_url();?>assets/images/about-banner.jpg" alt=" " class="img-responsive">
    			</div>
  			</div>
		</div>
 </div>
 <div class="row">
  <div class=" col-md-5 col-md-offset-4">
  <?php 
    $arr = array();
    foreach ($result as $key => $value) {
      ?>
      <h3>Semester :&nbsp; <?php echo $value['sem_id'] ?></h3>
      <?php
      $arr = explode("&&&", $value['string_agg']);
      ?>
      <table class="table" border="1">
        <tr>
          <th style="font-style: arial;"> Subject  Code:</th>
          <th style="font-style: arial;">Subject</th>
        </tr>
        <tr>
        <?php
          foreach ($arr as $key => $val) {
            ?>
            <td></td>
            <td style="color: #ff00dd;"><?php echo $val;?></td>
            </tr>
            <?php
          }
         ?>
      </table>
      <?php
    }
    ?>
  </div>
  </div>
<?php
  footer();
?>

