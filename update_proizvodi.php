<html>
    <head>
        <title>Ažuriranje/izmjena proizvoda</title>
           
    </head>
    <body>
<?php
//konekcija na bazu
    $connect_u = mysqli_connect('localhost', 'root', '');
//odabir baze podataka
mysqli_select_db($connect_u, 'trgovina');
//odabir upita
$sql_u = "SELECT * FROM  detaljinarudzbe";
    
//Izvrši upit
$zapis = mysqli_query($connect_u, $sql_u);

?>
        <table>
            <tr>
                <th>Naziv proizvoda</th>
                <th>Dobavljač ID</th>
                <th>Kategorija ID</th>
                <th>Jedinična količina</th>
                <th>Jedinična cijena</th>   
                <th>Količina na skladištu</th>
                <th>Sniženo</th>
            </tr>
<?php
while($row_u = mysqli_fetch_array($zapis))
{
echo "<tr><form action=update_proizvodi_php.php method=post>";
echo "<input type=text name=proizvodid value='".$row_u['proizvodID']."'>";
echo "<tr><input type=text name=naziv_proizvoda value='".$row_u['nazivProizvoda']."'></td>";
echo "<tr><input type=text name=dobavljac_ID value='".$row_u['dobavljacID']."'></td>";
echo "<tr><input type=text name=kategorija_ID value='".$row_u['kategorijaID']."'></td>";
echo "<tr><input type=text name=jedinicna_Kolicina value='".$row_u['jedinicnaKolicina']."'></td>";
echo "<tr><input type=text name=jedinicna_Cijena value='".$row_u['jedinicnaCijena']."'></td>";
echo "<tr><input type=text name=kolicina_Na_Skladistu value='".$row_u['kolicinaNaSkladistu']."'></td>";
echo "<tr><input type=text name=snizeno value='".$row_u['snizeno']."'></td>";
echo "<td><input type=submit>";
echo "</form></tr>";
}
?>
</body> 
</html>
