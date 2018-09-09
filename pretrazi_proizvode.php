<?php
   
include_once('db.php');
$pretrazi = mysqli_real_escape_string($conn, $_POST['nadi_proizvode']);
$upit_na_bazu = "SELECT * FROM proizvodi WHERE (`proizvodID` LIKE '$pretrazi')";
$rezultat = mysqli_query($conn, $upit_na_bazu);
        if(mysqli_num_rows($rezultat)>0)
        {
            while($redak = mysqli_fetch_array($rezultat))
            {
               echo 'ProizvodID: '.$redak['proizvodID'].', </br> '
                       . 'Naziv proizvoda: '.$redak['nazivProizvoda'].', </br> '
                       . 'DobavljačID: '.$redak['dobavljacID'].', </br> '
                       . 'KategorijaID: '.$redak['kategorijaID'].', </br> '
                       . 'Jedinična Cijena: '.$redak['jedinicnaCijena'].', </br> '
                       . 'Količina na skladištu: '.$redak['kolicinaNaSkladistu'].' </br> '
                       . ' </br></br>';
            }  
        }
        else
        {
            echo 'Nema rezultata pretrage';
        }
        header("refresh: 5; url=pocetna.php");
?>
