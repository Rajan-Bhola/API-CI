<html>
<head>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url().'admin'; ?>">Dashboard <span class="sr-only">(current)</span></a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
	 
        <li><a href="<?php echo base_url()."admin/register" ?>">Register</a></li>
  <?php     if(!isset($this->session->name)) 
  { ?>
		<li><a href="<?php echo base_url()."login" ?>">Login</a></li>
 <?php }
 else{
	 ?>
	 <li><a href="<?php echo base_url()."login/logout" ?>">Logout</a></li>
	 <?php
 }
 ?>
      </ul>
    </div>
  </div>
</nav>