<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Verifică dacă au fost trimise date prin POST
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Verifică dacă username și parola nu sunt goale
        if (!empty($username) && !empty($password)) {
            // Salvează în baza de date
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($con, $query);

            // Redirecționează către pagina de login
            header("Location: login.php");
            die;
        } else {
            echo "Please enter some valid information!";
        }
    } else {
        echo "Invalid data received!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style type="text/css">
        body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
}

#box {
    width: 300px;
    margin: 150px auto;
    padding: 20px;
    background-color: #333;
    border-radius: 8px;
    text-align: center;
    color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: inline-block;
}

div {
    font-size: 20px;
    margin: 10px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    box-sizing: border-box;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

a {
    color: white;
    text-decoration: none;
    display: block;
    margin-top: 10px;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>

<div id="box">
    <form method="post">
        <div style="font-size: 20px; margin: 10px; color: white;">Signup</div>

        <input id="text" type="text" name="username"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Signup"><br><br>

        <a href="login.php">Click to Login</a><br><br>
    </form>
</div>

</body>
</html>
