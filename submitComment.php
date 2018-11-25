<?php
$dbms = "mysql";
$servername = "localhost";
$username = "root";
$password = "zcl";
$dbname = "sysumap";

SESSION_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    //connect the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    //get the input
    $name = $_SESSION['user'];
    $submit_time = date("Y-m-d H:i:s");
    $content = $_GET['content'];
    $type= $_GET['type'];
    $sql = "INSERT INTO comment (name, content, submit_time, type) 
            VALUES ('$name', '$content', '$submit_time', '$type')";
    if ($conn->query($sql)) {
        return;
    }
    else
    {
        echo "<script>alert('评论失败');</script>";
        return;
    }
    
    $conn = null;
}
else{
    echo "<script>alert('请先登录')</script>";
}

?>
