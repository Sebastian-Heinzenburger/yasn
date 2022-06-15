<?php
require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

if (!trim($_POST["profile"])) {
  header("Location: {$_SERVER["HTTP_REFERER"]}");
  die();
}

$my_userid = sql_get("SELECT id from users WHERE username=\"{$_SESSION["username"]}\"")["id"];
$follow_username = $sqli->real_escape_string($_POST["profile"]);
$follow_userid = sql_get("SELECT id from users WHERE username=\"{$follow_username}\"")["id"];


if (sql_get("SELECT user_id FROM following WHERE followed_id=\"{$follow_userid}\" AND user_id=\"{$my_userid}\";")) {
  //query to unfollow
  $query = sprintf(
    'DELETE FROM following WHERE user_id="%d" AND followed_id="%d";',
    $sqli->real_escape_string($my_userid),
    $sqli->real_escape_string($follow_userid)
  );
} else {
  //query to follow
  $query = sprintf(
    'INSERT INTO following ( user_id, followed_id) VALUES ( "%d", "%d");',
    $sqli->real_escape_string($my_userid),
    $sqli->real_escape_string($follow_userid)
  );
}

if (!sql_send($query))
  die($query);

header("Location: {$_SERVER["HTTP_REFERER"]}");
die();
