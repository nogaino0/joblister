<?php include_once 'config/init.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>title</title>
</head>
<body>

	<?php 

	$t = new Template("template/frontPage.php");

	echo $t;

	 ?>

</body>
</html>