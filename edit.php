<?php
$msg = false;



if (isset($_GET['id']) && !empty($_GET['id'])) {

	include "dbcon.php";

	$q = "SELECT name,phone,email FROM mycontacts WHERE id = ?";

	$stmt = $db->prepare($q);

	$stmt->execute(array($_GET['id']));

	$data = $stmt->fetchAll();

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Contacts</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>

<h1>Add Contacts</h1>
<br>
<?php 
	foreach($data as $d){
 ?>
<form action="index.php" method="POST">
	<label>Name :</label><input name="name" type="text" required value="<?php echo $d['name']; ?>">
	<br>
	<label>Phone :</label><input name="phone" type="text" value="<?php echo $d['phone']; ?>">
	<br>
	<label>Email :</label><input name="email" type="email" value="<?php echo $d['email']; ?>">
	<br>
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<input type="submit">
</form>
<?php } ?>

</body>
</html>