<?php include_once 'templates/story/inc/header.php'; ?> 
<div class="content_resize">
  <div class="mainbar">
  <?php 
	$id_story=$_GET['id'];
	$sqlStory="SELECT * FROM story WHERE story_id={$id_story}";
	$resultStory=$mysqli->query($sqlStory);
	$arrStory=mysqli_fetch_assoc($resultStory);
	$nameStory=$arrStory['name'];
	$created_at=$arrStory['created_at'];
	$detail=$arrStory['detail_text'];
	$counter=$arrStory['counter'];
	$cat_id=$arrStory['cat_id'];
	$counter +=1;
	$sqlUpdate = "UPDATE story SET counter= '{$counter}' WHERE story_id='{$id_story}'";
	$resultUpdate = $mysqli->query($sqlUpdate);
	$sqlLate="SELECT * FROM story WHERE story_id={$id_story}";
	$resultLate=$mysqli->query($sqlLate);
	$arrLate = mysqli_fetch_assoc($resultLate);
	$counter=$arrLate['counter'];
	
	
  ?>
<script type = "text/javascript">
	document.title= '<?php echo $nameStory?>';
</script>
    <div class="article">
      <h1><?php echo $nameStory;?></h1>
      <div class="clr"></div>
      <p>Ngày đăng: <?php echo $created_at;?>. Lượt đọc: <?php echo $counter;?></p>
      <div class="vnecontent">
        <?php echo $detail;?> 
      </div>
    </div>
    
    <div class="article">
      <h2><span>3</span> Truyện liên quan</h2>
      <div class="clr"></div>
      <?php 
		$sql = "SELECT * FROM story WHERE cat_id={$cat_id} AND story_id != {$id_story} ORDER BY story_id DESC LIMIT 3";
		$result = $mysqli->query($sql);
		while($arr=mysqli_fetch_assoc($result)){
			$name=$arr['name'];
			$storyId=$arr['story_id'];
			$picture = $arr['picture'];
			$urlSeo= '/detail/'.utf8ToLatin($name).'-'.$storyId.'.html';
	  ?>
      <div class="comment"> <a href="<?php echo $urlSeo;?>"><img src="/files/<?php echo$picture;?>" width="40" height="40" alt="" class="userpic" /></a>
        <h3><a href="<?php echo $urlSeo;?>"  style="text-decoration:none" title=""><?php echo $arr['name'];?></a></h3>
        <p></p>
      </div>
		<?php }?>
    </div>
  </div>
  <div class="sidebar">
    <?php include_once 'templates/story/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templates/story/inc/footer.php'; ?>
  
