<?php

$username = 'root';
$password = '';
$host = '127.0.0.1';
$dbname = 'blog';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$DB = new PDO($dsn, $username, $password);

$isValid = isset($_POST['category'])
			&& $_POST['category'] != '';

if ($isValid) {
	$sql_create = 'insert into categories (category) values (:category)';

	$query = $DB->prepare($sql_create);

	$query->bindValue(':category', $_POST['category'], PDO::PARAM_STR);

	$query->execute();
}

$sql_read = "select * from categories";
$query = $DB->query($sql_read);
$query->execute();


$res = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<form action="domasnaCRUD.php" method="post" autocomplete="off">
	<input type="text" name="category" placeholder="category" autocomplete="off">
	<button type="submit"> Save </button>
</form>

<table border="1" width="50%">
	<tr>
		<th>id</th>
		<th>category</th>
	</tr>
		<?php foreach($res as $row){ ?>
		<tr>
			<td><?=$row['id']; ?></td>
			<td><?=$row['category']; ?></td>
			
		</tr>
	<?php } ?>
</table>

<?php
echo '<br/>';

//Update Category
  
if (isset($_POST['selectId'])
	&& $_POST['selectId'] != '') {
		
	$selectId = $_POST['selectId'];
	$catReplace = $_POST['catReplace'];

	$sql_update = "update categories set category='$catReplace' where id='$selectId'";
	$query = $DB->query($sql_update);
	$query->execute();
}
?>

<form action="domasnaCRUD.php" method="post" autocomplete="off">
	<input type="number" name="selectId" placeholder="Select id">
	<input type="text" name="catReplace" placeholder="Update category name">
	<button type="submit">Update</button>
</form>

<?php

// Delete Category
if (isset($_POST['id_select'])
	&& $_POST['id_select'] != '') {

	$id_select = $_POST['id_select'];

	$sql_delete = "delete from categories where id='$id_select'";
	$query = $DB->query($sql_delete);
	$query->execute();
}

?>

<form action="domasnaCRUD.php" method="post" autocomplete="off">
	<input type="number" name="id_select" placeholder="Delete files" >
	<button type="submit">Delete</button>
</form>