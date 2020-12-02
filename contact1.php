<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
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
      
      <form action="#" method="post" id="sendemail">
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
            <input type="image" name="imageField" id="imageField" src="images/submit.gif" class="send" />
            <div class="clr"></div>
          </li>
        </ol>
      </form>
    </div>
  </div>
  <div class="sidebar">

  </div>
  <div class="clr"></div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
