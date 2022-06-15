<?php
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
require($etc_db);

header("content-type:	application/json; charset=utf-8");
echo json_encode(sql_get_all("SELECT username,profile_picture,description,tel,addr,email,creation_date FROM users WHERE public=1"));
