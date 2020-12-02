<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script type = "text/javascript">
	document.title= 'Edit Category';
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sua danh mục</h2>
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
							$name = '';
							$catId = 0;
							if(isset($_GET['id'])){
								$catId = $_GET['id'];
							}
							$sql = "SELECT cat_id,name FROM cat WHERE cat_id = {$catId}";
							$resultCat = $mysqli->query($sql);
							$arCat = mysqli_fetch_assoc($resultCat);
							$nameOld = $arCat['name'];
							if(isset($_POST['submit'])){
								$name = $_POST['name'];
								$sqlEditCat = "UPDATE cat SET name = '{$name}' WHERE cat_id = {$catId}";
								$resultEditCat = $mysqli->query($sqlEditCat);
								if($resultEditCat){
									header('Location:/admin/cat?msg=SUCCESS');
								}else{
									$nameOld = $name;
									echo 'Co loi trong qua trinh them';
								}
							}
							?>
                                <form role="form" method = "post" action = "">
                                    <div class="form-group">
                                        <label>Tên danh muc tin</label>
                                        <input type="text" name="name" class="form-control" value = "<?php echo $nameOld;?>" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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
		$("#cat-admin").addClass('active-menu');
	});
	
</script>