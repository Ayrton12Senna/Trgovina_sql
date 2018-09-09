<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos proizvoda</title>
    </head>
    <body>
        <form action="unesi_narudzbe.php" method="POST">
            Proizvod_ID: <input type="number" name="Proizvod_ID"><br/>
            Naziv Proizvoda: <input type="text" name="naziv_Proizvoda"><br/>
            Dobavljac_ID: <input type="number" name="dobavljac_ID"><br/>
            Kategorija_ID: <input type="number" name="kategorija_ID"><br/>
            Jedinična količina: <input type="number" name="jedinicna_Kolicina"><br/>
            Jedinična cijena: <input type="number" name="jedinicna_Cijena"><br/>
            Količina na skladištu: <input type="number" name="kolicina_na_Skladistu"><br/>
            Snizeno: <input type="number" name="snizeno"><br/>
            <input type="submit" value="Unesi proizvod">  
        </form>        
    </body>
    
<?php 

    $con = mysqli_connect('localhost', 'root', '', 'trgovina');
    
        if(!$con)
        {
            echo 'Neuspješno spajanje na bazu';
        }

        if(!mysqli_select_db($con, 'trgovina'))
        {
            echo 'Baza nije odabrana';
        }

        $proizvodID = $_POST['Proizvod_ID'];
        $nazivproizvoda = $_POST['naziv_Proizvoda'];
        $dobavljacID = $_POST['dobavljac_ID'];
        $kategorijaID = $_POST['kategorija_ID'];
        $Jedinicna_kolicina = $_POST['jedinicna_Kolicina'];
        $Jedinicna_cijena = $_POST['jedinicna_Cijena'];
        $Kolicina_na_skladistu = $_POST['kolicina_na_Skladistu'];
        $Snizeno = $_POST['snizeno'];
                
        $sql = "INSERT INTO proizvodi (proizvodID,nazivProizvoda,dobavljacID,kategorijaID,jedinicnaKolicina,jedinicnaCijena,kolicinaNaSkladistu,snizeno) VALUES ('$proizvodID','$nazivproizvoda', '$dobavljacID', '$kategorijaID', '$Jedinicna_kolicina', '$Jedinicna_cijena', '$Kolicina_na_skladistu', '$Snizeno')";
        
        if(!mysqli_query($con,$sql))
        {
            echo 'Podaci nisu uneseni';
        }
        else 
        {
            echo 'Podaci su uspješno uneseni';
        }
        header("refresh: 1; url=unesi_proizvod.php");
?>

        <!-- Ne radi kako bi trebalo -->