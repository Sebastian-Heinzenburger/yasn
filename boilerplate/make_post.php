<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="make_post">

  <div class="animated" id="make_post_dialog" style="display:none">
    <form id="make_post_form" action="/etc/postd.php" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="Title" name="title">
      <input type="file" placeholder="Image" name="image">
      <textarea name="content" rows="4" cols="25" style="resize: vertical" placeholder="Content"></textarea>
      <button class="greenbutton" type="submit"> post </button>
    </form>
  </div>

  <button onclick="show_post_dialog()" id="make_post_icon" class="fa fa-pencil" />

  <script>
    function show_post_dialog() {
      var visible = document.getElementById("make_post_dialog").style.display;
      if (visible === "none" || visible) {
        document.getElementById("make_post_dialog").style.display = ""
        document.getElementById("make_post_icon").style.animation = "rotation 0.7s";
        document.getElementById("make_post_dialog").style.animation = "fadeIn 0.3s";
      } else {
        document.getElementById("make_post_dialog").style.animation = "fadeOut 0.3s";
        setTimeout(() => {
          document.getElementById("make_post_dialog").style.display = "none";
        }, 300);
        document.getElementById("make_post_icon").style.animation = "backrotation 0.7s";
      }
    }
  </script>
</div>
