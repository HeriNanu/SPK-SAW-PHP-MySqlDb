<?php
error_reporting(0);
@session_start();
require_once('config.php');
require_once('class-config.php');
$conn= new dbload();
$conn->ConnectDB();
require_once('page.php');
//require_once('template.php');
require_once('form_validation.php');
