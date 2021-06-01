<!DOCTYPE html>
<html>
<head>
	<title><?php 
	if($this->uri->segment(1) == "login" || $this->uri->segment(1) == "register")
 		echo $this->uri->segment(1);
 	else
		echo "Manage ". $this->uri->segment(1);
	?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
	<?php if(!empty($this->session->userdata('logged_in')) && $this->session->userdata('logged_in') == 1 )   {?>
	<a class="btn btn-danger" href="<?=base_url().'login/logout';?>">Logout</a>
<?php } ?>


		