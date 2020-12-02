<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php 
	if(isset($_GET['id'])){
		$storyId = $_GET['id'];
		//del file anh
		$sqlGetStory = "SELECT picture FROM story WHERE story_id = {$storyId}";
		$resultGetStory = $mysqli->query($sqlGetStory);
		$arStory = mysqli_fetch_assoc($resultGetStory);
		$oldPicture=$arStory['picture'];
		if(!empty($oldPicture)){
			$pathUpload= $_SERVER['DOCUMENT_ROOT'].'/'.DIR_UPLOAD.'/'.$oldPicture;
			unlink($pathUpload);
		}
		
		//xoa trong database
		$sqlDelStory = "DELETE FROM story WHERE story_id = {$storyId}";
		$resultDelStory = $mysqli->query($sqlDelStory);
		if($resultDelStory){
			header('Location:/admin/story?msg=SUCCESS');
		}else{
			echo 'Co loi trong qua trinh xoa';
		}
		}else{
			header('Location:/BSTORY');
	}

?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>