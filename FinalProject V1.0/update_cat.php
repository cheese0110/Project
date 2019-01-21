<?
include 'db2.php';

		$categories_id = $_POST['categories_id'];
		$categories_name = $_POST['categories_name'];
		$categories_img = $_POST['categories_img'];
		$q = "UPDATE categories SET categories_name='$categories_name' WHERE categories_id ='$categories_id' ";

		$result = mysqli_query($conn,$q);
		if ($result) {
			
        header("Location: table-cat.php");
        
		}else{
			echo "no";
		}
?>