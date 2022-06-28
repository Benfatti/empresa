<?php
    include "../validar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="restrito\css\bootstrap\bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Pesquisa</title>
</head>

<body>

    <?php

    if (isset($_POST['busca'])) {
        $pesquisa = $_POST['busca'];
    } else {
        $pesquisa = '';
    }

    include "conexao.php";

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%" . $pesquisa . "%'";
    $dados = mysqli_query($conexao, $sql);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Consulta</h1>
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action="pesquisa.php" method="POST">
                        <input style="margin : 1.50px" class="form-control" type="search" placeholder="Nome" aria-label="search" name="busca" autofocus></input>
                        <button style="margin : 1.50px" class="btn btn-success" type="submit">Pesquisar</button>
                    </form>
                </nav>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $cod_pessoa = $linha['cod_pessoa'];
                            $nome = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $telefone = $linha['telefone'];
                            $email = $linha['email'];
                            $data_nascimento = $linha['data_nascimento'];
                            $data_nascimento = arruma_data($data_nascimento);
                            
                            //inserindo foto
                            $foto = $linha['foto'];
                        
                            echo "<tr>                                     
                                        <th><img src='img/$foto' class='lista_foto'></th>
                                        <th scope='row'>$nome</th>
                                        <td>$endereco</td>
                                        <td>$telefone</td>
                                        <td>$email</td>
                                        <td>$data_nascimento</td>
                                        <td width=150px> <a href = 'cadastro_edit.php?id=$cod_pessoa' class = 'btn btn-success btn-sm'>Editar</a>
                                                         <a width=150px href = '#' class = 'btn btn-danger btn-sm' data-toggle='modal' data-target='#confirma' 
                                                          onclick=\"get_dados($cod_pessoa, '$nome')\">Excluir</a>
                                        </td>
                                      </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-secondary">Volte ao início</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_script.php" method="POST">
                        <p>Deseja realmente excluir o usuário <b id="nome_pessoa"></b>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value=""></input>
                    <input type="hidden" name="id" id="cod_pessoa" value=""></input>
                    <input type="submit" class="btn btn-danger" value="Sim"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <script src="js/functions.js"></script>
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>