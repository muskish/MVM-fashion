<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Could not connect: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$raw_password = $_POST['password'];

$hashed_password = password_hash($raw_password, PASSWORD_BCRYPT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $sql = "INSERT INTO customer_details (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);

    if ($result) 
    {
        echo "Registration successful!";
    } 
    else 
    {
        echo "Error: " . mysqli_error($conn);
    }
}

$conn->close();

?>
