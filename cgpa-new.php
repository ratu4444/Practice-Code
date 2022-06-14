<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label for=""> Mark :</label> 
        <input type="text" name="mark">
        <input type="submit" value="submit">
    </form>
</body>
</html>

<?php
$mark = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mark = test_input($_POST["mark"]);
    $cgpa = calculate_cgpa($mark);
    echo $cgpa;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function calculate_cgpa($mark) {
    if ($mark > 79) return "A+";
    elseif ($mark > 69) return "A";
    elseif ($mark > 59) return "A-";
    elseif ($mark > 49) return "B";
    elseif ($mark > 39) return "C";
    elseif ($mark > 33) return "D";

    else return "Fail";
}

?>