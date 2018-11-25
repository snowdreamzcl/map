<?php
$dbms = "mysql";
$servername = "localhost";
$username = "root";
$password = "zcl";
$dbname = "sysumap";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$type = $_GET["type"];
$sql = "SELECT * FROM comment WHERE type='$type'";
foreach ($conn->query($sql) as $row) {
    $name = $row['name'];
    $content = $row['content'];
    $submit_time = $row['submit_time'];
    echo "<hr/>";
    echo "<div>
            <span>$name</span>
            <span>$submit_time</span>
            <p>$content</p>
            </div>";
}
$conn = null;
?> 