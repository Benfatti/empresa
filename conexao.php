<?php
   $server = "localhost:3306";
   $user = "root";
   $pass = "";
   $bd = "empresa";

        try{
            $conexao = mysqli_connect($server, $user, $pass, $bd); 
        }catch(Exception $m){
            echo $m->getMessage();
            return false;
        }
   function mensagem($texto, $tipo){
        echo "<div class ='alert $tipo' role= 'alert' >$texto</div>";
    }

    function arruma_data($data){
        $d = explode('-', $data);
        $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
        return $escreve;
    }