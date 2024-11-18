<!DOCTYPE html>
<html lang="pt-br">
<!-- Define o tipo de documento como HTML5 e especifica o idioma da página como Português Brasil. -->

<head>
    <!-- Cabeçalho da página com informações e links para estilos. -->
    <meta charset="UTF-8">
    <!-- Define a codificação de caracteres como UTF-8, garantindo a compatibilidade com caracteres especiais. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configura a visualização para dispositivos móveis, ajustando a escala para responsividade. -->
    <title>Login</title>
    <!-- Define o título da página que será exibido na aba do navegador. -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Importa o arquivo CSS localizado na pasta `public/css/style.css` para estilizar o formulário. -->
</head>

<body>
    <!-- Início do corpo da página, onde o conteúdo visível será renderizado. -->
    <form action="{{ route('login') }}" method="POST">
        <!-- Formulário para o login do usuário, enviando dados via método POST para a rota 'login'. -->

        @csrf
        <!-- Diretiva Blade do Laravel para incluir um token CSRF (proteção contra falsificação de solicitação entre sites). -->

        <input type="email" name="email" placeholder="E-mail" required>
        <!-- Campo de entrada para o e-mail do usuário. 
             O atributo `type="email"` valida automaticamente o formato de e-mail no navegador. 
             O `placeholder` exibe uma mensagem orientativa dentro do campo até o usuário começar a digitar.
             O atributo `required` garante que o campo não será enviado vazio. -->

        <input type="password" name="password" placeholder="Senha" required>
        <!-- Campo de entrada para a senha do usuário. 
             O atributo `type="password"` oculta os caracteres digitados para maior segurança. -->

        <button type="submit">Entrar</button>
        <!-- Botão para enviar o formulário. O texto "Entrar" indica a ação do botão. -->
    </form>
    <!-- Fim do formulário de login. -->
</body>

</html>
