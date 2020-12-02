﻿<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/utils/fileutils.php';?>

<script type = "text/javascript">
	document.title= 'Edit Story';	
</script><div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Chỉnh sửa truyện</h2>
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
							$id=$_GET['id'];
							$sql="SELECT * FROM story WHERE story_id='{$id}'";//hien thi ra truyen can chinh sua
							$sqlResult=$mysqli->query($sql);
							$arrResult=mysqli_fetch_assoc($sqlResult);
							$nameOld =$arrResult['name'];
							
							$previewOld=$arrResult['preview_text'];
							$detailOld=$arrResult['detail_text'];
							$catIdOld=$arrResult['cat_id'];
							$pictureOld=$arrResult['picture'];
							//$counter=$arrResult['counter'];
							if(isset($_POST['submit'])){
								$name = $_POST['name'];
								$catId=$_POST['cat_id'];
								$preview_text=$_POST['preview_text'];
								$detail_text=$_POST['detail_text'];
								//$counter=$_POST['counter'];
								$arFile=$_FILES['picture'];
								$fileName=$arFile['name'];
								if($fileName!=''){
								//doi ten file anh
									$fileName=renameFile($fileName);
									$tmpName=$arFile['tmp_name'];
									$pathUpload= $_SERVER['DOCUMENT_ROOT'].'/'.DIR_UPLOAD.'/'.$fileName;
									move_uploaded_file($tmpName,$pathUpload);
									$sqlEditStory= "UPDATE story SET name='{$name}',cat_id='{$catId}',preview_text='{$preview_text}',
									detail_text='{$detail_text}',picture = '{$fileName}' WHERE story_id='{$id}'";
									
								}else{
									if($pictureOld!=''){
										$sqlEditStory= "UPDATE story SET name='{$name}',cat_id='{$catId}',preview_text='{$preview_text}',
										detail_text='{$detail_text}',picture = '{$pictureOld}' WHERE story_id='{$id}'";
									}else{
										$sqlEditStory= "UPDATE story SET name='{$name}',cat_id='{$catId}',preview_text='{$preview_text}',
										detail_text='{$detail_text}' WHERE story_id='{$id}'";
									}
								}
								
								$arEditStory = $mysqli->query($sqlEditStory);
								if($arEditStory){
									header('Location:/admin/story?msg=success');}
								else{
									$nameOld = $name;
									$previewOld=$preview_text;
									$detailOld=$detail_text;
									$catIdOld = $catId;
								}
								
								
							}
							?>
                                <form role="form" method = "post" action = "" enctype="multipart/form-data" class = "frmEdit">
                                    <div class="form-group">
                                        <label>Tên truyen</label>
                                        <input type="text" name="name" class="form-control" value = "<?php echo $nameOld;?>" />
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
											if($catIdOld==$itemCatId){
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
                                        <input type="text" name="preview_text" class="form-control" value = "<?php echo $previewOld;?>" />
                                    </div>
									<div class="form-group">
                                        <label>Chi tiet</label>
                                        <textarea name="detail_text" id = "editor1"class="form-control" value = "<?php echo$detailOld;?>"></textarea>
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
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
                                </form>
								<script>
									$(document).ready(function(){
										$('.frmEdit').validate({
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