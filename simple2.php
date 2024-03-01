<!DOCTYPE html>
<html>
    <head></head>
    <body style="background-color:gray">
    <div class="topnav" id="menu23">
       
    <a  href="add_categorie.php">Adaugare Categorie</a>
        <a  href="add_user.php" >Adaugare Client</a>
        <a href="updateb.php" >Updateaza Distribuitor</a>
        <a href="updateb2.php" >Updateaza Categorie</a>
        <a href="delete.php">Stergere Client </a>
        <a href="delete1.php">Stergere Teritoriu</a>
        <a href="simple.php">Prod-Distribuitor</a>
        <a class="active" href="simple2.php">Prod-Categorie</a>
        <a href="simple3.php">Angajat-Teritorii</a>
        <a href="simple4.php">Vanzari</a>
        <a href="simple5.php">Stocuri&Teritorii</a>
</div>
       
<br>
			<br>
			<b>Afisati produsele dupa o anumita categorie:</b>
			<br>
			<br>
            <form method="post">
            <input id="text" type="text" name="nume">
            <input id="button" type="submit"><br><br>
			
			<?php
            include('connection.php');
            if (isset($_POST["nume"]))
                
            {   
                $nume= $_POST['nume'];

            
                $sql = "SELECT produsID, nume_prod, nr_bucati, pret, BucatiInStoc, BucatiComandate
                FROM produse
                JOIN categorie ON produse.categorieID = categorie.categorieID
                WHERE categorie.nume = '$nume'";

        
            
			$result = mysqli_query($con, $sql);

			if ($result != TRUE) {
				echo 'Tabelul nu exista';
			} else {
                    echo "<table border='1'>
			<tr>

            <th>ID_Produs</th>
			<th>Nume_Produs </th>
            <th>Nr_BUC </th>
            <th>Pret </th>
            <th>Bucati_in_stoc</th>
            <th>Bucati_comandate </th>


			
			
			</tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['produsID'] . "</td>";
                        echo "<td>" . $row['nume_prod'] . "</td>";
                        echo "<td>" . $row['nr_bucati'] . "</td>";
                        echo "<td>" . $row['pret'] . "</td>";
                        echo "<td>" . $row['BucatiInStoc'] . "</td>";
                        echo "<td>" . $row['BucatiComandate'] . "</td>";

                        echo "</tr>";

                    }
                    echo "</table>";
                }
			
			}
		?>	
<br>
			
		<!-- End Left Column -->
		
		
<br><br><br><br>
	<!-- End Page Content -->
	<!-- Begin Footer -->
	<div id="footer">
	</div>
	<!-- End Footer --></div>
   
<!-- End Container -->
<br><br><br>
</div>

</div>
<a href="login.php" class="previous">&laquo; Logout</a>
    </body>
    </html>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: gray;
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

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4caf50;
        color: white;
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
