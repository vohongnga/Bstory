<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/utils/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/utils/CommonConstant.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/utils/Utf8ToLatinUtil.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BStory | VinaEnter Edu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/templates/story/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/templates/story/css/coin-slider.css" />
<script type="text/javascript" src="/templates/story/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/templates/story/js/script.js"></script>
<script type="text/javascript" src="/templates/story/js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
            <li class="active"><a href="index.php"><span>Trang chủ</span></a></li>
            <li><a href="/lien-he.html"><span>Liên hệ</span></a></li>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.php">BStory <small>Dự án khóa PHP tại VinaEnter Edu</small></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
	  <?php 
			$sql = "SELECT *FROM banner";
			$result = $mysqli->query($sql);
			while($arrbanner = mysqli_fetch_assoc($result)){
				$picture=$arrbanner['picture'];
		?>
        <div id="coin-slider"> 
		
		<a href="#"><img src="/files/<?php echo $picture;?>" width="940" height="310" alt="" /> </a/> 
		</div>
			<?php }?>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  
  <div class="content">