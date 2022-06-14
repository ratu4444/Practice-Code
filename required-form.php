<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }


    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <h3>PHP form validation example</h3>

        <p><span class="error"> * required field</span>  </p> 
        
        Name : <input type="text" name="name" > <span class="error"> * <?php echo $nameerr ?> </span> 
        <br> <br>
        Mail : <input type="text" name="mail"> <span class="error"> * <?php echo $mailerr; ?> </span> 
        <br> <br>
        Phone : <input type="text" name="phone"> <span class="error"> * <?php echo $phoneerr; ?> </span> 
        <br> <br>
        Gender : <input type="radio" name="gender"> Male 
        <input type="radio" name="gender"> Female 
        <input type="radio" name="gender"> Others
        <span class="error"> * <?php echo $gendeerr; ?> </span> 
        <br> <br>
        <input type="submit" name="submit">
        
    </form>
    
</body>
</html>
<?php
$name = $mail = $phone = $gender = "";
$nameerr = $mailerr = $phoneerr = $gendererr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"])){
        $nameerr = "Name is required";
    }

    else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["phone"])){
        $phoneerr = "Phone is required";
    }

    else {
        $phone = test_input($_POST["phone"]);
    }
    if (empty($_POST["mail"])){
        $mailerr = "Mail is required";
    }

    else {
        $mail = test_input($_POST["mail"]);
    }

    if (empty($_POST["gender"])){
        $gendererr = "Gender is required";
    }

    else {
        $gender = test_input($_POST["gender"]);
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<?php

echo "<h3> Your Input </h3>";

echo "<br>";
echo $name;

echo "<br>";
echo $mail;

echo "<br>";
echo $phone;

echo "<br>";
echo $gender;

?>