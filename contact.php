<?php include_once 'templates/story/inc/header.php'; ?>
<style>
	.error{
			color: red;
			font-style:italic;
			background:yellow;
			}
</style>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Liên hệ</span></h2>
      <div class="clr"></div>
      <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
    </div>
    <div class="article">
      <h2>Form liên hệ</h2>
      <div class="clr"></div>
      
      <form action="" method="post" class="sendemail">
        <ol>
          <li>
            <label for="name">Họ tên (required)</label>
            <input id="name" name="name" class="text" />
          </li>
          <li>
            <label for="email">Email (required)</label>
            <input id="email" name="email" class="text" />
          </li>
          <li>
            <label for="website">Website</label>
            <input id="website" name="website" class="text" />
          </li>
          <li>
            <label for="message">Nội dung</label>
            <textarea id="message" name="message" rows="8" cols="50"></textarea>
          </li>
          <li>
            <input type="image" name="imageField" id="imageField" src="templates/story/images/submit.gif" class="send" />
            <div class="clr"></div>
          </li>
        </ol>
      </form>
	  <script>
			$(document).ready(function(){
			$('.sendemail').validate({
				rules:{
					name:{
						required: true
						},
					email:{
						required: true
						},
					message:{
						required: true
						},
					website:{
						required: true
						}
				},
					messages:{
						name:{
							required: "Vui lòng nhập tên của bạn"
							},
						email:{
							required: "Vui lòng nhập email"
							},
						message:{
							required: "Vui lòng nhập mô tả"
							},
						website:{
							required: "Vui lòng nhập trang web"
							}
					}
			});
		});
		</script>
    </div>
  </div>
  <div class="sidebar">
  <?php include_once 'templates/story/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templates/story/inc/footer.php'; ?>
