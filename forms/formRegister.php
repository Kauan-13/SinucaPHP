<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="../crud/crudRegister.php" method="post">
        <div>
            <div>Email: </div>
            <input type="text" name="mail" id="mail">
        </div>
        <div>
            <div>Nome: </div>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <div>Senha: </div>
            <input type="password" name="pass" id="pass">
        </div>
        <div>
            <div>Confirmar Senha: </div>
            <input type="password" name="confirmPass" id="confirmPass">
        </div>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>