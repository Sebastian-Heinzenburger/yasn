<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

if (
  !trim($_POST["email"])
  || !trim($_POST["password"])
  || !trim($_POST["username"])
) {
  header("Location: /register.php");
  die();
}

if (sql_get("SELECT username FROM users WHERE email=\"{$sqli->real_escape_string($_POST["email"])}\";"))
  die("Email is already in use.");

if (sql_get("SELECT username FROM users WHERE username=\"{$sqli->real_escape_string($_POST["username"])}\";"))
  die("Username is already taken.");

$query = sprintf(
  'INSERT INTO users (username,profile_picture,description,public,vorname,nachname,tel,addr,email,password,creation_date) VALUES ( "%s", "%s", "%s", "%d", "%s", "%s", "%s", "%s", "%s", "%s", %d );',
  $sqli->real_escape_string($_POST["username"]),
  $sqli->real_escape_string("img/usr/1.png"),
  $sqli->real_escape_string($_POST["description"]),
  ($sqli->real_escape_string($_POST["public"]) === "on" ? 1 : 0),
  $sqli->real_escape_string($_POST["vorname"]),
  $sqli->real_escape_string($_POST["nachname"]),
  $sqli->real_escape_string($_POST["tel"]),
  $sqli->real_escape_string($_POST["addr"]),
  $sqli->real_escape_string($_POST["email"]),
  $sqli->real_escape_string(password_hash($_POST["password"], PASSWORD_DEFAULT)),
  $sqli->real_escape_string(time())
);

if (!sql_send($query))
  die($query);
else
  $_SESSION["username"] = $sqli->real_escape_string($_POST["username"]);

header("Location: /");
die();
