<?php
function print_list_entry($user)
{
  echo "
  <li id='chat-list-entry'> <img src='{$user["profile_picture"]}' style='width:50px'>{$user["username"]}</li>
";
}
?>

<main>
  <ul>
    <?php
    foreach (sql_get_all("SELECT username,profile_picture FROM users WHERE USERNAME !=\"{$_SESSION["username"]}\";") as $user) {
      print_list_entry($user);
    }
    ?>
  </ul>
</main>
