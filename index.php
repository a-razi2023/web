<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>مهمانسرا1402</title>
<link href="style_login.css" rel="stylesheet" type="text/css">
</head>

<body>

<form action="index.php" method="post">
<div class="main">
	<div class="lo">
		<input type="text" name="user" id="user" placeholder="user name.."><br>
		<br>
		<input type="password" name="pass" id="pass" placeholder="password.."><br>
		<br>
		<input type="submit" name="btn_login" id="btn_login" value="  login  "><br>
		<div class="peigham">
		<br>
			
		
		<?php
session_start();
include("connection.php");
if(isset($_POST["btn_login"]))
{
	if(empty($_POST["user"]) || empty($_POST["pass"]))
	{
		echo("empty rec...");
	}
	else
	{
		$a="select count(*) from tb_user where unam=:user && upass=:pass ";
		$result=$connect->prepare($a);
		$result->bindparam(":user",$_POST["user"]);
		$result->bindparam(":pass",$_POST["pass"]);
		$result->execute();
		$num=$result->fetchcolumn();
		if($num>0)
		{
			//echo("vorod");
		$_SESSION['userlogin']=$_POST['user'];
			header("location:cheq_gozaresh.php");
			exit();
		}
		else
		{
			
			echo(" username or password is incorect");
		}
		
	}
}
else
{
	
}
	
?>
</div>
	</div>
		
</div>
	


</form>

</body>
</html>
