<?php  
header('Content-Type: text/html; charset=utf-8');
$con = mysql_connect ("localhost", "root", "");
mysql_select_db("test_db",$con);
mysql_query(" SET NAMES 'utf8'");

if(isset($_POST['deltab'])){
	$DeltabQuery = "DELETE FROM tbl_excel";
	//$DeltabQuery = "DELETE FROM zak";
	mysql_query($DeltabQuery, $con);
	//mysql_close($con);
	header ('Location: index1.php');
}
if(isset($_POST['deltab'])){
	//$DeltabQuery = "DELETE FROM tbl_excel";
	$DeltabQuery = "DELETE FROM zak";
	mysql_query($DeltabQuery, $con);
	//mysql_close($con);
	header ('Location: index1.php');
}


if(isset($_POST['zak1'])){
	header ('Location: zak.php');
}

if(isset($_POST['up'])){
	$title = strip_tags(trim($_POST['name']));
	$kol = strip_tags(trim($_POST['attendance']));
	$addr = strip_tags(trim($_POST['addres']));
	$toch = strip_tags(trim($_POST['toch']));
	$Famili = strip_tags(trim($_POST['famil']));

	$UpdateQ = mysql_query ("INSERT INTO zak (`marka`,`addr`, `toch`,`famili`) 
	                       VALUES ('$title','$addr','$toch', '$Famili')");
	$UpdateQ = "UPDATE tbl_excel SET kol = kol - $addr WHERE id='$_POST[hidden]'" ;
	//$UpdateQ = "UPDATE tbl_excel SET zd = zd + $addr WHERE id='$_POST[hidden]'" ;
	header ('Location: vivod.php');

	mysql_query($UpdateQ, $con);
	//mysql_close($con);
}

if(isset($_POST['up'])){
	$addr = strip_tags(trim($_POST['addres']));
	$UpdateQ = "UPDATE tbl_excel SET zd = zd + $addr WHERE id='$_POST[hidden]'" ;
	header ('Location: vivod.php');
	mysql_query($UpdateQ, $con);
}

if(isset($_POST['zdx'])){
	$zdel = strip_tags(trim($_POST['zdel']));
	$UpdateQ = "UPDATE tbl_excel SET zd = zd - $zdel WHERE id='$_POST[hidden]'" ;
	header ('Location: vivod.php');
	mysql_query($UpdateQ, $con);
}

if(isset($_POST['zdx'])){
	$zdel = strip_tags(trim($_POST['zdel']));
	$UpdateQ = "UPDATE tbl_excel SET kol = kol + $zdel WHERE id='$_POST[hidden]'" ;
	header ('Location: vivod.php');
	mysql_query($UpdateQ, $con);
}


$sql = "SELECT * FROM tbl_excel";
$myData = mysql_query($sql,$con);
echo "<table border=1>
<tr>
<th>id</th>
<th>НАЗВАНИЕ</th>
<th>СКЛАД</th>
<th>ЗАКАЗ</th>
<th>УД</th>
<th>____</th>
<th>Кол-во</th>
<th>Точка</th>
<th>Фамилия</th>
</tr>";
while ($record = mysql_fetch_array($myData)){
	echo "<form action=vivod.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['id'];
	echo "<td>" . "<input type=text size=8 name=name value=" . $record['marka'] . ">";
	echo "<td>" . "<input size=5 name=attendance value=" . $record['kol'] . ">";
	echo "<td>" . $record['zd'];//echo "<td>" . "<input size=5 name=zd1 value=" . $record['zd'] . ">";
	echo "<td>" . "<input type=text size=1 name=zdel" . ">";
	echo "<td>" . "<input type=submit name=zdx value=УД" . ">";
	echo "<td>" . "<input type=text size=5 name=addres" . ">";
	echo "<td>" . "<input type=text size=10 name=toch" . ">";
	echo "<td>" . "<input type=text size=10 name=famil" . ">";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['id'] . ">";
	echo "<td>" . "<input type=submit name=up value=ОТПРАВИТЬ" . ">";
	//echo "<td>" . "<input type=submit name=update value=отправить" . ">";
	

	echo "</td>";
	echo "</form>";
}



	echo "<form action=vivod.php method=post>";
	echo "<input type=submit name=zak1 value=ЗАКАЗЫ". ">";
	echo "</form>";

echo "</table>";

echo "<form action=vivod.php method=post>";
echo "<input type=submit name=deltab value=УдалитьТаблицу". ">";
echo "</form>";

mysql_close($con);

//          <a href="index.php"> СТАРТ </a> <br />             <a href="zak.php"> ЗАКАЗЫ </a> <br /> 

//if(isset($_POST['update'])){
	//$title = strip_tags(trim($_POST['name']));

	//$UpdateQuery = mysql_query ("INSERT INTO zak (`marka`,`kol`,`addr`,`famili`) 
	//                       VALUES ('$title','34535','456','200') ");
	//$UpdateQuery = "UPDATE tbl_excel SET marka='$_POST[name]', kol='$_POST[attendance]' WHERE id='$_POST[hidden]'";
	//mysql_query($UpdateQuery, $con);
//}

  //$UpdateQ=mysql_query("UPDATE `tbl_excel` JOIN `zak` USING(`marka`) SET `tbl_excel`.`kol`=`tbl_excel`.`Kol` - `zak`.`addr`"); 
    //$UpdateQ=mysql_query("UPDATE `tbl_excel` JOIN `zak` USING(`marka`) SET `tbl_excel`.`kol`=`$kol` - `$addr`"); 


?>






