<?php 
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // ceva a fost postat
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // citire din baza de date
        $query = "select * from users where username = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: add_categorie.php");
                    die;
                }
            }
        }

        echo "Nume de utilizator sau parolă greșită!";
    } else {
        echo "Nume de utilizator sau parolă greșită!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
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
            <div style="font-size: 20px; margin: 10px; color: white;">Login</div>

            <input id="text" type="text" name="user_name"><br>
            <input id="text" type="password" name="password"><br>

            <input id="button" type="submit" value="Login"><br>

            <a href="signup.php">Click to Signup</a>
        </form>
    </div>
</body>
</html>
