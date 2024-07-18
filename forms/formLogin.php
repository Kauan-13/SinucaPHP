<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../crud/crudLogin.php" method="post">
        <div>
            <div>Email: </div>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <div>Senha: </div>
            <input type="password" name="password" id="password">
        </div>
        <br>
        <button type="submit">Entrar</button>
        <br><br>
        <a href="formRegister.php">Ainda não possuo cadastro</a>
    </form>
</body>
</html>