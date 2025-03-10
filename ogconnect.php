<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo "<pre>";
//     print_r($_POST);
//     echo "</pre>";
// } else {
//     echo "Form not submitted via POST!";
// }


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$conn = new mysqli('localhost', 'root', '', 'signup');

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $firstname = !empty($_POST['firstname']) ? $_POST['firstname'] : null;
//     $lastname = !empty($_POST['lastname']) ? $_POST['lastname'] : null;
//     $email = !empty($_POST['email']) ? $_POST['email'] : null;
//     $password = !empty($_POST['password']) ? $_POST['password'] : null;

//     if (!$firstname || !$lastname || !$email || !$password) {
//         die("All fields are required!");
//     }
// } else {
//     die("Form not submitted correctly!");
// }



if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO customer_details (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
