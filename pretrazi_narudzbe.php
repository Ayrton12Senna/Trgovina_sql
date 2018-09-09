<?php
   
include_once('db.php');
$pretrazi = mysqli_real_escape_string($conn, $_POST['pretrazi']);
$upit_na_bazu = "SELECT * FROM detaljinarudzbe WHERE (`narudzbaID` LIKE '$pretrazi')";
$rezultat = mysqli_query($conn, $upit_na_bazu);
        if(mysqli_num_rows($rezultat)>0)
        {
            while($redak = mysqli_fetch_array($rezultat))
            {
               echo 'NarudžbaID: '.$redak['narudzbaID'].', </br> ProizvodID: '.$redak['proizvodID'].', </br> Količina: '.$redak['kolicina'].', </br> Popust: '.$redak['popust'].'</br></br>';

            }  
        }
        else
        {
            echo 'Nema rezultata pretrage';
        }
        header("refresh: 5; url=pocetna.php");
?>
