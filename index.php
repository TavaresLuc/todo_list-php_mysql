<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Todo List | XNEO</title>
</head>
<body>
  <div class="wrapper">
    <form class="form">
      <div class="inputBox">
        <input type="text" id="txt" placeholder="Preencha a tarefa" required> <!-- Campo de entrada de texto -->
        <button id="btn"><i class="fa fa-plus"></i></button> <!-- Botão para adicionar tarefa -->
      </div>
    </form>
    <ul id="data"></ul> <!-- Lista para exibir as tarefas -->
    <div class="footer">
      <p id="total_task"></p> <!-- Exibir o total de tarefas -->
      <button id="clear">Excluir Todos</button> <!-- Botão para excluir todas as tarefas -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Importação da biblioteca jQuery -->
  <script src="./js/script.js"></script> <!-- Script personalizado para manipulação da lista de tarefas -->

  <dialog class="modal_null">
    <p>Por favor, insira um nome para a tarefa!</p> <!-- Mensagem do modal quando o campo de tarefa estiver vazio -->
    <div class="close-button">
      <button id="close"><b>OK</b></button> <!-- Botão de fechar o modal -->
    </div>
  </dialog>

  <dialog class="modal_success">
    <p>Tarefa adicionada com sucesso!</p> <!-- Mensagem do modal de sucesso ao adicionar uma tarefa -->
  </dialog>
</body>
</html>
