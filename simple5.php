




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
        <a href="simple2.php">Prod-Categorie</a>
        <a href="simple3.php">Angajat-Teritorii</a>
        <a href="simple4.php">Vanzari</a>
        <a class="active" href="simple5.php">Stocuri&Teritorii</a>
        
</div>
       
        <br>
			<br>
			<b>Afisați distribuitorilor fara produse in stock, a produselor cu cele mai mari preturi din fiecare categorie, a categoriilor care au cel putin un produs cu stoc mai mic decat media stocului în categoria respectiva si a angajatilor care lucreaza  in cel putin doua teritorii diferite:</b>
			<br>
			<br>
            <form method="post">
            <input id="text" type="text" name="nume">
            <input id="button" type="submit"><br><br>
			
			<?php
            include('connection.php');
            if (isset($_POST["nume"])) {
                $nume = $_POST['nume'];
            
                $sql = "SELECT d.companie ,d.nume_contact,d.nr_tel,d.oras
                FROM distribuitor d
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM produse p
                    WHERE p.distribuitorID = d.distribuitorID AND p.BucatiInStoc > 0
                )";
                
                $result = mysqli_query($con, $sql);
            
                if (!$result) {
                    echo 'Tabelul nu exista';
                } else {
                    echo "<table border='1'>
                        <tr>
                        <th>companie</th>
                        <th>nume_contact</th>
                        <th>nr_tel</th>
                        <th>oras</th>
                        </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['companie'] . "</td>";
                        echo "<td>" . $row['nume_contact'] . "</td>";
                        echo "<td>" . $row['nr_tel'] . "</td>";
                        echo "<td>" . $row['oras'] . "</td>";
                        echo "</tr>";
            
                    }
                    echo "</table>";
                }
                $sql = "SELECT p1.nume_prod,p1.nr_bucati,p1.pret
                FROM produse p1
                WHERE p1.pret = (
                    SELECT MAX(p2.pret)
                    FROM produse p2
                    WHERE p2.categorieID = p1.categorieID
                )";                
                
                $result = mysqli_query($con, $sql);
            
                if (!$result) {
                    echo 'Tabelul nu exista';
                } else {
                    echo "<table border='1'>
                        <tr>
                        <th>Nume Produs</th>
                        <th>Nr Bucati</th>
                        <th>Pret</th>
                        </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nume_prod'] . "</td>";
                        echo "<td>" . $row['nr_bucati'] . "</td>";
                        echo "<td>" . $row['pret'] . "</td>";
                        echo "</tr>";
            
                    }
                    echo "</table>";
                }
                $sql = "SELECT c.nume
                FROM categorie c
                WHERE EXISTS (
                    SELECT 1
                    FROM produse p
                    WHERE p.categorieID = c.categorieID AND p.BucatiInStoc < (
                        SELECT AVG(BucatiInStoc)
                        FROM produse
                        WHERE categorieID = c.categorieID
                    )
                )";               
                
                $result = mysqli_query($con, $sql);
            
                if (!$result) {
                    echo 'Tabelul nu exista';
                } else {
                    echo "<table border='1'>
                        <tr>
                        <th>Nume Categorie</th>
                        </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nume'] . "</td>";
                        echo "</tr>";
            
                    }
                    echo "</table>";
                }
                $sql = "SELECT angajat.nume,angajat.prenume
                FROM angajat
                WHERE (
                    SELECT COUNT(DISTINCT teritoriiid)
                    FROM angajatteritorii
                    WHERE angajatid = angajat.angajatid
                ) >= 2";
                
                            
                
                $result = mysqli_query($con, $sql);
            
                if (!$result) {
                    echo 'Tabelul nu exista';
                } else {
                    echo "<table border='1'>
                        <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        </tr>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nume'] . "</td>";
                        echo "<td>" . $row['prenume'] . "</td>";
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

