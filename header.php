<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameForge Studios</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <header>
        <h1><img src="img/logo.jpg" alt="Logo">GameForge Studios</h1>
        <nav>
            <ul>
                <li><a href="index.php">О нас</a></li>
                <li><a href="#">Наш телеграм бот</a></li>
                <?php if(!isset($_SESSION['user'])): ?>
            <a href="log.php">Авторизация</a>
            <a href="reg.php">Регистрация</a>
            <a href="logout.php">Выход</a>
        <?php endif; ?>
        </nav>
    </header>