<?php include "inc-files/before_content.code"; ?>
<div id="content">
<table align="center"><tr><td>
 <form action="exec_insert_tv.php" method="post" enctype=
  "multipart/form-data">
	<u>Въвеждане на данни за нов телевизор"</u><br><br>
модел:
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');
$result = $mysqli->query("SELECT * FROM tbl_create order by make");
echo "<select name='id_make'>";
echo "<option value='0'>Изберете...</option>";
while($row = $result->fetch_assoc())
{
echo "<option value='".htmlspecialchars(stripslashes($row['id_make'])) . 
"'>".htmlspecialchars(stripslashes($row['make'])). "</option>";
}
echo "</select>";
$mysqli->close();
?>
цена: <input type="number" min="0" name="price" value="">лева<br>
Др. информация:<br><textarea name="moreinfo" rows="10" cols="40">
Информация...</textarea><br>
Снимка: <input type="file" name="imgFile"><br>
<input type="submit" value="Добави">
	</form>
	</table>
	</div>
	<?php include "inc-files/after_content.code"; ?>