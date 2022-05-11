<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="restrito/css/bootstrap.min.css">
    <title>Main Page</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="jumbotron">
                    <h1 class="display-4">Login</h1>
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email do usuário</label>
                            <input type="email" class="form-control" id="email" name="email_login">
                            <div class="form-text">Insira seu Email para adentrar ao sistema</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha_login">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button class="btn btn-primary btn-m" href="#" role="button">Cadastrar-se</button>
                    </form>
                    <?php

                        include "restrito/conexao.php";

                    if (isset($_POST['email_login'])) {
                        $login = mysqli_real_escape_string($conexao, $_POST['email_login']);                  
                        $senha = mysqli_real_escape_string($conexao, $_POST['senha_login']);
                        

                        $sql = "SELECT * from usuarios WHERE email_login = '$login' AND senha_login = '$senha'";
            
                            if($result = mysqli_query($conexao, $sql)) {
                                $num_registros = mysqli_num_rows($result);
                                if ($num_registros == 1) {
                                  $linha = mysqli_fetch_assoc($result);
          
          
                                  if (($login == $linha['email_login']) and ($senha == $linha['senha_login'])) {
                                  session_start();
                                  $_SESSION['user'] = "benfatti";
                                  header("location: restrito");
                                } else {
                                  echo "Login inválido!";
                                }
                                } else {
                                  echo "Login ou senha não encontrados ou inválido.";
                                }
                              } else { echo "Nenhum resultado do Banco de Dados"; }
                            }
    
                    ?>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>