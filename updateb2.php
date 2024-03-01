<?php
include('connection.php');
include('functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $categorieID =$_POST['categorieID'];
    $nume = $_POST['nume'];
    $descriere= $_POST['descriere'];
   
$update1="UPDATE categorie SET categorieID='$categorieID', nume='$nume', descriere='$descriere'  WHERE categorie.categorieID='$categorieID'";
$result1 = mysqli_query($con,$update1);
if ($result1) {
echo "Schimbare cu succes!";
} else {
echo "Eroare";
}
}

?>


<!DOCTYPE html>
<html>
    <head></head>
    <body style="background-color:gray">
    <div class="topnav" id="menu23">
       
         <a  href="add_categorie.php">Adaugare Categorie</a>
        <a  href="add_user.php" >Adaugare Client</a>
        <a href="updateb.php" >Updateaza Distribuitor</a>
        <a class="active" href="updateb2.php" >Updateaza Categorie</a>
        <a href="delete.php">Stergere Client </a>
        <a href="delete1.php">Stergere Teritoriu</a>
        <a href="simple.php">Prod-Distribuitor</a>
        <a href="simple2.php">Prod-Categorie</a>
        <a href="simple3.php">Angajat-Teritorii</a>
        <a href="simple4.php">Vanzari</a>
        <a href="simple5.php">Stocuri&Teritorii</a>
       
    
</div>
<div id="box">
<form method="post">
			<p>
				<label>Introdu ID-ul categoriei: </label> 
				<input id="text" type="int" name="categorieID">
			</p>
      <p>
				<label>Nume categorie: </label> 
				<input id="text" type="text" name="nume">
			</p>
      <p>
				<label>Detalii: </label> 
				<input id="text" type="text" name="descriere">
			</p>
			<input id="button" type="submit" value="Schimba"><br><br>
      </form>
  
      <br>
			<br>
			<b>Afisati date:</b>
			<br>
			<br>
            <form method="post">
            <input id="text" type="text" name="companie">
            <input id="button" type="submit"><br><br>
			
			<?php
            include('connection.php');
            if (isset($_POST["companie"]))
                
            {   
                $companie= $_POST['companie'];

            
                $sql = "SELECT * FROM `categorie` ";
        
            
			$result = mysqli_query($con, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			} else {
                    echo "<table border='1'>
			<tr>

            <th>Id Companie</th>
			<th>Companie </th>
            <th>Descriere </th>


			
			
			</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['categorieID'] . "</td>";
                        echo "<td>" . $row['nume'] . "</td>";
                        echo "<td>" . $row['descriere'] . "</td>";

                        echo "</tr>";

                    }
                    echo "</table>";
                }
			
			}
		?>	
<br>
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

