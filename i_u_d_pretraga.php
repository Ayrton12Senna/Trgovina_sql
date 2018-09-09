<?php
      include_once('db.php');

$id = '';
$fname = '';
$lname = '';
$age = '';

function getPosts()
{
    $posts = array();
    
    $posts[0] = $_POST['id'];
    $posts[1] = $_POST['fname'];
    $posts[2] = $_POST['lname'];
    $posts[3] = $_POST['age'];
    
    return $posts;
}

//Search And Display Data 

if(isset($_POST['search']))
{
    $data = getPosts();
    if(empty($data[0]))
    {
        echo 'Enter The User Id To Search';
    }  else {
        
        $searchStmt = $con->prepare('SELECT * FROM users WHERE id = :id');
        $searchStmt->execute(array(
                    ':id'=> $data[0]
        ));
        
        if($searchStmt)
        {
            $user = $searchStmt->fetch();
            if(empty($user))
            {
                echo 'No Data For This Id';
            }
            
            $id    = $user[0];
            $fname = $user[1];
            $lname = $user[2];
            $age   = $user[3];
        }
        
    }
}

// Insert Data

if(isset($_POST['insert']))
{
    $data = getPosts();
    if(empty($data[1]) || empty($data[2]) || empty($data[3]))
    {
        echo 'Enter The User Data To Insert';
    }  else {
        
        $insertStmt = $con->prepare('INSERT INTO users(fname,lname,age) VALUES(:fname,:lname,:age)');
        $insertStmt->execute(array(
                    ':fname'=> $data[1],
                    ':lname'=> $data[2],
                    ':age'  => $data[3],
        ));
        
        if($insertStmt)
        {
                echo 'Data Inserted';
        }
        
    }
}

//Update Data

if(isset($_POST['update']))
{
    $data = getPosts();
    if(empty($data[0]) || empty($data[1]) || empty($data[2]) || empty($data[3]))
    {
        echo 'Enter The User Data To Update';
    }  else {
        
        $updateStmt = $con->prepare('UPDATE users SET fname = :fname, lname = :lname, age = :age WHERE id = :id');
        $updateStmt->execute(array(
                    ':id'=> $data[0],
                    ':fname'=> $data[1],
                    ':lname'=> $data[2],
                    ':age'  => $data[3],
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