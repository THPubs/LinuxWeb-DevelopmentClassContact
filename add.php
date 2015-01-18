<?php
$msg = false;
if (isset($_POST['name']) && !empty($_POST['name'])) {

	include "dbcon.php";

	$q = "INSERT INTO mycontacts (name,phone,email) VALUES (?,?,?)";

	$msg = $db->prepare($q)->execute(array($_POST['name'],$_POST['phone'],$_POST['email']));

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Contacts</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
	if($msg){
		echo '<p>Record added!</p>';
	}
?>
<h1>Add Contacts</h1>
<br>
<form action="add.php" method="POST">
	<label>Name :</label><input name="name" type="text" required>
	<br>
	<label>Phone :</label><input name="phone" type="text">
	<br>
	<label>Email :</label><input name="email" type="email">
	<br>
	<input type="submit">
</form>


</body>
</html>