<?php require_once("Include/Sessions.php"); ?>
<?php require_once("Include/Functions.php"); ?>
<?php
$_SESSION["User_Id"]=null;
$ExpireTime=time()-86400;
			setcookie("SettingEmail",null,$ExpireTime);
			setcookie("SettingName",null,$ExpireTime);
session_destroy();
Redirect_To("login.php");
?>