<?php

$con = mysql_connect("localhost","USERNAME MYSQL","PASSWORD MYSQL");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("DATABASE MYSQL", $con); 