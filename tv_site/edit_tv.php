<?php include "inc-files/before_content.code"; ?>
<div id="content">
<table align="center"><tr><td>
 <form action="exec_edit_tv.php" method="post" enctype=
  "multipart/form-data">
	<u>Редактиране на данни за телевизор</u><br><br>
модел:
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');
if(isset($_GET['edit_id'])){
	$id=$_GET['edit_id'];
	$result = $mysqli->query("SELECT * FROM tbl_create cr join tbl_tvs tv on tv.id_make=cr.id_make where id_tv='$id'");
	if($row = $result->fetch_assoc()){
		echo "<select name='id_make'>";
		$resultmake = $mysqli->query("SELECT * FROM tbl_create cr RIGHT join tbl_tvs tv on tv.id_make=cr.id_make");

		while($rowmake = $resultmake->fetch_assoc())
		{
			if($rowmake['id_tv']==$id){
				echo "<option selected value='".htmlspecialchars(stripslashes($rowmake['id_make'])) . 
				"'>".htmlspecialchars(stripslashes($rowmake['make'])). "</option>";
			}else {
				echo "<option value='".htmlspecialchars(stripslashes($rowmake['id_make'])) . 
			"'>".htmlspecialchars(stripslashes($rowmake['make'])). "</option>";
			}
		}
		echo "</select>";
		echo "
		цена: <input type='number' min='0' name='price' value='".$row['price']."'>лева<br>
		Др. информация:<br><textarea name='moreinfo' rows='10' cols='40'>
		".$row['moreinfo']."</textarea><br>";
}
}
?>
<input type="submit" value="Добави">
	</form>
	</table>
	</div>
	<?php include "inc-files/after_content.code"; ?>