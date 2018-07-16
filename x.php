<?php




if(isset($_POST['date'])){
$d  = $_POST['date'];
echo $d;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<form action="" method="post">
	<input type="date" name="date">
	<input type="submit" name="submit">


</body>
</html>