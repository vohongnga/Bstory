<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php 
	if(isset($_GET['id'])){
		$catId = $_GET['id'];
		$sqlDelCat = "DELETE FROM cat WHERE cat_id = {$catId}";
		$resultDelCat = $mysqli->query($sqlDelCat);
		if($resultDelCat){
			header('Location:/admin/cat?msg=SUCCESS');
		}else{
			echo 'Co loi trong qua trinh xoa';
		}
		}else{
			header('Location:/BSTORY');
	}

?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'templates/admin/inc/footer.php'; ?>