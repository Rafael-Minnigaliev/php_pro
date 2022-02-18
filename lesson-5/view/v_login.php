<form class="login" action="index.php?c=user&act=Login" method="post">
    <label>Логин: <input class="login__input" type="text" name="login" required></label><br>
    <label>Пароль: <input class="login__input" type="password" name="pass" required></label><br>
    <input type="submit" value="Войти">
</form>
<?php
if($_GET['status'] == 'error'):?>
    <h2 style="color: red">Неверный логин и пароль попробуйте ввести их заново</h2>
<?php
endif;

