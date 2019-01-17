<?php
header('Content-Type: application/json');

require_once('db.php');

$sql   = "SELECT  *,
SUM(sale_amount)
from sales
group by sale_name
order by SUM(sale_amount) DESC";

$result = mysqli_query($conn,$sql);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>