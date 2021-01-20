<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes/Style/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>LOGIN</title>
</head>

<body>

    <?php
    session_start();
    // Prisijungimo logika

    if (
        isset($_POST['login'])
        && !empty($_POST['username'])
        && !empty($_POST['password'])
    ) {
        if (
            $_POST['username'] == 'admin' &&
            $_POST['password'] == '1234'
        ) {
            $_SESSION['logged_in'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = 'admin';
            header("location: ./");
        } else {
            $msg = 'Wrong username or password';
        }
    }
    ?>

    <div id="login">
        <form action="" method="post">
            <img width="100px" src="../includes/Style/cms.svg" alt="">
            <h1 style="color: #2e86c1;" class="Title">CMS ADMIN</h1>
            <h2>Please Log In</h2>
            <input type="text" name="username" placeholder="username = admin" required autofocus>
            <input type="password" name="password" placeholder="password = 1234" required>
            <button class="btn btn-outline-success" type="submit" name="login">Login</button>
            <h4><?php echo $msg; ?></h4>
        </form>
    </div>



</body>

</html>