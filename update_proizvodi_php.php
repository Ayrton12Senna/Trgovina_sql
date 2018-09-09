<?php
//konekcija na bazu
    $connect_u = mysqli_connect('localhost', 'root', '');
//odabir baze podataka
mysqli_select_db($connect, 'trgovina');
//ažuriranje upita
$sql_u = "UPDATE detaljinarudzbe SET "
        . "nazivProizvoda='$_POST[naziv_proizvoda]', dobavljacID='$_POST[dobavljac_ID], kategorijaID='$_POST[kategorija_ID]', jedinicnaKolicina='$_POST[jedinicna_Kolicina]', jedinicnaCijena='$_POST[jedinicna_Cijena]', kolicinaNaSkladistu='$_POST[kolicina_Na_Skladistu]', snizeno='$_POST[snizeno]'"
        . "' WHERE proizvodID='$_POST[proizvodid]'";
    
//Izvrši upit
if(mysqli_query($connect_u, $sql_u))
        header("resferh:1; url=update_proizvodi.php");
    else {
    echo "Neuspješno ažuriranje";
}
?>
