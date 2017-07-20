<?php include "inc-files/before_content.code"; ?>
<div id="content">
<table align="center"><tr><td>
 <form action="exec_delete_tv.php" method="post" enctype=
  "multipart/form-data">
	<u>Изтриване на данни за телевизор"</u><br><br>
модел:
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');
$result = $mysqli->query("SELECT * FROM tbl_tvs tv join tbl_create cr on cr.id_make=tv.id_make");
echo "<select name='id_tv'>";
echo "<option value='0'>Изберете...</option>";
while($row = $result->fetch_assoc())
{
echo "<option value='".htmlspecialchars(stripslashes($row['id_tv'])) . 
"'>".htmlspecialchars(stripslashes($row['make'])). "</option>";
}
echo "</select>";
$mysqli->close();
?>
<input type="submit" value="Изтрий">
	</form>
	</table>
	</div>
	<?php include "inc-files/after_content.code"; ?>