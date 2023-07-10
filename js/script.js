// Aguarda o documento estar pronto
$(document).ready(function() {
  // Função para exibir os dados
  function showData() {
    $.ajax({
      url: 'show.php',
      type: 'post',
      success: function(result) {
        $("#data").html(result);
      }
    });
  }

  // Chama a função para exibir os dados
  showData();

  // Função para obter a contagem total de tarefas
  function totalTask() {
    $.ajax({
      url: 'crud/task.php',
      type: 'post',
      success: function(result) {
        $("#total_task").html(result);
      }
    });
  }

  // Chama a função para obter a contagem total de tarefas
  totalTask();

  // Manipulador de evento para o botão de adicionar tarefa
  $("#btn").on("click", function(e) {
    e.preventDefault();
    task = $("#txt").val();

    if (task === '') {
      // Exibe o modal quando o campo de texto estiver vazio
      const modal = document.querySelector(".modal_null");
      const buttonClose = document.querySelector('#close');

      modal.showModal();

      // Manipulador de evento para fechar o modal
      buttonClose.onclick = function() {
        modal.close();
      }
    } else {
      // Envia a requisição AJAX para inserir a tarefa no banco de dados
      $.ajax({
        url: 'crud/insert.php',
        type: 'post',
        data: {
          task: task
        },
        success: function(result) {
          if (result == 1) {
            $("#txt").val('');
            showData();
            totalTask();
          } else {
            console.log(result);
          }
        }
      });
    }
  });

  // Manipulador de evento para o botão de exclusão de tarefa
  $(document).on("click", ".delete-btn", function() {
    id = $(this).data("id");
    element = $(this);

    // Envia a requisição AJAX para excluir a tarefa do banco de dados
    $.ajax({
      url: 'crud/delete.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(result) {
        if (result == 1) {
          $(element).closest("li").fadeOut();
          showData();
          totalTask();
        }
      }
    });
  });

  $(document).on("click", ".done-btn", function() {
    var id = $(this).data("id");
    var icon = $(this).find("i");
    var listItem = $(this).closest("li");
  
    // Envia a requisição AJAX para alterar o status da tarefa no banco de dados
    $.ajax({
      url: 'crud/update.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(result) {
        if (result === '1') {
          // Adiciona a classe ".task-done" e altera o ícone para fa fa-times quando o campo "done" é igual a 1
          listItem.removeClass("task-false").addClass("task-done");
          icon.removeClass("fa fa-check").addClass("fa fa-times");
        } else if (result === '0') {
          // Adiciona a classe ".task-false" e altera o ícone para fa fa-check quando o campo "done" é igual a 0
          listItem.removeClass("task-done").addClass("task-false");
          icon.removeClass("fa fa-times").addClass("fa fa-check");
        }
      }
    });
  });
  

  // Manipulador de evento para o botão de limpar todas as tarefas
  $(document).on("click", "#clear", function() {
    // Envia a requisição AJAX para limpar todas as tarefas do banco de dados
    $.ajax({
      url: 'crud/clear.php',
      type: 'post',
      success: function(result) {
        if (result == 1) {
          showData();
          totalTask();
        }
      }
    });
  });
});
