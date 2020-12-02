<?php include_once 'templates/story/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <?php 
		
		//tong so dong
		$sqlTSD="SELECT COUNT(*) AS TSD FROM story";
		$resultTSD=$mysqli->query($sqlTSD);
		$arTmp=mysqli_fetch_assoc($resultTSD);
		$tongSoDong=$arTmp['TSD'];
		//so truyen tren 1 trang
		$row_count= ROW_COUNT;
		//tong so trang
		$tongSoTrang= ceil($tongSoDong/$row_count);
		//trang hien tai
		$current_page=1;
		if(isset($_GET['page'])){
			$current_page=$_GET['page'];
		}
		//tinh offset
		$offset = ($current_page-1)*$row_count;
		$sql = "SELECT * FROM story ORDER BY story_id DESC LIMIT {$offset},{$row_count}";
		$resultStory = $mysqli->query($sql);
	
		
		while($arStory=mysqli_fetch_assoc($resultStory)){
			$storyId = $arStory['story_id'];
			$name=$arStory['name'];
			$urlSeo= '/detail/'.utf8ToLatin($name).'-'.$storyId.'.html';
			
	?>
    <div class="article">
      <h2><a href = <?php echo $urlSeo;?> style="text-decoration:none"><?php echo $arStory['name'];?></a></h2>
      <p class="infopost">Ngày đăng:<?php echo $arStory['created_at'];?>. Lượt đọc: <?php echo $arStory['counter']; ?></p>
      <div class="clr"></div>
      <div class="img"><img src="/files/<?php echo $arStory['picture'];?>" width="161" height="192" alt="" class="fl" /></div>
      <div class="post_content">
        <p><?php echo $arStory['preview_text'];?></p>
        <p class="spec"><a href="<?php echo $urlSeo;?>" class="rm">Chi tiết</a></p>
      </div>
      <div class="clr"></div>
    </div>
	<?php 
	}
	?>
      <p class="pages"><small>Trang <?php echo $current_page;?> / <?php echo $tongSoTrang;?></small>
	<?php 
		for($i=1;$i<=$tongSoTrang;$i++){
	?>
	<?php 
		if($i==$current_page){
	?>
	<span><?php echo $current_page;?></span>
<?php 
		}else{
		?>	
		<?php 
			$urlSeo='/page/'.$i;
		?>
	<a href="<?php echo $urlSeo;?>"><?php echo $i;?></a> 
	
		<?php }
		}?>
  </div>
  <div class="sidebar">
  <?php include_once 'templates/story/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templates/story/inc/footer.php'; ?>
