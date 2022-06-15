<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db); ?>

<html>
<?php include($boilerplate_html_header); ?>

<body>
  <div id="container">
    <?php
    include($boilerplate_header);
    echo "<main>";

    $user = sql_get("SELECT {$myprofile_information} FROM users WHERE username=\"{$_SESSION["username"]}\"");
    include($boilerplate_profile);
    echo "<div id='meinGrid'>";
    $posts = sql_get_all("select {$profile_posts_selection} from posts JOIN users ON users.id=posts.user_id WHERE users.username=\"{$_SESSION["username"]}\"");
    foreach ($posts as $post)
      include($boilerplate_post);
    echo "</div>";
    echo "</main>";

    include($boilerplate_footer);
    ?>
  </div>
</body>

</html>
