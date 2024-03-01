<?php
session_start();
include('connection.php');
include('functions.php');

  if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
		$telefon = $_POST['telefon'];	
    $adresa = $_POST['adresa'];
		
    

    $nume = mysqli_real_escape_string($con, $nume);
    $cnp = mysqli_real_escape_string($con, $prenume);
    $pret = mysqli_real_escape_string($con, $telefon);
    $adresa = mysqli_real_escape_string($con, $adresa);

  

		if(!empty($nume) && !empty($prenume) && !empty($telefon) && !empty($adresa))
		{

      
      $query3 = "INSERT into client (clientid,nume,prenume,telefon, adresa) values (NULL,'$nume','$prenume','$telefon','$adresa')";
      $result3 = mysqli_query($con, $query3);

    
      if ($result3 === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: <br>" . mysqli_error($con);
      }

			die();
		}
    else
		{
			echo "Introdu ceva ok";
		}
	}

  

?>


<!DOCTYPE html>
<html>
    <head></head>
    <body style="background-color:gray">
    <div class="topnav" id="menu23">

        <a  href="add_categorie.php"><i class="Contact">Adaugare Categorie</a>
        <a class="active" href="add_user.php" >Adaugare Client</a>
        <a href="updateb.php" >Updateaza Distribuitor</a>
        <a href="updateb2.php" >Updateaza Categorie</a>
        <a href="delete.php">Stergere Client </a>
        <a href="delete1.php">Stergere Teritoriu</a>
        <a href="simple.php">Prod-Distribuitor</a>
        <a href="simple2.php">Prod-Categorie</a>
        <a href="simple3.php">Angajat-Teritorii</a>
        <a href="simple4.php">Vanzari</a>
        <a href="simple5.php">Stocuri&Teritorii</a>

       
    
</div>
<div id="box">
	<h2>Introduceti datele pentru a adauga un client</h2> 
		
		<form method="post">
			<p>
				<label>Nume  </label> 
				<input id="text" type="text" name="nume">
			</p>
      <p>
				<label>Prenume: </label> 
				<input id="text" type="int" name="prenume">
			</p>
      <p>
				<label>Telefon: </label> 
				<input id="text" type="int" name="telefon">
			</p>
      <p>
				<label>Adresa: </label> 
				<input id="text" type="text" name="adresa">
			</p>
			<input id="button" type="submit" value="Inscriere"><br><br>
		</form>
	</div>
<a href="login.php" class="previous">&laquo; Logout</a>
    </body>
    </html>

<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
}

.topnav {
    background-color: #333;
    overflow: hidden;
}

.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

#box {
    width: 50%;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input[type="text"],
input[type="int"] {
    padding: 10px;
    margin-bottom: 15px;
}

#button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#button:hover {
    background-color: #45a049;
}

.previous {
    background-color: #f1f1f1;
    color: black;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
}

.previous:hover {
    background-color: #ddd;
}

</style>
