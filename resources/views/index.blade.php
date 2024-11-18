<!DOCTYPE html>
<html lang="pt-br">
<!-- Define o tipo de documento como HTML5 e especifica o idioma da página como Português Brasil. -->

<head>
    <!-- Cabeçalho da página contendo meta-informações e links para estilos. -->
    <meta charset="UTF-8">
    <!-- Define a codificação de caracteres como UTF-8, garantindo a correta exibição de caracteres especiais. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define a visualização para dispositivos móveis, garantindo que o layout seja responsivo. -->
    <title>Página Inicial</title>
    <!-- Define o título da página que será exibido na aba do navegador. -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Importa o arquivo CSS localizado em 'public/css/style.css', utilizado para estilizar a página. -->
</head>

<body>
    <!-- Corpo da página onde o conteúdo principal será exibido. -->
    
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
    <!-- Exibe uma mensagem de boas-vindas com o nome do usuário autenticado.
         O `Auth::user()->name` é uma função do Laravel que acessa o nome do usuário autenticado. -->

    <p>Esta é a página inicial restrita a usuários autenticados.</p>
    <!-- Adiciona uma descrição indicando que a página é acessível apenas por usuários autenticados. -->
</body>

</html>
