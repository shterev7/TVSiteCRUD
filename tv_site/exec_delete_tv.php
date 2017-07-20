<?php include "inc-files/before_content.code"; ?>
<?php


if(isset($_GET['id_tv']))
{
	$id=$_GET['id_tv'];
	$mysqli = new mysqli(dbHost, dbUser, dbPasswd, dbName);
	$mysqli->set_charset('utf8');
	$delete=$mysqli->query("DELETE FROM tbl_tvs WHERE id_tv='$id'");
	if($delete)
	{
		?>
		<script>alert('record deleted successfully...');</script>
		<?php
		echo '<script type="text/javascript">window.location="list_tvs.php";</script>';
	}
	else
	{
		?>
		<script>alert('error in deleting record....');</script>
		<?php
	}
	
}
