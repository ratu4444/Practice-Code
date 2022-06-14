<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <title>Tonoy Bhai CRUD</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h2>Your name and your note plz!</h2>
            <div class="form-group">
                <label for="Name">Name :</label>        
                <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
                <label for="note">Note :</label>
                <textarea class="form-control" rows="5" id="note" name="textarea" placeholder="write your note here!"></textarea>
            </div>  
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>

<?php

$name = $textarea = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = ($_POST["name"]);
    $textarea = ($_POST["textarea"]);


}

$database = "information";
$table = "person";


$conn = mysqli_connect("localhost", "root", "root", "information");

if (!$conn) {
     die("Connection failed!");
}

$sql = "INSERT INTO person VALUES ('$name', 
      '$textarea')";
  
//  var_dump($sql); 


  if(mysqli_query($conn, $sql)){
      echo "<h3>data stored in a database successfully." 
          . " Please check your dbeaver" 
          . " to view the updated data</h3>"; 

      echo nl2br("<b>Added Just now :</b> \n $name \n $textarea \n\n  ");
      // echo "<br>";
   
  } else{

      echo "ERROR: Hush! Sorry $sql. " 
          . mysqli_error($conn);

  }
$sql = "INSERT INTO person VALUES ('$name', 
      '$textarea')";

$sql1 = "SELECT * FROM $table";
$result = $conn->query($sql1);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo  '<th scope="col">Name</th>';
        echo  '<th scope="col">Note</th>';
        echo  '<th scope="col">Action</th>';
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($result as $res) {
            echo "<tr>";
            echo "<td>{$res['Name']}</td>";
            echo "<td>{$res['Note']}</td>"; 
            echo "<td><a href='update-page.php' class='btn btn-info' role='button'>Update</a></td>"; 
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
} else {
    echo "0 result";
}

$conn->close();

?>


