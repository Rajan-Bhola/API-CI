<?php
include_once('header.php');?>
<div class="container container-table">
    <div class="row vertical-center-row">
<div class="text-center">
<div class="col-lg-8 ">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Name</th>
      <th>Address</th>
    </tr>
  </thead>
  <tbody>
<?php $i=1;


  foreach($data['result'] as $data)
  { 
  ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data->username; ?></td>
      <td><?php echo $data->address; ?></td>
	  <td><a href="<?php echo base_url()."admin/edit/".$data->id; ?>" class='btn btn-primary'>Edit</a></td>
	  <td><a href="<?php echo base_url()."admin/delete/".$data->id; ?>" class='btn btn-danger'>Delete</a></td>
	  
    </tr>
  <?php
  $i++;
  }
?>  
   
  </tbody>
</table> 
</div>
</div>
</div>
</div>
<?php
include_once('footer.php');?>