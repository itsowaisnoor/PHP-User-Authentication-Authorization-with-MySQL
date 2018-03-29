<!-- By Owais Noor-->
<?php

		include('config.php');
		BUNDLE::getLoginEssentials();
		$user = new users();
		$user->setDefaultUrl(DEFAULTURL);
		$user->setLoginUrl(LOGINURL);
		if($_SERVER['REQUEST_METHOD']== "POST")
		{
			$processUser = new processUsers();
			$user->setUsername($_POST['username']);
			$user->setPassword($_POST['password']);
			
			if(isset($_POST['rememberMe']))
				$user->setRememberme($_POST['rememberMe']);
				else
					$user->setRememberme("off");
			
			
			$processUser->login($user);
			
		}
		
		
		if(isset($_REQUEST['ID']))
		{
			$user->setMessage(BUNDLE::authMessages($_REQUEST['ID']));
		}
		
		
?>

<html>
<head>
	<title>LOGIN PANEL</title>
</head>
<body style="margin:auto;">
	
	<div style="background-color:#01a2a6; width:100%; min-height:690px; text-align:center; font-family:arial; font-size:20px; margin:auto;">
	<h1 style="background-color:#01a2a6; text-align:center; padding-top:190px;">LOGIN HERE </h1>
	<div style="color:white; padding-bottom:20px;"><?php echo $user->getMessage();?></div>
	<form action="index.php" method="post">
		<input type="text" placeholder="Username" autocomplete="off" name="username"
		style="width:20%; height:50px; font-size:20px; border:none; border-radius:20px; padding:10px;"/> </br> </br>
		<input type="password" placeholder="Password" autocomplete="off" name="password" 
		style="width:20%; height:50px; font-size:20px; border:none; border-radius:20px; padding:10px;"/> </br> </br>
		<input type="submit" value="LOGIN" 
		style="width:20%; height:50px; color:black; cursor:pointer; font-size:20px; border:none; border-radius:20px; padding:10px;"/></br>
		<label style="font-size:20px; cursor: pointer;">
		 <input type="checkbox" name="rememberMe" id="rememberMe" style="margin-top:20px;"/>
			Remember Me
		</label>
	</form>
	</div>
</body>
</html>