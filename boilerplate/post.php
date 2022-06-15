<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  function upvote(postid) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://yasn/etc/upvoted.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("postid=" + postid);
    xhttp.onreadystatechange = function() {
      if (xhttp.status === 200) {
        document.getElementById("like-count" + postid).innerText = xhttp.responseText;
      }
    };
  }

  function downvote(postid) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://yasn/etc/downvoted.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("postid=" + postid);
    xhttp.onreadystatechange = function() {
      if (xhttp.status === 200) {
        document.getElementById("like-count" + postid).innerText = xhttp.responseText;
      }
    };

  }
</script>
<div class="feed-dev">
  <div class="seb-post <?php if ($post["picture"] !== "") echo "pic"; ?>">
    <div id="profile-pic">
      <img style="width: inherit; border-radius:inherit" src="<?= $post["profile_picture"] ?>" alt="">
    </div>
    <a href="/userprofile.php?profile=<?= $post["username"] ?>" class="text" id="profile-name"> <?= $post["username"] ?></a>
    <div class="text" id="post-date">
      <?= date("d-m-Y", $post["creation_date"]); ?>
      <br> at
      <?= date("H-i-s", $post["creation_date"]); ?>
    </div>
    <?php if ($post["picture"] !== "") : ?>
      <div id="post-pic">
        <img style="height: inherit; width:inherit; border-radius:inherit" src="<?= $post["picture"] ?>" alt="">
      </div>
    <?php endif ?>
    <div class="text" id="post-title"> <?= $post["title"] ?> </div>
    <div class="text" id="post-content"> <?= $post["content"] ?> </div>
  </div>
  <div class="buttons">
    <span id="button-border">
      <span id="like-count<?= $post["id"] ?>"> <?= $post["likes"] ?></span>
      <button class="fa fa-arrow-up" onclick="upvote(<?= $post["id"] ?>)" id="upvote" />
      <button class="fa fa-arrow-down" onclick="downvote(<?= $post["id"] ?>)" id="downvote" />
    </span>
  </div>

</div>
