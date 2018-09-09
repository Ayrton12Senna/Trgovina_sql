<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos detalja narudzbe</title>
    </head>
    <body>
        <form action="unesi_detalje_narudzbe.php" method="POST">
            Narudzba_ID: <input type="text" id="narudzbaID"><br/>
            Proizvod_ID: <input type="text" id="Proizvod_ID"><br/>
            Kolicina: <input type="text" id="kolicina"><br/>
            Popust: <input type="text" id="popust"><br/>
            <button id="submit">Unesi detalje narudžbe</button> 
                
        </form>        
    </body>
    
<?php include 'funkcije.php'; ?>
<?php
session_start(); 
    $conn = new mysqli("localhost", "root", "", "trgovina"); //nova sql konekcija

    if ($conn->connect_error) 
    {
        die("Neuspješno spajanje na bazu: " . $conn->connect_error);
    }
    
        $Narudzba_ID = mysqli_real_escape_string($conn,['narudzbaID']);
        $Proizvod_ID = mysqli_real_escape_string($conn,$_POST['Proizvod_ID']);
        $Kolicina = mysqli_real_escape_string($conn,$_POST['kolicina']);
        $Popust = mysqli_real_escape_string($conn,$_POST['popust']);
        
        $sql = "INSERT INTO detaljinarudzbe (narudzbaID,proizvodID,kolicina,popust) VALUES ('$Narudzba_ID','$Proizvod_ID', '$Kolicina', '$Popust')";
        
        if(!mysqli_query($conn,$sql))
        {
            echo 'Podaci nisu uneseni';
        }
        else 
        {
            echo 'Podaci su uspješno uneseni';
        }
        header("refresh: 1; url=unesi_detalje_narudzbe.php");
?>

    <!-- Ne radi kako bi trebalo -->