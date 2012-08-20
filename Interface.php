<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sudoku Solver</title>
</head>
<body>
<h1>Sudoku Solver</h1>
<!-- fgetcsv() -->
<?php
	move_uploaded_file($_FILES["boardCSV"]["tmp_name"],"out.csv");
	$file = "out.csv";
	fopen($file, "r");
	fpassthru($file);
?>
<form action="interface.php" method="post" enctype="multipart/form-data" >
	<label for="boardCSV">Enter the CSV file: </label><br/>
	<input type="file" name="boardCSV" id="boardCSV" value="Browse..."/> 
	<input type="submit" />
</form>
</body>
</html>