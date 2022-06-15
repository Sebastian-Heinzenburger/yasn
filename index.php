<?php
session_start();
//require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);
?>

<html>
<?php include($boilerplate_html_header); ?>

<body>
  <div id="container">
    <?php include($boilerplate_header); ?>

    <?php
    if ($_SESSION["username"]) {
      echo "<main id='meinGrid'>";
      $my_id = sql_get("SELECT users.id FROM users WHERE users.username=\"{$_SESSION["username"]}\";")["id"];
      $posts = sql_get_all("SELECT posts.*,users.username,users.profile_picture FROM posts JOIN following ON following.followed_id=posts.user_id JOIN users ON following.followed_id=users.id WHERE following.user_id={$my_id};");
      foreach ($posts as $post)
        include($boilerplate_post);
      echo "</main>";
      if ($_SESSION["username"]) include($boilerplate_make_post);
    } else {
      require($login);
    }
    ?>

    <?php include($boilerplate_footer); ?>
  </div>
</body>

</html>
