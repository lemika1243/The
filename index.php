<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form">
        <div class="title"><h1 class="h1">LOGIN</h1></div><hr>
        <form action="Traitement/traitementLogin.php" method="post">
            <p>Email : <input type="email" name="email"></p>
            <p>Password : <input type="password" name="password"></p>
            <p>Type d'utilisateur : <select name="type">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select></p>
            <p><input type="submit" value="Se connecter"></p>
        </form>
    </div>
    <h2>ETU002538 ETU002747 ETU002589</h2>
    <script src="assets/js/function.js"></script>
    <script src="assets/js/functionLogin.js"></script>
    <script>
        var email = getInput("email");
        var pwd = getInput("password");
        var type = getInput("type");
        type.addEventListener("click" , ()=>{
            getMailAndPwd(type,email,pwd);
        });
    </script>
</body>
</html>