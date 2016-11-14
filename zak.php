<?php  
header('Content-Type: text/html; charset=utf-8');
 $con = mysql_connect ("localhost", "root", "");
mysql_select_db("test_db",$con);
mysql_query(" SET NAMES 'utf8'");

if(isset($_POST['delete'])){
	//$tit = strip_tags(trim($_POST['name']));
	//print ($tit);
	//$DeleteQuery = "UPDATE tbl_excel SET kol = kol + $tit WHERE id='$_POST[hidden]'" ;
	$DeleteQuery = "DELETE FROM zak WHERE id='$_POST[hidden]'";
	print "НЕ ЗАБУДЬТЕ ПРОИЗВЕСТИ УДАЛЕНИЕ ИЗ ТАБЛИЦЫ !!!";
	mysql_query($DeleteQuery, $con);
}


$sql = "SELECT * FROM zak";
$myData = mysql_query($sql,$con);
echo "<table border=1>
<tr>
<th>id</th>
<th>__НАЗВАНИЕ__</th>
<th>Заказ</th>
<th>___Точка___</th>
<th>_Фамилия_</th>
</tr>";
while ($record = mysql_fetch_array($myData)){
	echo "<form action=zak.php method=post>";
	echo "<tr>";
	echo "<td>" .$record['id'];
	echo "<td>" .$record['marka'];
	echo "<td>" . "<input type=text size=5 name=name value="  . $record['addr'] . ">";
	echo "<td>" .$record['toch'];
	echo "<td>" .$record['famili'];
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['id'] . ">";
	//echo "<td>" . "<input type=submit name=update value=отправить" . ">";
	echo "<td>" . "<input type=submit name=delete value=удалить" . ">";
	echo "</td>";
	echo "</form>";

}


echo "<form action=vivod.php method=post>";
	echo "<input type=submit name=tab value=ТАБЛИЦА". ">";
	echo "</form>";


echo "</table>";
mysql_close($con);

// <a href="vivod.php"> ТАБЛИЦА </a> <br /> 

//if(isset($_POST['tab'])){
//	header ('Location: vivod.php');
//}

//if(isset($_POST['delete'])){
//	$tit = strip_tags(trim($_POST['name']));
	//print ($tit);
//	$DeleteQuery = "UPDATE tbl_excel SET kol = kol + $tit WHERE id='$_POST[hidden]'" ;
	  //$UpdateQ = "UPDATE tbl_excel SET kol = kol + $addr WHERE id='$_POST[hidden]'" ;
	//$DeleteQuery = "DELETE FROM zak WHERE id='$_POST[hidden]'";
	
//	mysql_query($DeleteQuery, $con);
//}



?>

<br>
