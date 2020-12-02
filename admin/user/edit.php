<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script type = "text/javascript">
	document.title= 'Edit User';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
							<?php 
							$idUser=$_GET['id'];
							$sqlUser="SELECT * FROM users WHERE id = '{$idUser}'";
							$resultUser= $mysqli->query($sqlUser);
							$arUser=mysqli_fetch_assoc($resultUser);
							
							if(isset($_POST['submit'])){
								$username = $_POST['username'];
								$fullname = $_POST['fullname'];
								$password = $_POST['password'];
								if($password==''){//khong chinh sua mat khau
									$sqlEditUser="UPDATE users SET fullname='{$fullname}' WHERE id='{$idUser}'";
								}else {//Co chinh sua mat khau
									$password= md5($password);
									$sqlEditUser="UPDATE users SET password='{$password}',
																   fullname='{$fullname}' WHERE id='{$idUser}'";
																   echo $sqlEditUser;
								}
								$resultEditUser=$mysqli->query($sqlEditUser);
								if($resultEditUser){
									header('Location:/admin/user?msg=SUCCESS');
								}else{
									echo 'Co loi trong qua trinh sua';
								}
								
							}
							?>
                                <form role="form" method = "post" action = "">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control"  value = "<?php echo $arUser['username'];?>" readonly />
                                    </div>
									<div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" value = "<?php echo $arUser['fullname'];?>" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md" >Sửa</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
<script>
	$(document).ready(function(){
		$("#user-admin").addClass('active-menu');
	});
	
</script>