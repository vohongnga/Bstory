<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php 
	if(isset($_GET['id'])){
		$banner_id = $_GET['id'];
		$sqlDelBan = "DELETE FROM banner WHERE banner_id = {$banner_id}";
		$resultDelBan = $mysqli->query($sqlDelBan);
		if($resultDelBan){
			header('Location:/admin/banner?msg=SUCCESS');
		}else{
			echo 'Co loi trong qua trinh xoa';
		}
		}else{
			header('Location:/');
	}

?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>