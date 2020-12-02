<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script type = "text/javascript">
	document.title= 'Add User';
</script>
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
                <h2>Thêm người dùng</h2>
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
							$username = '';
							if(isset($_POST['submit'])){
								$username = $_POST['username'];
								$fullname = $_POST['fullname'];
								$password = md5($_POST['password']);
								$sqlAddUser = "INSERT INTO users(username,password,fullname) VALUES('{$username}','{$password}','{$fullname}')";
								$resultAddUser = $mysqli->query($sqlAddUser);
								
								if($resultAddUser){
									header('Location:/admin/user?msg=SUCCESS');
								}else{
									echo 'Co loi trong qua trinh them';
								}
							}
							?>
                                <form role="form" method = "post" action = "" class = "frmAdd">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $username;?>"  />
                                    </div>
									<div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Fullname</label>
                                        <input type="text" name="fullname" class="form-control" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                </form>
								<script>
									$(document).ready(function(){
										$('.frmAdd').validate({
											rules:{
												username:{
													required: true
												},
												password:{
													required: true
												},
												fullname:{
													required: true
												}
											},
											messages:{
												username:{
													required: "Vui lòng nhập tên truyện"
												},
												password:{
													required: "Vui lòng chọn danh mục truyện"
												},
												fullname:{
													required: "Vui lòng nhập mô tả"
												}
											}
										});
									});
								</script>
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