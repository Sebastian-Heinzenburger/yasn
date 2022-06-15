<?php
require($_SERVER['DOCUMENT_ROOT'] . "/watchdog.php");
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

if (!trim($_POST["postid"])) {
  die();
}

$postid = $sqli->real_escape_string($_POST["postid"]);
$upvotes = sql_get("SELECT posts.likes FROM posts WHERE posts.id=\"{$postid}\"")["likes"];
$user_id = sql_get("SELECT users.id FROM users WHERE users.username=\"{$_SESSION["username"]}\"")["id"];

$prev_vote = sql_get("SELECT type FROM post_likes WHERE user_id=$user_id AND post_id=\"{$postid}\";");
if ($prev_vote === NULL) {
  $upvotes--;
  sql_send("INSERT INTO post_likes VALUES (\"$user_id\", \"$postid\", -1)");
  sql_send("UPDATE posts SET posts.likes = $upvotes WHERE posts.id=\"$postid\"");
} elseif ($prev_vote["type"] == 1) {
  sql_send("UPDATE post_likes SET post_likes.type = -1 WHERE user_id=\"$user_id\" AND post_id=\"$postid\"");
  $upvotes = $upvotes - 2;
  sql_send("UPDATE posts SET posts.likes = $upvotes WHERE posts.id=\"$postid\"");
} elseif ($prev_vote["type"] == -1) {
  sql_send("DELETE FROM post_likes WHERE user_id=\"$user_id\" AND post_id=\"$postid\"");
  $upvotes++;
  sql_send("UPDATE posts SET posts.likes = $upvotes WHERE posts.id=\"$postid\"");
}
echo $upvotes;
