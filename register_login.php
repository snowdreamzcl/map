<?php
$dbms = "mysql";
$servername = "localhost";
$username = "root";
$password = "zcl";
$dbname = "sysumap";

//connect the database
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

//get the input
$name = $_POST["username"];
$pwd = $_POST["password"];

//get the submit type: register or login
$q = $_POST["submit"];

//register
if ($q == "register") {
	$sql = "INSERT INTO users (name, pwd) VALUES ('$name', '$pwd')";
	if ($conn->query($sql)) {
		echo "<script>alert('注册成功，请登录！');history.go(-1);</script>";
		return;
	}
	else
	{
	    echo "<script>alert('该用户名已经注册，请直接登录！');history.go(-1);</script>";
	    return;
	}
}
//login
else {
	$sql = "SELECT * FROM users";
	foreach ($conn->query($sql) as $row) {
	    if ($row['name'] == $name) {
	    	if ($row['pwd'] == $pwd) {
	    	    SESSION_start();
        		$_SESSION['user']=$name;
	    		header("location:main.html");   
	    		return;
	    	}
	    	else {
	    		echo "<script>alert('密码错误！');history.go(-1);</script>";
	    		return;
	    	}
	    }
	}
	
	echo "<script>alert('该用户名未注册！');history.go(-1);</script>";
}
$conn = null;
?> 