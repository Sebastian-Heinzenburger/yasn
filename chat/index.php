<?php
require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

$html_title = "Chat";
?>

<html>
<?php include($boilerplate_html_header); ?>

<body>
  <div id="container">
    <?php include($boilerplate_header); ?>
    <?php
    if (!$_GET["user"]) {
      require($chat_list);
    } else {
      echo "in priv chat";
    }
    ?>

    <?php include($boilerplate_footer); ?>
  </div>
</body>

</html>
