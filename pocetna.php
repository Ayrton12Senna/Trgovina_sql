<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="UTF-8">
        <title>Pretraga</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <div class="zaglavlje">
            <h1>Početna</h1>
            
<?php
  session_start();
if(!isset($_SESSION['logirani_korisnik']) || empty($_SESSION['logirani_korisnik'])) {
    echo 'Dobrodošao stranče.';
} else {
    echo '<h3> Dobrodošli ' . $_SESSION['logirani_korisnik'] . '</h3>';
}  
//session_abort();
?>
        </div>
        <form id="myForm" action="pretrazi_narudzbe.php" method="POST">
            Pretraži narudžbe: <input type="text" name="pretrazi" Placeholder="Unesi narudzbaID"/>  <input type="submit" value="Pretraži narudžbe" />
        </form>
        <form id="myForm" action="pretrazi_proizvode.php" method="POST">
            Pretraži proizvode: <input type="text" name="nadi_proizvode" Placeholder="Unesi proizvodID"/>  <input type="submit" value="Pretraži proizvode" />
        </<form>    
        
    </body>
</html>

