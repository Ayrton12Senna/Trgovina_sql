<?php
$imeservera = "localhost";
$korisnicko_ime_db = "root";
$lozinka_db = "";
$ime_baze = "trgovina";

$conn = new mysqli($imeservera, $korisnicko_ime_db, $lozinka_db, $ime_baze); //nova sql konekcija

if ($conn->connect_error) 
{
    die("Neuspješno spajanje na bazu: " . $conn->connect_error);
}
/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
*/
?>