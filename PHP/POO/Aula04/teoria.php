<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Aula 04</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>
   <p>Os métodos especiais em PHP, também conhecidos como métodos mágicos, são utilizados para realizar ações específicas em uma classe. Além dos getters e setters, existem outros métodos especiais que podem ser implementados em uma classe.</p>
   <p>Aqui está uma lista dos métodos especiais mais comuns em PHP:</p>
   <ul>
      <li>Construtor (`__construct`): É executado automaticamente quando um objeto é criado a partir da classe. É usado para inicializar os atributos da classe.</li>
      <li>Destrutor (`__destruct`): É executado automaticamente quando um objeto é destruído, geralmente no final do script ou quando o objeto não é mais referenciado. É usado para liberar recursos ou realizar outras ações de limpeza.</li>
      <li>Getter (`__get`): É invocado quando você tenta acessar um atributo inacessível diretamente. Permite controlar o acesso e retornar o valor desejado.</li>
      <li>Setter (`__set`): É invocado quando você tenta atribuir um valor a um atributo inacessível diretamente. Permite controlar a atribuição e definir o valor desejado.</li>
      <li>Método chamado (`__call`): É invocado quando você tenta chamar um método inacessível ou inexistente na classe. Permite controlar o comportamento de chamada e realizar ações personalizadas.</li>
      <li>Método chamado estático (`__callStatic`): É invocado quando você tenta chamar um método estático inacessível ou inexistente na classe. Funciona de forma semelhante ao método chamado, mas para métodos estáticos.</li>
      <li>Verificação de existência de propriedade (`__isset`): É invocado quando você tenta verificar se um atributo inacessível ou inexistente está definido. Permite controlar a verificação e retornar um valor booleano.</li>
      <li>Remoção de propriedade (`__unset`): É invocado quando você tenta remover um atributo inacessível ou inexistente. Permite controlar a remoção do atributo e realizar outras ações necessárias.</li>
      <li>Conversão para string (`__toString`): É invocado quando um objeto é convertido para uma string, geralmente ao imprimir o objeto. Permite controlar a representação em formato de string do objeto.</li>
      <li>Serialização (`__serialize` e `__unserialize`): São invocados quando um objeto é serializado (convertido em uma sequência de bytes) ou desserializado (reconstruído a partir da sequência de bytes). Permitem controlar o processo de serialização e desserialização do objeto.</li>

      <img class="imagem" src="imgs/1.png">
      <img class="imagem" src="imgs/2.png">
      <img class="imagem" src="imgs/3.png">
      <img class="imagem" src="imgs/4.png">
      <img class="imagem" src="imgs/5.png">
      <img class="imagem" src="imgs/6.png">
      <img class="imagem" src="imgs/7.png">
      <img class="imagem" src="imgs/8.png">
   </ul>
</body>

</html>