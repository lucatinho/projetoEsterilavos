<?php

include 'db.php';

$id = (int)$_GET['id'];

$autenticacao = false;

$senha = null


?>



<html>

<body>


    <!-- <button onclick="myFunction()">Try it</button> -->

    <p id="demo"></p>

    <script>
        // function myFunction() {

        var senha = prompt("Por favor digite sua senha:");

        if (senha != null) {
            document.getElementById("demo").innerHTML =
                "Hello " + senha + "! How are you today?";
           
        }
       
        // }
    </script>

</body>

</html>


<?php


if ($senha != null) {
    echo "autenticou";

    // altera para desativado o cliente
    // $sql = "update cliente set desativado = 1 where id_Cliente = '$id'";
    // $val = $dbd->query($sql);

    if ($val) {

        header('location: index.php');
    }
} else {
    echo $senha;
    echo "Senha incorreta";
    // echo "<script>alert('Senha incorreta');</script>";
    // header('location: index.php');
    // echo "<script>alert('Senha incorreta');</script>";
}



// deleta cliente para sempre
// $sql = "delete from cliente where id_Cliente = '$id'";
?>