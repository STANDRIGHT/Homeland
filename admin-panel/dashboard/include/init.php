<?php
session_start();

/////////////////////////////////////////////////////////////////
/// 4.0 SET DETAULT TIME ZONE
/////////////////////////////////////////////////////////////////
date_default_timezone_set('Africa/Lagos');

require "conn.php";
require "tables.php";
require "class.php";
$db=new Database();
$app=new admin();
$gories=new categories();



