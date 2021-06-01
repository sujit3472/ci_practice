<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Model Example</title>
</head>
<body>
	<!-- <?php 
		$string = "Here is a dd text string consisting of eleven words.";
		$string = word_limiter($string, 4);
		//echo "$string";
	?> -->
	<table>
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Author</th>
			<th>Created date</th>
		</tr>
		<?php if(!empty($articles) && count($articles) > 0) { 
			foreach ($articles as $key => $row) {
				# code...
			
		?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['author'];?></td>
			<!-- <td><?php echo fn_formatted_Date($row['created_at']);?></td> -->
			<td><?php echo $row['created_at'];?></td>
		</tr>
		<?php } }else { ?>
			<tr>
				<td>Record not found</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>