<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Form</title>
		<link href="Style/Add_Form.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#99CC66" background="Images/MyBackground.png">
<div class="img"><img src="Images/auditoria.png" /></div>
<div class="ii"><center><img src="Images/Edit_Yes.png" style="margin-top:20px"/></center></div>
<div id="topbar">
    	<center><h1 style="color:#939">Forma za dodavanje</h1>
    </div>
<div id="form">
		<table>
        	<form method="post" action="">
            	<tr>
                
                <?php
					include ("db.php");
					$g = mysqli_query($conn, "select proizvodID from proizvodi");
					while($id=mysqli_fetch_array($g))
					{
				?>
                
                	<th>ID:</th>
                    <td><input type="text" name="" value="<?php echo $id[0]+1; ?>" readonly="readonly" /></td>
                </tr>
                <?php
					}
				?>
                <tr>
                	<th>Naziv Proizvoda:</th>
                    <td><input type="text" name="nazivproizvoda_tb" placeholder="Naziv proizvoda"  /></td>
                </tr>
                <tr>
                	<th>Dobavljač ID:</th>
                    <td><input name="dobavljacid_tb" placeholder="Dobavljač ID" /></td>
                </tr>
                <tr>
                	<th>Kategorija ID:</th>
                    <td><input name="kategorijaid_tb" placeholder="Kategorija ID" /></td>
                    
                	<th>Jedinična količina:</th>
                    <td><input name="jedinicnakolicina_tb" placeholder="Jedinična količina" /></td>
                    
                	<th>Jedinična cijena:</th>
                    <td><input name="jedinicnacijena_tb" placeholder="Jedinična cijena" /></td>
                </tr>
                <tr>
                	<th>Količina na skladištu:</th>
                    <td><input name="kolicinaNaSkladistu_tb" placeholder="Količina na skladištu" /></td>
                </tr>
                <tr>
                    <th>Snizeno:</th>
                    <td><input name="snizeno_tb" placeholder="Sniženo" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="cmdadd" value="Add" /></td>
                    <td><input type="reset" name="cmdreset" value="Clear"/></td>
                </tr>
        	</form>
        </table>
    	</div>
        <?php   
        $v_proizvodid = $_POST['proizvodid_tb'];
        $v_nazivproizvoda = ($_POST['nazivproizvoda_tb']);
        $v_dobavljacid = ($_POST['dobavljacid_tb']);
        $v_kategorijaid = ($_POST['kategorijaid_tb']);
        $v_jedinicnakolicina = ($_POST['jedinicnakolicina_tb']);
        $v_jedinicnacijena = ($_POST['jedinicnacijena_tb']);
        $v_kolicinanaskladistu = ($_POST['kolicinaNaSkladistu_tb']);
        $v_snizeno = $_POST['snizeno_tb'];
        if(isset($_POST['cmdadd'])){
        if(empty($v_proizvodid) || empty($v_nazivproizvoda) || empty($v_dobavljacid) || empty($v_jedinicnakolicina) || empty($v_jedinicnacijena) || empty($v_kolicinanaskladistu))
        {
            echo "<center>Niste ispunili sva polja.</center>";
        }
        else
        {
        include "db.php";
       // $i = mysql_query("insert into proizvodi values('".$id."','".$name."','".$gender."','".$dob."','".$address."','".$sub."','".$date."')");
          $i = mysql_query("INSERT INTO proizvodi (proizvodID, nazivProizvoda, dobavljacID, kategorijaID, edinicnaKolicina, jedinicnaCijena, kolicinaNaSkladistu, snizeno) VALUES ('$v_proizvodid','$v_nazivproizvoda', '$v_dobavljacid', '$v_kategorijaid', '$v_jedinicnakolicina', '$v_jedinicnacijena', '$v_kolicinanaskladistu', '$v_snizeno')");
        if($i==true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=pocetna.php">';
        }
        //if($i==true){
        //header('Location:index.php');
        //exit;
        //mysql_close();
        //}
        }
    }
    ?>
</body>
</html>