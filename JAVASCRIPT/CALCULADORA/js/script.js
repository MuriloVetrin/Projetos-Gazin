document.addEventListener("DOMContentLoaded", function() {
    // Captura todos os botões da calculadora
    const buttons = document.querySelectorAll(".btn");
  
    // Adiciona um listener de clique para cada botão
    buttons.forEach(function(button) {
      button.addEventListener("click", handleClick);
    });
  
    // Função de manipulação de clique para os botões
    function handleClick(event) {
      const buttonValue = event.target.textContent;
      const screen = document.querySelector(".resultado");
  
      // Limpar a tela
      if (buttonValue === "C") {
        screen.value = "";
      }
      // Executar cálculo quando o botão "=" for pressionado
      else if (buttonValue === "=") {
        try {
          const result = eval(screen.value);
          screen.value = result;
        } catch (error) {
          screen.value = "Erro";
        }
      }
      // Adicionar valor do botão pressionado na tela
      else {
        screen.value += buttonValue;
      }
    }
  });
  