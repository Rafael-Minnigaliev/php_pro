<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header class="header center">
    <nav>
        <a class="header__menu" href="index.php">Главная</a>
        <?php if($_SESSION['user_id']):?>
        <a class="header__menu" href="index.php?c=user&act=Profile">Мой кабинет</a>
        <?php
        else:?>
        <a class="header__menu" href="index.php?c=user&act=Login">Войти</a>
        <a class="header__menu" href="index.php?c=user&act=Reg">Зарегистрироваться</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<section class="content center">
    <h1 class="content__title"><?= $title?></h1>
    <?= $content?>
</section>
<footer class="footer center">
    <p>Все права защищены!</p>
</footer>
</body>
</html>