<?php
   $server = "localhost:3306";
   $user = "root";
   $pass = "";
   $bd = "empresa";

   if($conexao = mysqli_connect($server, $user, $pass, $bd))
   {  
    echo "Conectado";
   } else
    echo "Erro ao conectar";

   function mensagem($texto, $tipo){
        echo "<div class ='alert $tipo' role= 'alert' >$texto</div>";
    }
?>