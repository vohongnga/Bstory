<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/utils/fileutils.php';?>
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
                <h2>Thêm truyện</h2>
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
							$name='';
							if(isset($_POST['submit'])){
								$name = $_POST['name'];
								$idCat=$_POST['cat_id'];
								$preview_text=$_POST['preview_text'];
								$detail_text=$_POST['detail_text'];
								$arFile=$_FILES['picture'];
								$fileName=$arFile['name'];
								if($fileName!=''){
								//doi ten file anh
								$fileName=renameFile($fileName);
								$tmpName=$arFile['tmp_name'];
								$pathUpload= $_SERVER['DOCUMENT_ROOT'].'/'.DIR_UPLOAD.'/'.$fileName;
								move_uploaded_file($tmpName,$pathUpload);
								}
								//luu vao database
								$sqlAddStory= "INSERT INTO story(name,preview_text,detail_text,picture,cat_id) VALUES('{$name}','{$preview_text}',
								'{$detail_text}','{$fileName}',{$idCat})";
								echo $sqlAddStory;
								$arAddStory = $mysqli->query($sqlAddStory);
								if($arAddStory){
								header('Location:/admin/story?msg=success');}
								else{
									echo 'Co loi trong qua trinh them, vui long thu lai';
								}
								
							}
							?>
                                <form role="form" method = "post" action = "" enctype="multipart/form-data" class= "frmAdd">
                                    <div class="form-group">
                                        <label>Tên truyen</label>
                                        <input type="text" name="name" class="form-control" value = "<?php echo $name; ?>" />
                                    </div>
									 <div class="form-group">
                                        <label>Danh muc truyen</label>
                                       <select class = "form-control" name = "cat_id"><?php 
										$sqlCat = "SELECT * FROM cat ";
										$resultCat = $mysqli->query($sqlCat);
										$selected="";
										while($arCat=mysqli_fetch_assoc($resultCat)){
											$itemCatId= $arCat['cat_id'];
											$nameCat= $arCat['name'];
											if($catId==$itemCatId){
												$selected="selected='selected'";
											}else{
												$selected="";
											}
									   ?> 
									   <option <?php echo $selected;?>value="<?php echo $itemCatId; ?>"><?php echo $nameCat;?></option>
										<?php }?>
                                    </div>
									 <div class="form-group">
                                        <label>Hinh anh</label>
                                        <input type="file" name="picture" class="form-control" value = "" />
                                    </div>
									 <div class="form-group">
                                        <label>Mo ta</label>
                                        <input type="text" name="preview_text" class="form-control" value = "" />
                                    </div>
									<div class="form-group">
                                        <label>Chi tiet</label>
                                        <textarea id = "editor1" name="detail_text" class="form-control " value = ""></textarea>
										<script type = "text/javascript">
											CKEDITOR.replace( 'editor1',
											{
												filebrowserBrowseUrl: '/library/ckfinder/ckfinder.html',
												filebrowserImageBrowseUrl: '/library/ckfinder/ckfinder.html?type=Images',
												filebrowserUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
												filebrowserImageUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
											});
										</script>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                </form>
								<script>
									$(document).ready(function(){
										$('.frmAdd').validate({
											rules:{
												name:{
													required: true
												},
												cat_id:{
													required: true
												},
												preview_text:{
													required: true
												},
												detail_text:{
													required: true
												}
											},
											messages:{
												name:{
													required: "Vui lòng nhập tên truyện"
												},
												cat_id:{
													required: "Vui lòng chọn danh mục truyện"
												},
												preview_text:{
													required: "Vui lòng nhập mô tả"
												},
												detail_text:{
													required: "Vui lòng nhập chi tiết"
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
		$("#story-admin").addClass('active-menu');
	});
	
</script>