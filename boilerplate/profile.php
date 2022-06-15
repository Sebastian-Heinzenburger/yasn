<div class="feed-dev">
  <div class="seb-prof">

    <div id="profile-pic">
      <img style="width: inherit; height:inherit; border-radius:inherit" src="<?= $user["profile_picture"] ?>" alt="">
    </div>

    <a href="/userprofile.php?profile=<?= $user["username"] ?>" id="profile-name"> <?= $user["username"] ?> </a>

    <div id="profile-creation">
      <?= date("d-m-Y", $user["creation_date"]); ?>
    </div>

    <div id="profile-info">
      <div>
        <?= "{$user["vorname"]} {$user["nachname"]} <br> {$user["tel"]} <br> {$user["addr"]} <br> {$user["email"]} <br> {$user["description"]}" ?>
      </div>
    </div>

    <div id="follow">

      <?php if ($user["username"] !== $_SESSION["username"] && $_SESSION["username"] && $user["username"]) : ?>
        <?php
        $my_id = sql_get("SELECT users.id FROM users WHERE users.username=\"{$_SESSION["username"]}\"")["id"];
        $profile_id = sql_get("SELECT users.id FROM users WHERE users.username=\"{$user["username"]}\"")["id"];
        ?>

        <form action="/etc/follow.php" method="post">
          <input name="profile" value="<?= $user["username"] ?>" style="display: none">
          <?php if (!sql_get("SELECT user_id FROM following WHERE followed_id=\"{$profile_id}\" AND user_id=\"{$my_id}\";")) : ?>
            <button class="greenbutton" type="submit">follow</button>
          <?php else : ?>
            <button class="greenbutton" type="submit">followed</button>
          <?php endif ?>
        </form>

      <?php endif ?>
    </div>
  </div>

</div>
