<?php 
header("Content-type: text/xml");
$host = "localhost";
$user = "it57660079";
$pwd = "rftPHJJk";
$db = "it57660079";
global $link;
$link = mysql_connect($host,$user,$pwd) or die ("Could not connect to MySQL");
mysql_query("SET NAMES UTF8",$link);
mysql_select_db($db,$link) or die ("Could not select $db database"); 


$year = $_GET[year];

//ตัวแปร array ที่ใ้ชสำหรับแสดงกราฟ
 $monthser = array(); // ตัวแปรแกน x
 //ตัวแปรแกน y
 $cvno = array();
 //หมดตัวแปรแกน y

//sql สำหรับดึงข้อมูล
$sql = "SELECT  *,
SUM(sale_amount)
from sales
group by sale_name
order by SUM(sale_amount) DESC";
//จบ sql
$result = mysql_query($sql);
while($row=mysql_fetch_array($result)) {
//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
 array_push($monthser,$row[sale_name]);
 array_push($cvno,$row[sale_amount]);
}
$catigory = "<item>".implode("</item><item>", $monthser)."</item>";
$cvnoxml = "<point>".implode("</point><point>", $cvno)."</point>";

$xml = '<chart>';
$xml .= '<categories>';
$xml .= $catigory;
$xml .= '</categories>';

$xml .= '<series>';
$xml .= '<data>';
$xml .= $cvnoxml;
$xml .= '</data>';
$xml .= '</series>';
$xml .= '</chart>';
echo $xml;
?>
