<?php
$sqli = new mysqli("localhost", "sebastian", "", "yasn");

function sql_get_all(string $query)
{
$sqli = new mysqli("localhost", "sebastian", "", "yasn");
  if ($result = $sqli->query($query)) {
    return $result->fetch_all(MYSQLI_ASSOC);
  }
  return null;
}

function sql_get(string $query)
{
$sqli = new mysqli("localhost", "sebastian", "", "yasn");
  if ($result = $sqli->query($query)) {
    return $result->fetch_assoc();
  }
  return null;
}

function sql_send(string $query)
{
$sqli = new mysqli("localhost", "sebastian", "", "yasn");
  if ($sqli->query($query)) {
    return true;
  }
  return false;
}
