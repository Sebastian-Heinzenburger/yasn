<?php
session_start();
//require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

$html_title = "Trending Profiles";
?>

<html>
<?php include($boilerplate_html_header); ?>

<body>
  <div id="container">
    <?php include($boilerplate_header); ?>

    <main id='meinGrid'>
      <?php
      $posts = sql_get_all("SELECT {$posts_selection} FROM users JOIN posts on users.id=posts.user_id ORDER BY posts.likes DESC;");
      foreach ($posts as $post)
        include($boilerplate_post);
      ?>
    </main>
    <?php if ($_SESSION["username"]) include($boilerplate_make_post); ?>

    <?php include($boilerplate_footer); ?>
  </div>
</body>

</html>
