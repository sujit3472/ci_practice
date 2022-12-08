<!DOCTYPE html>
<html>
<head>
	<title><?php 
	if($this->uri->segment(1) == "login" || $this->uri->segment(1) == "register")
 		echo $this->uri->segment(1);
 	else
		echo "Manage ". ucfirst($this->uri->segment(1));
	?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<?php if(!empty($this->session->userdata('logged_in')) && $this->session->userdata('logged_in') == 1 )   {?>
	<a class="btn btn-danger btn-sm mt-2" href="<?=base_url().'login/logout';?>">Logout</a>
<?php } ?>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
<script>
	
</script>
