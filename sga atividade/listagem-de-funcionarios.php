<?php include('config.php'); 
    require_once('repository/FuncionarioRepository.php'); 
    $notificacao = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de funcionarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-6 offset-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Acesso</th>
                    <th>Data cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(fnListFuncionarios() as $funcionario): ?>
                <tr>
                   <td><?= $funcionario->id ?></td> 
                   <td><?= $funcionario->nome ?></td> 
                   <td><?= $funcionario->email ?></td> 
                   <td><?= $funcionario->acesso ?></td> 
                   <td><?= $funcionario->created_at ?></td> 
                   <td><a href="formulario-edita-funcionario.php?id=<?= $funcionario->id ?>">Editar</a></td> 
                   <td><a onclick="return confirm('Deseja realmente excluir?');" href="excluirFuncionario.php?id=<?= $funcionario->id ?>">Excluir</a></td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
            <?php if(isset($notificacao)) : ?>
            <tfoot>
                <tr>
                    <td colspan="7"><?= $notificacao ?></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>