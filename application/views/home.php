<?php
include_once('header.php');?>
<style>
 html, body, .container-table {
    height: 100%;
}
.container-table {
    display: table;
}
.vertical-center-row {
    display: table-cell;
    vertical-align: middle;
}
</style>
<div class="container container-table">
    <div class="row vertical-center-row">
		<div "text-center col-md-4 col-md-offset-4">
<?php
if(!isset($this->session->name))
{
	
 echo form_open(base_url()."admin/check","class='text-center'"); 
  echo form_submit('submit', 'Login', "class='btn btn-primary'");
  echo form_submit('submit', 'Register' ,"class='btn btn-primary'");
  echo form_close(); 
}
 if(isset($this->session->name)) { 
	   echo "<div class='text-center'>Hello ".$this->session->name."<br>";?>
		<a href="<?php echo base_url()."login/allrecords"?>" class="btn btn-primary">All Records</a>
		<form method="POST" action="<?php echo base_url().'admin/get_report'; ?>">
		<select name="table">
		<option value="register">Register</option>
		<option value="invoice_details">Invoice Details</option>
		<option value="individual_details">Individual Details</option>
		<option value="details_of_new_ac">Detail of New AC</option>
		<option value="details_of_old_ac">Detail of Old AC</option>
		<option value="customer_sign">Customer Sign</option>
		</select>
		<input type="submit" class="btn btn-primary" name="submit" value="submit">
		</div>
		<?php
	 }
	 ?>
 
  </div>
 </div>
 </div>
  <?php
  include_once('footer.php');?>