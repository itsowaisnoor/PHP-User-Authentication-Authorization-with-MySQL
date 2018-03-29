<?php
	session_start();
	DEFINE('INCLUDES','includes/');
	DEFINE('CONTROLLER','controller/');
	DEFINE('WEBPATH','http://localhost:1020/login/');
	DEFINE('MODEL','model/');
	DEFINE('VIEW','view/');
	
	//for database
	DEFINE('HOST','localhost');
	DEFINE('DBUSER','root');
	DEFINE('DBPASS','');
	DEFINE('DBNAME','loginuser');
	
	DEFINE('DEFAULTURL',WEBPATH.VIEW.'profile.php');
	DEFINE('LOGINURL',WEBPATH.'index.php');
	
	//echo (WEBPATH.VIEW.'profile.php');

	
	
	class BUNDLE
	{
		public static function getLoginEssentials()
		{
			include(INCLUDES.'connect.php');
			include(MODEL.'users.php');
			include(CONTROLLER.'processUsers.php');
		}
		
		public static function isAuthorized($id)
		{
			if(!isset ($_SESSION['AUTH']) && !isset ($_COOKIE['AUTHCOOKIE']))
				header('location:'.LOGINURL.'?ID='.$id);
		}
		
		public static function authMessages($param)
		{
			if($param==1)
			return "You are not authorized to access this page!";
			if($param=="0")
			return "Successfully logged out!";
			if($param=="2")
			return "You cannot logout without Signing in!";
		
		
		}
		
	}
	
	




?>