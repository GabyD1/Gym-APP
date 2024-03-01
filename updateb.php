<?php
include('connection.php');
include('functions.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $distribuitorID=$_POST['distribuitorID'];
    $companie = $_POST['companie'];
    $nume_contact= $_POST['nume_contact'];
    $nr_tel= $_POST['nr_tel'];
    $oras= $_POST['oras'];
    $adresa= $_POST['adresa'];
    $cod_postal= $_POST['cod_postal'];
   
$update1="UPDATE distribuitor SET distribuitorID='$distribuitorID', companie='$companie', nume_contact='$nume_contact' , nr_tel='$nr_tel' , oras='$oras' ,
 adresa='$adresa' , cod_postal='$cod_postal'  WHERE distribuitor.distribuitorID='$distribuitorID'";
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
        <a href="add_user.php" >Adaugare Client</a>
        <a class="active" href="updateb.php" >Updateaza Distribuitor</a>
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
<form method="post">
			<p>
				<label>Introdu ID-ul distribuitorului: </label> 
				<input id="text" type="int" name="distribuitorID">
			</p>
      <p>
				<label>Nume companie: </label> 
				<input id="text" type="text" name="companie">
			</p>
      <p>
				<label>Persoana contact: </label> 
				<input id="text" type="text" name="nume_contact">
			</p>
      <p>
				<label>Nr-tel persoana contact: </label> 
				<input id="text" type="int" name="nr_tel">
			</p>
      <p>
				<label>Oras : </label> 
				<input id="text" type="text" name="oras">
			</p>
      <p>
				<label>Adresa: </label> 
				<input id="text" type="text" name="adresa">
			</p>
      <p>
				<label>Cod postal: </label> 
				<input id="text" type="int" name="cod_postal">
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

            
                $sql = "SELECT * FROM `distribuitor` ";
        
            
			$result = mysqli_query($con, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			} else {
                    echo "<table border='1'>
			<tr>

            <th>Id Distribuitor</th>
			<th>Companie </th>
            <th>Nume Contact </th>
            <th>Nr Tel </th>
            <th>Oras </th>
            <th>Adresa </th>
            <th>Cod postal </th>


			
			
			</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['distribuitorID'] . "</td>";
                        echo "<td>" . $row['companie'] . "</td>";
                        echo "<td>" . $row['nume_contact'] . "</td>";
                        echo "<td>" . $row['nr_tel'] . "</td>";
                        echo "<td>" . $row['oras'] . "</td>";
                        echo "<td>" . $row['adresa'] . "</td>";
                        echo "<td>" . $row['cod_postal'] . "</td>";

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

