<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
?>

<html>
<?php include($boilerplate_html_header); ?>

<body>
  <div id="container">
    <?php include($boilerplate_header); ?>

    <main>
      <h2>Impressum</h2>
      <p>Made by Sebastian, Template by Kuba</p>
    </main>

    <?php include($boilerplate_footer); ?>
  </div>
</body>

</html>
