<?php
session_start();
if (!$_SESSION["username"]) {
  header("Location: /");
  die();
}
