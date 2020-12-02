<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<style>
	.error{
			color: red;
			font-style:italic;
			background:yellow;
			}
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Đăng nhập</h2>
            </div>
        </div>
		<script type = "text/javascript">
		document.title= 'Đăng nhập';
		</script>
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
								if(isset($_POST['submit'])){
									$username = $_POST['username'];
									$password = md5($_POST['password']);
									$query = "SELECT * FROM users WHERE username = '{$username}' AND password='{$password}'";
									$ketqua = $mysqli->query($query);
									$arUser = mysqli_fetch_assoc($ketqua);
									if(count($arUser)>0){
										$_SESSION['arUser'] = $arUser;
										header('Location:../index.php');
									}else{
										echo'Sai username hac password';
									}
								}
							?>
                                <form role="form" method = "post" action = "" class="frmLogin">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value = "" />
                                    </div>
									 <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Đăng nhập</button>
                                </form>
                            </div>
							<script>
									$(document).ready(function(){
										$('.frmLogin').validate({
											rules:{
												username:{
													required: true
												},
												password:{
													required: true
												}
											},
											messages:{
												username:{
													required: "Vui lòng nhập tên đăng nhập"
												},
												password:{
													required: "Vui lòng nhập mật khẩu"
												}
											}
										});
									});
								</script>
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