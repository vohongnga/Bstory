
<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/utils/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/utils/Utf8ToLatinUtil.php';
?><div class="gadget">
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
  <?php 
	$id=0;
	if(isset($_GET['id'])){$id = $_GET['id'];}
	$sql = "SELECT * FROM cat ";
	$result = $mysqli->query($sql);
	while($row = mysqli_fetch_assoc($result)){
		
		$catId=$row['cat_id'];
		$name=$row['name'];
		//^cat/(.*)-([0-9]+).html$
		$urlSeo= '/cat/'.utf8ToLatin($name).'-'.$catId.'.html';
		if($id==$catId){
  ?>
    <li><a href="<?php echo $urlSeo;?>"><span style="font-weight:bold"><?php echo $row['name'];?></span></a></li>
		<?php } else{ ?>
		<li><a href="<?php echo $urlSeo;?>"><?php echo $row['name'];?></a></li>
		<?php }}?>
  </ul>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
  <?php 
	$sql1="SELECT *FROM story ORDER BY story_id DESC LIMIT 3";
	$result1 =$mysqli->query($sql1);
	while($arr=mysqli_fetch_assoc($result1)){
		$name=$arr['name'];
		$id=$arr['story_id'];
		$urlSeo= '/detail/'.utf8ToLatin($name).'-'.$id.'.html';
  ?>
    <li><a href="<?php echo $urlSeo;?>"><?php echo $arr['name'];?></a><br />
    
	</li>
   <?php 
	}
   ?>
  </ul>
</div>