<!DOCTYPE html>
<html lang="pt-br">
<!-- Define o tipo de documento como HTML5 e especifica o idioma da página como Português Brasil. -->

<head>
    <!-- Cabeçalho da página contendo meta-informações e links para estilos. -->
    <meta charset="UTF-8">
    <!-- Define a codificação de caracteres como UTF-8. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define a visualização para dispositivos móveis, garantindo que o layout seja responsivo. -->
    <title>Cadastro</title>
    <!-- Título da página que será exibido na aba do navegador. -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Importa o arquivo CSS localizado em 'public/css/style.css' no Laravel. -->
</head>

<body>
    <!-- Corpo da página onde o conteúdo principal é inserido. -->
    <form action="{{ route('cadastro') }}" method="POST">
        <!-- Inicia um formulário HTML que enviará os dados para a rota 'cadastro' usando o método POST. -->
        @csrf
        <!-- Proteção contra ataques CSRF (Cross-Site Request Forgery), necessária para envios de formulário no Laravel. -->
        <input type="text" name="name" placeholder="Nome" required>
        <!-- Campo de entrada para o nome do usuário, obrigatório para envio. -->
        <input type="email" name="email" placeholder="E-mail" required>
        <!-- Campo de entrada para o e-mail do usuário, obrigatório e com validação de formato. -->
        <input type="password" name="password" placeholder="Senha" required>
        <!-- Campo de entrada para a senha do usuário, obrigatório e oculto durante a digitação. -->
        <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
        <!-- Campo de entrada para confirmar a senha, obrigatório. -->
        <button type="submit">Cadastrar</button>
        <!-- Botão para enviar os dados do formulário. -->
    </form>
</body>

</html>
