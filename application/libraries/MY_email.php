<?php
/**
  *  MY_email name has been given beacause of subclass_prefix in config.php file
  */
class MY_email extends CI_email
{
 	
 	public function mytest()
 	{
 		echo "\n"." I am just extending email lib";
 	}
} 
?>