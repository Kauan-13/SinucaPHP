<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="../php/crudRegister.php" method="post">
        <div>
            <div>Email: </div>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <div>Nome: </div>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <div>Senha: </div>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <div>Confirmar Senha: </div>
            <input type="password" name="confirmPassword" id="confirmPassword">
        </div>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>