<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `proizvodi` WHERE nazivProizvoda LIKE ".$valueToSearch;
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `proizvodi`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "trgovina");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Filtriraj proizvode</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="filtriraj_proizvode.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
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

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['nazivProizvoda'];?></td>
                    <td><?php echo $row['dobavljacID'];?></td>
                    <td><?php echo $row['kategorijaID'];?></td>
                    <td><?php echo $row['jedinicnaKolicina'];?></td>
                    <td><?php echo $row['jedinicnaCijena'];?></td>
                    <td><?php echo $row['kolicinaNaSkladistu'];?></td>
                    <td><?php echo $row['snizeno'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>
