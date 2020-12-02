<?php include_once 'templates/story/inc/header.php'; ?>
<?php 
	$id=$_GET['id'];
	//lay tieu de truyen
	$sql = "SELECT name FROM cat WHERE cat_id={$id}";
	$result = $mysqli->query($sql);
	$arrCat=mysqli_fetch_assoc($result);
	$nameCat=$arrCat['name'];
?>
<script type = "text/javascript">
	document.title= '<?php echo $nameCat?>'; <!-- doi title cho trang web>
</script>
<div class="content_resize">
  <div class="mainbar">
    <?php 
		//tong so truyen
		$sqlTSD="SELECT COUNT(*) AS TSD FROM story WHERE cat_id={$id}";
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
		$sql = "SELECT * FROM story WHERE cat_id={$id} ORDER BY story_id DESC LIMIT {$offset},{$row_count}";
			//echo $sql;
		$resultStory = $mysqli->query($sql);
	?>
	<h1><?php echo $nameCat;?></h1>
	<?php 
		while($arStory=mysqli_fetch_assoc($resultStory)){
		$storyId = $arStory['story_id'];
		$nameStory = $arStory['name'];
		$created_at = $arStory['created_at'];
		$counter=$arStory['counter'];
		$preview_text=$arStory['preview_text'];
		$picture = $arStory['picture'];
		$urlSeo= '/detail/'.utf8ToLatin($nameStory).'-'.$storyId.'.html';
	?>
    <div class="article">
	
	  
      <h2><a href ="<?php echo $urlSeo;?>" style="text-decoration: none"><?php echo $nameStory;?></a></h2>
      <p class="infopost">Ngày đăng: <?php echo $created_at;?>. Lượt đọc: <?php echo $counter;?></p>
      <div class="clr"></div>
      <div class="img"><img src="/files/<?php echo $picture;?>" width="161" height="192" alt="" class="fl" /></div>
      <div class="post_content">
        <p><?php echo $preview_text;?></p>
        <p class="spec"><a href="<?php echo $urlSeo;?>" class="rm">Chi tiết</a></p>
      </div>
      <div class="clr"></div>
    </div>
		<?php }?>
    <p class="pages"><small>Trang <?php echo $current_page;?> / <?php echo $tongSoTrang?></small> 
	<?php
		for($i=1;$i<=$tongSoTrang;$i++){
			if($i==$current_page){
	?>
	<span><?php echo $current_page;?></span>
			<?php	}
				else{
						$urlSeo1 = '/cat/'.utf8ToLatin($nameCat).'-page-'.$i.'.html'
			?>
	<a href="<?php echo $urlSeo1;?>"><?php echo $i;?></a> 
	</p>
		<?php }}?>
  </div>
  <div class="sidebar">
  <?php include_once 'templates/story/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templates/story/inc/footer.php'; ?>
