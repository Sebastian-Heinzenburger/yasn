<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

if (!$_POST["email"] || !$_POST["password"]) {
  header("Location: /");
  die();
}

$email = $sqli->real_escape_string($_POST["email"]);
$query = "SELECT username,password FROM users WHERE email=\"{$email}\";";

if ($user = sql_get($query)) {
  if (password_verify($_POST["password"], $user["password"]))
    $_SESSION["username"] = $user["username"];
}

header("Location: /");
