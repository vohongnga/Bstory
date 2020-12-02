<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sua banner</h2>
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
							$banner_id=$_GET['id'];
							$sqlOld="SELECT * FROM banner WHERE banner_id={$banner_id}";
							$sqlResultOld= $mysqli->query($sqlOld);
							$arrBanOld = mysqli_fetch_assoc($sqlResultOld);
							$fileNameOld= $arrBanOld['picture'];
							echo $fileNameOld;
							$link=$arrBanOld['link'];
							if(isset($_POST['submit'])){
								$link=$_POST['link'];
								$arFile=$_FILES['picture'];
								$fileName=$arFile['name'];
								if($fileName!=''){
								//doi ten file anh
								$fileName=renameFile($fileName);
								if($fileNameOld==$fileName){
									$sqlAddBanner= "UPDATE banner SET link='{$link}' WHERE banner_id={$banner_id}";
								}else{
								$tmpName=$arFile['tmp_name'];
								$pathUpload= $_SERVER['DOCUMENT_ROOT'].'/BSTORY/'.DIR_UPLOAD.'/'.$fileName;
								move_uploaded_file($tmpName,$pathUpload);
									//luu vao database
								$sqlAddBanner= "UPDATE banner SET picture='{$fileName}',
								link='{$link}'  WHERE banner_id={$banner_id}";
								}
								//echo $sqlAddStory;
								$arAddBanner = $mysqli->query($sqlAddBanner);
								if($arAddBanner){
								header('Location:/admin/banner?msg=success');}
								else{
									echo 'Co loi trong qua trinh them, vui long thu lai';
								}
							}
							}
							?>
                                <form role="form" method = "post" action = "" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Anh</label>
                                        <input type="file" name="picture" class="form-control" />
                                    </div>
									 <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="link" class="form-control" />
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