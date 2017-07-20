<?php include "inc-files/before_content.code"; ?>
<script type = "text/javascript">
function removeTv(num)
{

	if(confirm("Изтриване на данни за телевизор!?"))
		self.location.href="exec_delete_tv.php?id_tv="+num;
}
</script>
<div id="content">
<br>
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');

$strQuery="SELECT tbl_tvs.*, tbl_create.make FROM tbl_tvs join
tbl_create on tbl_tvs.id_make=tbl_create.id_make order by make";

$result = $mysqli->query($strQuery);

echo "<table border='1' align='center' width='600'>";
if (isset($_SESSION["username"]) && $_SESSION["usertype"]==1)
{

	echo "<tr><th>модел</th><th>цена</th><th
	colspan='2'>операции</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td><a href='show_tv.php?show_id=".$row['id_tv']."'
		title='Подробна информация'>" .htmlspecialchars(stripslashes($row[
		'make'])) . " </a></td><td>" .htmlspecialchars(stripslashes($row[
		'price'])) . " лева</td><td><a href='edit_tv.php?edit_id=".$row[
		'id_tv']."' title='Промяна на цената и на информацията'>редактиране</a></td><td><a href='javascript:removeTv(".
		$row['id_tv'].")' title='Изтриване на данните'>изтриване</a></td>";
		echo "</tr>";
	}
}
else
{

		echo "<tr><th>модел</th><th>цена</th></tr>";
		while($row = $result->fetch_assoc())
		{
			echo "<tr>";
			echo "<td><a href='show_tv.php?show_id=".$row['id_tv']."'
			title='Подробна информация'>" .htmlspecialchars(stripslashes($row[
			'make'])) . "</a></td><td>" .htmlspecialchars(stripslashes($row[
			'price'])). " лева</td>";
			echo "</tr>";
		}
}
echo "</table>";
$mysqli->close();
?>
</div>
<?php include "inc-files/after_content.code"; ?>
		