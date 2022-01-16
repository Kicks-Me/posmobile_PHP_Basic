<?php include('config.php'); ?>
<!DOCTYPE html>
<?php
	$qry = $conn->query("SELECT * FROM categories WHERE cat_name = '".trim($_POST['newcat'])."'");
	if(mysqli_num_rows($qry)){
		alertDiv('Name is dupplicated','errtxt','W');
		exit();
	}

	$conn->query("INSERT INTO categories SET cat_name='".trim($_POST['newcat'])."'");
	echo "<script>window.parent.ajax('category_list','showdetail');</script>";
?>