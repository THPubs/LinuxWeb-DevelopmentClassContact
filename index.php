<?php 

	include "dbcon.php";


if (isset($_POST['name']) && !empty($_POST['name'])) {
	$q = "UPDATE mycontacts SET name=?,phone=?,email=? WHERE id=?";
	$db->prepare($q)->execute(array($_POST['name'],$_POST['phone'],$_POST['email'],$_POST['id']));
}

//delete

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$q = "DELETE FROM mycontacts WHERE id=?";
	$db->prepare($q)->execute(array($_GET['id']));
}


	$q = "SELECT id,name,phone,email FROM mycontacts";
	$result = $db->prepare($q);
	$result-> execute();
	$data = $result->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table border="1">
	<th>ID</th>
	<th>Name</th>
	<th>Phone</th>
	<th>Email</th>
	<th>Action</th>
	<?php 
		foreach($data as $d){
			echo '<tr>';
			echo '<td>', $d['id'],'</td>';
			echo '<td>', $d['name'],'</td>';
			echo '<td>', $d['phone'],'</td>';
			echo '<td>', $d['email'],'</td>';
			echo '<td>';
			echo "<a href='edit.php?id=",$d['id'], "'>Edit</a>";
			echo "<a href='index.php?id=",$d['id'], "'>Delete</a>";
			echo '</td>';
			echo '</tr>';
		}
	?>
</table>

</body>
</html>