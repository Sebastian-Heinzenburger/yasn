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
      $users = sql_get_all("SELECT {$small_public_profile_information} FROM users WHERE public=1 ORDER BY creation_date DESC;");
      foreach ($users as $user)
        include($boilerplate_profile);
      ?>
    </main>

    <?php include($boilerplate_footer); ?>
  </div>
</body>

</html>
