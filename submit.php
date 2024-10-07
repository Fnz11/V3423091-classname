<?php
$host = 'localhost';
$db = 'classform';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $hobbies = implode(', ', $_POST['hobbies']);
    $country = $_POST['country'];
    $bio = $_POST['bio'];

    $sql = "INSERT INTO form_data (username, password, gender, hobbies, country, bio) 
            VALUES ('$username', '$password', '$gender', '$hobbies', '$country', '$bio')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
