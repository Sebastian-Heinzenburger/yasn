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
    $target_user = $sqli->real_escape_string($_GET["profile"]);
    $user = sql_get("SELECT username,profile_picture,description,tel,addr,email,creation_date FROM users WHERE username=\"{$target_user}\"");
    include($boilerplate_profile);
    echo "<div id='meinGrid'>";
    $posts = sql_get_all("select {$posts_selection} from posts JOIN users ON users.id=posts.user_id WHERE users.username=\"{$target_user}\"");
    foreach ($posts as $post)
      include($boilerplate_post);
    echo "</div>";
    echo "</main>";

    include($boilerplate_footer);
    ?>
  </div>
</body>

</html>
