<?php
      include_once('db.php');

$var_proizvodID = '';
$var_nazivProizvoda = '';
$var_dobavljacID = '';
$var_kategorijaID = '';
$var_jedinicnaCijena = '';
$var_kolicinaNaSkladistu = '';
$var_snizeno = '';

//get values from the form
function getPosts()
{
    $posts = array();
    
    $posts[0] = $_POST['proizvodID_tb'];
    $posts[1] = $_POST['nazivProizvoda_tb'];
    $posts[2] = $_POST['dobavljacID_tb'];
    $posts[3] = $_POST['kategorijaID_tb'];
    $posts[4] = $_POST['jedinicnaCijena_tb'];
    $posts[5] = $_POST['kolicinaNaSkladistu_tb'];
    $posts[6] = $_POST['snizeno_tb'];
    
    return $posts;
}

//Search And Display Data 
$query = 'SELECT * FROM proizvodi WHERE proizvodID = '.$_GET['proizvodID_tb'];
if ($stmt = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_execute($stmt); //execute statement
        mysqli_stmt_bind_result(($stmt), $stmt)
    }
    
/*
if(isset($_POST['search']))
{
    $data = getPosts();
    if(empty($data[0]))
    {
        echo 'Niste unijeli proizvodID';
    }  
    else 
    {
        $searchStmt = $conn->prepare('SELECT * FROM proizvodi WHERE proizvodID = ?');
        $searchStmt->bind_param('i', $data[0]);
        $searchStmt->execute();
        
        if($searchStmt)
        {
            $user = mysqli_stmt_fetch($searchStmt);
            if(empty($user))
            {
                echo 'Ne postoje podaci za ID koji ste unjeli';
            }
            else
            {
                var_dump($user);
            }

        }
        
    }
}

// Insert Data

if(isset($_POST['insert']))
{
    $data = getPosts();
    if(empty($data[1]) || empty($data[2]) || empty($data[4] || empty($data[5])))
    {
        echo 'Unesite podatke';
    }  
    else {
        
        $insertStmt = $con->prepare('INSERT INTO proizvodi(proizvodID,nazivProizvoda,dobavljacID,kategorijaID,jedinicnaKolicina,jedinicnaCijena,kolicinaNaSkladistu,snizeno) VALUES(:nazivProizvoda_tb,:dobavljacID_tb,:kategorijaID_tb, :jedinicnaCijena_tb, :kolicinaNaSkladistu_tb, :snizeno_tb)');
        $insertStmt->execute(array(
                    ':nazivProizvoda_tb'=> $data[1],
                    ':dobavljacID_tb'  => $data[2],
                    ':kategorijaID_tb'  => $data[3],
                    ':jedinicnaCijena_tb'  => $data[4],
                    ':kolicinaNaSkladistu_tb'  => $data[5],
                    ':snizeno_tb'=> $data[6],
        ));
        
        if($insertStmt)
        {
                echo 'Podaci su uspješno uneseni';
        }
        
    }
}

//Update Data

if(isset($_POST['update']))
{
    $data = getPosts();
    if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]))
    {
        echo 'Unesite podatke za promjenu';
    }  else {
        
        $updateStmt = $con->prepare('UPDATE proizvodi SET nazivProizvoda = :nazivProizvoda_tb, dobavljacID = :dobavljacID_tb, kategorijaID = :kategorijaID_tb, jedinicnaCijena = :jedinicnaCijena_tb, kolicinaNaSkladistu = :kolicinaNaSkladistu_tb, snizeno = :snizeno_tb    WHERE proizvodid = :id');
        $updateStmt->execute(array(
                    ':nazivProizvoda_tb'=> $data[1],
                    ':dobavljacID_tb'  => $data[2],
                    ':kategorijaID_tb'  => $data[3],
                    ':jedinicnaCijena_tb'  => $data[4],
                    ':kolicinaNaSkladistu_tb'  => $data[5],
                    ':snizeno_tb'=> $data[6],
        ));
        
        if($updateStmt)
        {
                echo 'Data Updated';
        }
        
    }
}

// Delete Data

if(isset($_POST['delete']))
{
    $data = getPosts();
    if(empty($data[0]))
    {
        echo 'Enter The User ID To Delete';
    }  else {
        
        $deleteStmt = $con->prepare('DELETE FROM users WHERE id = :id');
        $deleteStmt->execute(array(
                    ':id'=> $data[0]
        ));
        
        if($deleteStmt)
        {
                echo 'User Deleted';
        }
        
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pretraga, unos, izmjena i brisanje - proizvodi</title>  
    </head>
    <body>
        <form action="editPodataka.php" method="POST">

            <input type="text" name="proizvodID_tb" placeholder="ProizvodID" value="<?php echo $var_proizvodID;?>"><br><br>
            <input type="text" name="nazivProizvoda_tb" placeholder="Naziv proizvoda" value="<?php echo $var_nazivProizvoda;?>"><br><br>
            <input type="text" name="dobavljacID_tb" placeholder="Dobavljač ID" value="<?php echo $var_dobavljacID;?>"><br><br>
            <input type="text" name="kategorijaID_tb" placeholder="Kategorija ID" value="<?php echo $var_kategorijaID;?>"><br><br>
            <input type="text" name="jedinicnaCijena_tb" placeholder="Jedinicna Cijena" value="<?php echo $var_jedinicnaCijena;?>"><br><br>
            <input type="text" name="kolicinaNaSkladistu_tb" placeholder="Kolicina na skladistu" value="<?php echo $var_kolicinaNaSkladistu;?>"><br><br>
            <input type="text" name="snizeno_tb" placeholder="Sniženo" value="<?php echo $var_snizeno;?>"><br><br>
            
            <input type="submit" name="insert" value="Insert">
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
            <input type="submit" name="search" value="Pretraga">

        </form>
        
    </body>    
</html>

<!--
<!DOCTYPE html>
<html>
<body>
<script>
function getData() {
  //pozvati php funkciju
  var tablicaSelect = document.getElementById("tablicaSelect");
  var tablicaWhere = document.getElementById("tablicaWhere");
  var tablicaWhereVrijednost = document.getElementById("tablicaWhereVrijednost");
  getSQLData(tablicaSelect, tablicaWhere, tablicaWhereVrijednost)
}
</script>
<select id="tablicaSelect">
  <option value="detaljiNarudzbe">detaljiNarudzbe</option>
  <option value="proizvodi">proizvodi</option>
</select>
<select id="tablicaWhere">
  <option value="id">id</option>
  <option value="all">all</option>
</select>
Id: <input type="text" name="Vrijednost" id="tablicaWhereVrijednost" value="0"><br>
<button onclick="getData()">Dohvati</button>

</body>
</html>
    -->    
<?php
/*
    function getSQLData($tablicaSelect, $tablicaWhere, $tablicaWhereVrijednost){
        $konekcija = mysqli_connect("localhost", "root", "", "autentikacija");
        if($tablicaWhere === 'all')
            $sql = "SELECT * FROM " + $tablicaSelect;
        else
            $sql = "SELECT * FROM " + $tablicaSelect + "WHERE " + $tablicaWhere + " = " + $tablicaWhereVrijednost;
        $result = $konekcija->query($sql);
        
        //primjeniti prikaz da sprema u HTML tablicu i staviti buttone za brisanje i uredivanje
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        }   
    }
    
    //TODO: ovo je slijedece kada uspijem pozvati php funkciju
    function izbrisiPodatak(){
        
    }
    
    function promjeniPodatak(){
        
    }
    
    function unesiPodatak(){
        
    }

*/
?>