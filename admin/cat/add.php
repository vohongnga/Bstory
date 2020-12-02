<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<script type = "text/javascript">
	document.title= 'Delete Category';
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
                <h2>Thêm danh mục</h2>
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
							if(isset($_POST['submit'])){
								$name = $_POST['name'];
								$sqlAddCat = "INSERT INTO cat(name) VALUES('{$name}')";
								$resultAddCat = $mysqli->query($sqlAddCat);
								if($resultAddCat){
									header('Location:/admin/cat?msg=SUCCESS');
								}else{
									echo 'Co loi trong qua trinh them';
								}
							}
							?>
                                <form role="form" method = "post" action = "" class = "frmAdd">
                                    <div class="form-group">
                                        <label>Tên danh muc tin</label>
                                        <input type="text" name="name" class="form-control" value = "<?php echo $name;?>" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                </form>
                            </div>
							<script>
									$(document).ready(function(){
										$('.frmAdd').validate({
											rules:{
												name:{
													required: true
												}
											},
											messages:{
												name:{
													required: "Vui lòng nhập tên danh mục"
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
<script>
	$(document).ready(function(){
		$("#cat-admin").addClass('active-menu');
	});
	
</script>