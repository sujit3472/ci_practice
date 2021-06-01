<h1>Hello World</h1>

<h3>Test</h3>


Name:<?php echo $name ?><br>
Email <?php echo $email ?><br/><br/>

<?php 
foreach ($new_array as $key => $value) {
	echo $value ."<br/>";
}
foreach ($arrArticles as $key => $value) {
	echo $value ."<br/>";
}

foreach ($arrUsers as $key => $users) {
	
	echo $users['id']."-". $users['name'] ."<br/>";
}

?>
