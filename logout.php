<?php

	include('config.php');
		if(isset($_COOKIE['AUTHCOOKIE']))
		{
			setcookie("AUTHCOOKIE","",time()+0);
			header('location:'.LOGINURL.'?ID=0');
		}
		else if(isset($_SESSION['AUTH']))
		{
			unset($_SESSION['AUTH']);
			header('location:'.LOGINURL.'?ID=0');
		}
		else
		{
				header('location:'.LOGINURL.'?ID=2');
		}











?>