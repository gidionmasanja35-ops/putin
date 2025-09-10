<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="text" placeholder="firstname" name="firstname">
        <input type="text" placeholder="lastname" name="lastname">
        <input type="text" placeholder="email" name="email">
        <input type="int" placeholder="number" name="number">
        <input type="text" placeholder="gender" name=gender">
        <input type="button" value="submit">
    </form>
</body>

</html>

<?php
// Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "plat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'] ?? '';
    $lastname  = $_POST['lastname'] ?? '';
    $email     = $_POST['email'] ?? '';
    $phone     = $_POST['phone'] ?? '';
    $gender    = $_POST['gender'] ?? '';

    $sql = "INSERT INTO plat (firstname, lastname, email, phone, gender) 
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>