<?
include 'db2.php';

		$menu_id = $_POST['menu_id'];
		$menu_name = $_POST['menu_name'];
		$price = $_POST['price'];

		$q = "UPDATE menu SET menu_name='$menu_name',price='$price' WHERE menu_id ='$menu_id' ";

		$result = mysqli_query($conn,$q);
		if ($result) {
			
        header("Location: table-menu.php");
        
		}else{
			echo "no";
		}
?>