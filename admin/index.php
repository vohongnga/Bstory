<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<?php 
	if(!isset($_SESSION['arUser'])){
		header('Location:auth/login.php');
	}
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>TRANG QUẢN TRỊ VIÊN</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                    <div class="text-box">
						
                        <p class="main-text"><a href="cat/index.php" title="">Quản lý danh mục</a></p>
                        <p class="text-muted">Có 4 danh mục</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="story/index.php" title="">Quản lý truyện</a></p>
                        <p class="text-muted">Có 20 truyện</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="user/index.php" title="">Quản lý người dùng</a></p>
                        <p class="text-muted">Có 5 người dùng</p>
                    </div>
                </div>
            </div>
			 <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="banner/index.php" title="">Quản lý silde</a></p>
                        <p class="text-muted">Có 3 slide</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
<script>
	$(document).ready(function(){
		$("#home-admin").addClass('active-menu');
	});
	
</script>