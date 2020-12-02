<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
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
                <h2>Quản lý banner</h2>
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
								
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
							<?php 
									if(isset($_GET['msg'])==SUCCESS){
										echo 'Thuc hien thanh cong';
									}
							?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Picture</th>
										<th>Link anh</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										$sql = "SELECT * FROM banner ORDER BY banner_id DESC";
										$resultBan = $mysqli->query($sql);
										while($arBans = mysqli_fetch_assoc($resultBan)){
											$banner_id = $arBans['banner_id'];
											$picture = $arBans['picture'];
											$link=$arBans['link'];
											$urlDel = "/admin/banner/del.php?id={$banner_id}" ;
											$urlEdit = "/admin/banner/edit.php?id={$banner_id}" ;
											
									
									?>
                                    <tr class=" gradeX">
                                        <td><?php  echo $banner_id;?></td>
										 <td class="center">
											<?php if($picture!=''){?>
                                            <img src="/files/<?php echo $picture;?>" alt="" height="80px" width="100px" />
											
											<?php }?>
                                        </td>
										 <td><a href="<?php echo $link?>"><?php echo $link?></a></td>
                                        <td class="center">
                                            <a href="<?php echo $urlEdit;?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a href="<?php echo $urlDel;?>" title="" class="btn btn-danger" onClick = "return confirm('Ban co chac xoa khong')"><i class="fa fa-pencil"></i> Xóa</a>
                                        </td>
                                    </tr>
                                   <?php }?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của 24 truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                           
                                            <li class="paginate_button active" tabindex="0"><a href="#">1</a></li>
                                           
                                           
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
		$("#banner-admin").addClass('active-menu');
	});
	
</script>