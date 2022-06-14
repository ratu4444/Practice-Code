<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <Label>Name : </Label> <input type="text" name="name"> <br> <br>
        <Label>Profession : </Label> <input type="text" name="profession"> <br> <br>
        <Label>Mobile : </Label> <input type="text" name="mobile"> <br> <br>
        <Label>Email : </Label> <input type="text" name="email"> <br> <br>
        <input type="submit" name="submit">    
    </form>

    
</body>
</html>

<?php

$name = $profession = $mobile = $email = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = test_input($_POST["name"]);
    $profession = test_input($_POST["profession"]);
    $mobile = test_input($_POST["mobile"]);
    $email = test_input($_POST["email"]);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<?php   

echo "<h3>Your Input</h3>";
echo "<br>";
echo $name;
echo "<br>";
echo $profession;
echo "<br>";
echo $mobile;
echo "<br>";
echo $email;

?>