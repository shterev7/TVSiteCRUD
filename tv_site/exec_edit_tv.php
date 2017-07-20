<?php include "inc-files/before_content.code"; ?>
<div id="content">
<?php
if (!isset($_SESSION["username"]) || ($_SESSION["usertype"]!=1))
{
	echo "<span class='errMsg'>Нямате права!</span>";
	exit;
}
$errMsg="";
if ($_POST["id_make"]==0) $errMsg .="Не е избран модел!<br>";
if (empty($_POST["price"]))
	$errMsg .="Не е въведена цена!<br>";
else
	if(!is_numeric($_POST["price"])) $errMsg .="Грешно въведена цена!<br>";
if ($errMsg)
{
	echo "<span class='errMsg'>".$errMsg."</span><br>";
	echo "<a href='edit_tv.php'>Ново въвеждане</a>";
}
else
{
	$mysqli=new mysqli(dbHost, dbUser, dbPasswd, dbName);
		$mysqli->set_charset('utf8');
		
		$str_query="UPDATE INTO tbl_tvs(id_make,price,moreinfo) VALUES ('"
		.$_POST["id_make"]."','".$_POST["price"]."','".$_POST["moreinfo"].
		"')";
		if($mysqli->query($str_query))
			echo "Данните са записани в базата...<br>";
			
			$fileErr=$_FILES["imgFile"]["error"]>0;
			if($fileErr)
			{
			echo "<span class='errMsg'>Не е заредена снимка.</span><br>";
			}

		else
		{
			$allowedExt = array("gif", "jpeg", "jpg", "png");
			$arrName=explode(".", $_FILES["imgFile"]["name"]);
			$ext = end($arrName);
			if (in_array($ext, $allowedExt) && ($_FILES["imgFile"]["size"] <200000))
			{
				$idTv=$mysqli->insert_id;
				$picName="Pic".$idTv.".".$ext;
				move_uploaded_file($_FILES["imgFile"]["tmp_name"], "pictures/".$picName);
				$str_query="update tbl_tvs set pictures='".$picName."' where id_tv=".$idTv;				
				
				if ($mysqli->query($str_query)) 
				echo "Image uploaded!";
 		}
			else
		{


 			echo "Invalid image fail <br>";
 		}
 	}
	
	$mysqli->close();
}
?>