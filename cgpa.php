<?php
$mark = "";

echo "OKKK";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mark = test_input($_post["mark"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>