<?php
    include "../arquivoconexao.php";

    if(isset($_GET['id'])) {
        //entrada
        $id = $_GET['id'];

        //processamento
        $sql = "select * from cliente where id='$id'";
        $seleciona = mysqli_query($conexao,$sql);
        $exibe = mysqli_fetch_array($seleciona); //carrega o vetor com o bd 

        // carrega as variaveis com os dados do bd (opcional)
        $nome = $exibe['nome'];
        $telefone = $exibe['telefone'];
        $email = $exibe['email'];


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
      <div class="container">
        <h1 class="">Editar Clientes</h1>
        <hr>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <form name="cadastro" method="post" action="update_cliente.php">
        <input type="hidden" name="id" value="<?=$id?>">

      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="descricao" name="nome" aria-describedby="emailHelp" required value="<?php echo $nome?>">
      </div>

      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" id="telefone"  name="telefone" required value="<?php echo $telefone?>">
      </div>

      <div class="mb-3">
          <label class="form-label" for="email">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email?>">
      </div>

      <div class="mb-3 text-end">
          <button type="submit" class="btn btn-outline-primary">Cadastrar</button>
          <button type="button" class="btn btn-outline-danger" onclick="history.go(-1)">Voltar</button>
      </div>

    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
<script>
        $(document).ready(function(){
             $('#telefone').mask('(00) 00000-0000');
             $('#cpf').mask('000.000.000-00');
        });
</script>

  </body>
</html>

<?php
    } else {
        // tratamento de erro e redirecionamento
        echo "
        <p> Esta é uma página de tratamento de dados</p>
        <p> Clique <a href='listar_clientes.php'>aqui</a> para acessar a lista de clientes cadastrados.</p>
        ";
    }
?>