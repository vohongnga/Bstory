<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<script type = "text/javascript">
	document.title= 'Category';
	
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
                <h2>Quản lý danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
<?php 
//tong so dong
	$sqlTSD="SELECT COUNT(*) AS TSD FROM cat ";
	$resultTSD = $mysqli->query($sqlTSD);
	$arrTmp=mysqli_fetch_assoc($resultTSD);
	$tongSoDong=$arrTmp['TSD'];
	//so cat tren 1 trang
	$row_count=ROW_COUNT;
	//tong so trang
	$tongSotrang=ceil($tongSoDong/$row_count);
	//trang hien tai
	$current_page=1;
	if(isset($_GET['page'])){
		$current_page=$_GET['page'];
	}
	//tinh offset
	$offset=($current_page-1)*$row_count;
?>
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
                                    <form method="post" action="/admin/xulitimkiem.php">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" name = "ten" />
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
                                        <th>Tên</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
										$sql = "SELECT cat_id,name FROM cat ORDER BY cat_id DESC LIMIT {$offset},{$row_count}";
										$resultCat = $mysqli->query($sql);
										while($arCats = mysqli_fetch_assoc($resultCat)){
											$catId = $arCats['cat_id'];
											$name = $arCats['name'];
											$urlDel = "/admin/cat/del.php?id={$catId}" ;
											$urlEdit = "/admin/cat/edit.php?id={$catId}" ;
											
									
									?>
                                    <tr class=" gradeX">
                                        <td><?php  echo $catId;?></td>
                                        <td><?php echo $name;?></td>
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
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của <?php echo $tongSoDong;?> danh muc</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
										<?php 
											$active='';
											for($i=1;$i<=$tongSotrang;$i++){
												if($i==$current_page){
													$active='active';
												}else{
													$active='';
												}
										?>
                                            <li class="paginate_button <?php echo $active;?>"><a href="index.php?page=<?php echo $i?>"><?php echo $i?></a></li>
                                        <?php 
										}?>    
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
		$("#cat-admin").addClass('active-menu');
	});
	
</script>