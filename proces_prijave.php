<?php include 'funkcije.php'; ?>
<?php
session_start();
    //dohvati vrijednosti s forme prijava.php    
    $conn = new mysqli("localhost", "root", "", "trgovina"); //nova sql konekcija

    if ($conn->connect_error) 
    {
        die("Neuspješno spajanje na bazu: " . $conn->connect_error);
    }
    $korisnicko_ime = mysqli_real_escape_string($conn,$_POST['korisnicko_ime_za_prijavu']);
    $lozinka = mysqli_real_escape_string($conn, $_POST['lozinka_za_prijavu']);
    
    /*
    //zaštita od sysql injectiona
    $korisnicko_ime_prijava = stripcslashes($korisnicko_ime_prijava);
    $lozinka_prijava = stripcslashes($lozinka_prijava);
    $korisnicko_ime_prijava = mysqli_real_escape_string($konekcija, $korisnicko_ime_prijava);
    $lozinka_prijava = mysqli_real_escape_string($konekcija, $lozinka_prijava); //dodati ime baze i post metodu
    */
    //query bazi da dohvati korisnike
    $sql = "Select * from korisnici where korisnicko_ime = '$korisnicko_ime' and lozinka = '$lozinka'" 
        or die("Neuspješno pretraživanje baze podataka" .mysqli_error($conn));
    $rezultat = mysqli_query($conn, $sql);
    $redak = mysqli_fetch_array($rezultat,MYSQLI_ASSOC);
    $broj_redaka = mysqli_num_rows($rezultat);
    if ($broj_redaka == 1)
        {
        //registracija sesije
        $_SESSION['logirani_korisnik'] = $korisnicko_ime;
          $zadnjeVrijemeSpajanja = $redak ['zadnje_vrijeme_spajanja'];
            $date = date("D, d M Y H:i:s", time());
            $message = "Uspješna prijava: " . $date . ", username: " . $korisnicko_ime;
            if (empty($redak['zadnje_vrijeme_spajanja']))
            {
            echo "Čestitamo. Ovo je Vaša prva prijava! </br>"; //uvijek se okida ovaj redak iako se u bazu unese novi login date   
            }
            else
            {
            echo "zadnji put ste se prijavili: $zadnjeVrijemeSpajanja </br>";
            }
            logMessage($message);
            
            echo "Prijava je uspješna. Dobro došli " .$redak['korisnicko_ime'];
            $novi_datum_prijave = "UPDATE korisnici SET zadnje_vrijeme_spajanja = '$date' WHERE korisnicko_ime = '$korisnicko_ime'"; //želim format date. A ne now funkciju
            mysqli_query($conn, $novi_datum_prijave);
            header("refresh: 2; url=pocetna.php");
        }
        else
        {
            $date = date("D, d M Y H:i:s", time());

            $message = "Neuspješna prijava: " . $date . ", username: " . $korisnicko_ime;
            logMessage($message);
            
            echo "Prijava je neuspješna. Molimo Vas da pokušate ponovno ili se registrirate.";
        }
?>