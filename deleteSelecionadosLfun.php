<?php 

 include 'db.php'; 

if(@$_POST['btnLfun'])
{
    
    foreach($_POST['ids'] as $id)
    {
        $sql = "delete from tecnico where id = '$id'";
$val = $dbd->query($sql);
        

    }
}


        header('location: Lfun.php');

 ?>