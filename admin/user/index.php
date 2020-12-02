<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type = "text/javascript">
	document.title= 'User';
</script>
<?php 
	if(!isset($_SESSION['arUser'])){
		header('Location:../auth/login.php');
	}
?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="add.php" class="btn btn-success btn-md">Thêm</a>
                                </div> 
								<?php 
								
								if(isset($_GET['msg'])){
								echo $_GET['msg'];}?>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="/admin/xulitimkiem.php">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" name = "ten"/>
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>username</th>
										 <th>fullname</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										$row_count=ROW_COUNT;
										$sqlTSD = "SELECT COUNT(*) AS TSD FROM users";
										$resultTSD = $mysqli->query($sqlTSD);
										$arrTSD = mysqli_fetch_assoc($resultTSD);
										$TSD=$arrTSD['TSD'];
										$tongSoTrang=ceil($TSD/$row_count);
										$current_page=1;
										if(isset($_GET['page'])){
											$current_page=$_GET['page'];
										}
										//tinh offset
										$offset=($tongSoTrang-1)*$row_count;
										$sqlUser = "SELECT id,username,fullname FROM users ORDER BY id DESC LIMIT {$offset},{$row_count}";
										$resultUser = $mysqli->query($sqlUser);
										while($arUsers = mysqli_fetch_assoc($resultUser)){
											$userId = $arUsers['id'];
											$name = $arUsers['username'];
											$fullname = $arUsers['fullname'];
											$urlDel = "/admin/user/del.php?id={$userId}" ;
											$urlEdit = "/admin/user/edit.php?id={$userId}" ;
									?>
                                    <tr class=" gradeX">
                                        <td><?php  echo $userId;?></td>
                                        <td><?php echo $name;?></td>
										 <td><?php echo $fullname;?></td>
                                        <td class="center">
										<?php 
											if($name != 'admin'|| $_SESSION['arUser']['username']=='admin'){
										?>
                                            <a href="<?php echo $urlEdit;?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
											<?php 
											}
												if($name!='admin'){
											?>
                                            <a href="<?php echo $urlDel;?>" title="" class="btn btn-danger" onClick = "return confirm('Ban co chac xoa khong')"><i class="fa fa-pencil"></i> Xóa</a>
												<?php }?>
                                        </td>
                                    </tr>
                                   <?php }?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến <?php echo $TSD;?> của users</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                          <?php 
											$active='';
											for($i=1;$i<$TSD;$i++){
												if($i==$current_page){
													$active='active';
												}else{
													$active='';
												}
											
										  ?>
                                            <li class="paginate_button<?php echo $active;?>"><a href="index.php?page=<?php echo $i?>"><?php echo $i?></li>
                                           <?php 
											}
										   ?>
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
<script>
	$(document).ready(function(){
		$("#user-admin").addClass('active-menu');
	});
	
</script>