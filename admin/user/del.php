<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php 
	if(isset($_GET['id'])){
		$UserId = $_GET['id'];
		$sqlDelUser = "DELETE FROM users WHERE id = {$UserId}";
		$resultDelUser = $mysqli->query($sqlDelUser);
		if($resultDelUser){
			header('Location:/admin/user?msg=SUCCESS');
		}else{
			echo 'Co loi trong qua trinh xoa';
		}
		}else{
			header('Location:/BSTORY');
	}

?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>