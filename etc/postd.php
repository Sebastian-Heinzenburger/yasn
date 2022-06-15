<?php
require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);
if (
  !trim($_POST["title"])
  || !trim($_POST["content"])
) {
  header("Location: {$_SERVER["HTTP_REFERER"]}");
  die();
}

$userid = sql_get("SELECT id from users WHERE username=\"{$_SESSION["username"]}\"")["id"];

$query = sprintf(
  'INSERT INTO posts ( user_id, title, content, creation_date) VALUES ( "%d", "%s", "%s", "%d" );',
  $sqli->real_escape_string($userid),
  $sqli->real_escape_string($_POST["title"]),
  $sqli->real_escape_string($_POST["content"]),
  $sqli->real_escape_string(time())
);

if (!sql_send($query))
  die($query);

header("Location: {$_SERVER["HTTP_REFERER"]}");
die();
