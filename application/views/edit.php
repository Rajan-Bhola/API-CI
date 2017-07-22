<?php 
include_once('header.php');
foreach ($data['result'] as $data)
{?>
<form class="form-horizontal" method="POST" action="<?php echo site_url().'admin/update'; ?>">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="Email" type="text" name="username" value="<?php echo $data->username; ?>">
      </div>
    </div>
    
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" name="address"><?php echo $data->address; ?></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
    <input type="hidden" name="password" value="<?php echo $data->password; ?>">
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </fieldset>
</form>
<?php 
}
include_once('footer.php');?>