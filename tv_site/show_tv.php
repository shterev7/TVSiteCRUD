<?php include "inc-files/before_content.code"; ?>
<div id="content">
<?php
$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
$mysqli->set_charset('utf8');
$result = $mysqli->query("SELECT tbl_tvs.*, tbl_create.make FROM tbl_tvs
join tbl_create on tbl_tvs.id_make=tbl_create.id_make where id_tv=".
$_REQUEST['show_id']);
$row = $result->fetch_assoc();
echo "<table border='1' align='center' height='300' width='800'>";
echo "<tr align='top'>";
echo "<td width='250'> модел: <b>".htmlspecialchars(stripslashes($row[
'make'])) . "</b><br>цена: <b>".htmlspecialchars(stripslashes($row['price'])).
"</b>лева<br><hr><span style='font-size:16px'><pre>".htmlspecialchars
(stripslashes($row['moreinfo']))."</pre></span></td><td>".($row['pictures'
]?"<img src='pictures/".$row['pictures']."'>":"Няма снимка...")."</td>";
echo "</tr>";
echo "</table>";
echo "<a href='javascript:history.back()' title='Връщане към предходната страницата'>Обратно към списъка</a>";
$mysqli->close();
?>
</div>
<?php include "inc-files/after_content.code"; ?>
