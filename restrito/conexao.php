<?php

class BancoDeDadosConexao{

public static function conexao(){    
$server = "localhost:3306";
$user = "root";
$pass = "";
$bd = "empresa";

try {
    return mysqli_connect($server, $user, $pass, $bd);
} catch (Exception $m) {
    echo $m->getMessage();
    return false;
}
}

public static function mensagem($texto, $tipo){
    echo "<div class ='alert $tipo' role= 'alert' >$texto</div>";
}

public static function arruma_data($data)
{
    $d = explode('-', $data);
    $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
    return $escreve;
}

public static function mover_foto($arquivo_foto)
{

    $tipo_i = explode('/', $arquivo_foto['type']);
    $tipo = $tipo_i[0] ?? '';
    $extensao = $tipo_i[1] ?? '';

    if ((!$arquivo_foto['error']) and ($arquivo_foto['size'] <= 500000) and ($tipo == "image")) {
        $nome_arquivo = date('Ymdhms') . $extensao;
        move_uploaded_file($arquivo_foto['tmp_name'], "img/" . $nome_arquivo);
        return $nome_arquivo;
    } else {
        return 0;
    }
}

public static function limpar($conexao, $texto_bruto){
    $texto_limpo = htmlspecialchars(mysqli_real_escape_string($conexao, $texto_bruto));
    return $texto_limpo;
}


}